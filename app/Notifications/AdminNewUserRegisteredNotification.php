<?php
namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class AdminNewUserRegisteredNotification extends Notification implements ShouldQueue
{
    use Queueable;

    // نمرر المستخدم الجديد للكلاس
    public function __construct(public User $newUser) {}

    // القنوات التي سيمر من خلالها الإشعار (برودكاست لحظي + تخزين في الداتابيز)
    public function via(object $notifiable): array
    {
        return ['broadcast', 'database'];
    }

    // البيانات التي ستُخزن في قاعدة البيانات
    public function toArray(object $notifiable): array
    {
        return [
            'user_id' => $this->newUser->id,
            'name' => $this->newUser->name,
            'email' => $this->newUser->email,
            'message' => "مستخدم جديد قام بالتسجيل: {$this->newUser->name}"
        ];
    }

    // البيانات التي ستُرسل فوراً عبر Reverb إلى الفرونت إند
    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'id' => $this->id,
            'name' => $this->newUser->name,
            'email' => $this->newUser->email,
            'message' => "مستخدم جديد قام بالتسجيل: {$this->newUser->name}",
            'created_at' => now()->diffForHumans()
        ]);
    }
}
