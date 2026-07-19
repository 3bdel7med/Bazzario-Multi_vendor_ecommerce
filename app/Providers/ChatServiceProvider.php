<?php
namespace App\Providers;

use App\Models\User;
use App\Services\ChatService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ChatServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->singleton(ChatService::class, function ($app) {
            return new ChatService();
        });
    }

    public function boot(): void
    {
        // Bind the shared data globally to the layout
        View::composer('layouts.app', function ($view) {
            if (Auth::check()) {
                $chatService = $this->app->make(ChatService::class);
                $user = Auth::user();

                // Fetch all vendors expect the authenticated user
                $vendors = $chatService->getConversationsForUser($user);

                // Build the exact array structure your Blade is looking for
                $view->with([
                    'chat' => [
                        'id' => $user->id, // Global user channel ID
                        'user' =>User::where(['role'=>'vendor'])->get(), // The list of vendors we iterate over
                    ]
                ]);
            } else {
                $view->with([
                    'chat' => [
                        'id' => null,
                        'user' => collect(),
                    ]
                ]);
            }
        });
    }
}
