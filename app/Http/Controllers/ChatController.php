<?php

namespace App\Http\Controllers;
use App\Events\MessagesMarkedAsRead;
use App\Models\Message;
use App\Models\User;
use App\Events\MessageSent;
use Illuminate\Http\Request;

class ChatController extends Controller
{

public function show(User $receiver)
{
    $users = User::all();
    $userIds = [auth()->id(), $receiver->id];
    sort($userIds);
    $chatId = implode('-', $userIds);

    // تحديث الرسائل المستلمة من الشخص الآخر كـ "مقروءة"
    Message::where('sender_id', $receiver->id)
        ->where('receiver_id', auth()->id())
        ->whereNull('read_at')
        ->update(['read_at' => now()]);

    // بث الحدث لإعلام المرسل الأصلي أن رسائله قُرأت
    broadcast(new MessagesMarkedAsRead($chatId, auth()->id()))->toOthers();

    $messages = Message::where(function($q) use ($receiver) {
            $q->where('sender_id', auth()->id())->where('receiver_id', $receiver->id);
        })->orWhere(function($q) use ($receiver) {
            $q->where('sender_id', $receiver->id)->where('receiver_id', auth()->id());
        })->oldest()->take(50)->get();

    return view('chat', compact('receiver', 'messages', 'chatId', 'users'));
}


    public function sendMessage(Request $request, User $receiver)
    {
        $request->validate(['message' => 'required']);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $receiver->id,
            'message' => $request->message
        ]);


        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['status' => 'Message Sent!', 'message' => $message]);
    }
}
