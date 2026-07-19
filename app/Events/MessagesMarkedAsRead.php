<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessagesMarkedAsRead implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets , SerializesModels;
    public $chatId;
    public $receiverId;

    /**
     * Create a new event instance.
     */
    public function __construct($chatId, $receiverId)
    {
        $this->chatId = $chatId;
        $this->receiverId = $receiverId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [new PrivateChannel("chat.{$this->chatId}")];
    }
}
