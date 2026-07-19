<?php
namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use  Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }


    public function broadcastOn(): array
    {
        $userIds = [$this->message->sender_id, $this->message->receiver_id];
        sort($userIds);
        $chatId = implode('-', $userIds);

        return [
            new PrivateChannel("chat.{$chatId}"),
        ];
    }
}
