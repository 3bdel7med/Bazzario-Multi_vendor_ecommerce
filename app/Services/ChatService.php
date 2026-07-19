<?php
namespace App\Services;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Collection;

class ChatService
{
    /**
     * Fetch all unique vendors the authenticated user has exchanged messages with.
     */
    public function getConversationsForUser(User $user): Collection
    {
        return
        (
         Message::where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->with(['sender', 'receiver'])
            ->latest() // Keep the most recent chats on top
            ->get()
            ->flatMap(function ($message) use ($user) {
                // Return the "other" person in the chat (the vendor)
                return [$message->sender_id === $user->id ? $message->receiver : $message->sender];
            })
            ->filter() // Filter out any null values safely
            ->unique('id'));
    }
}
