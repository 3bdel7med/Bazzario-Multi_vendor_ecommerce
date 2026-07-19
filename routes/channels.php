<?php
use Illuminate\Support\Facades\Broadcast;
use App\Models\User;

Broadcast::channel('online-users', function (User $user) {
    return [
        'id' => $user->id,
        'name' => $user->name,
    ];
});
Broadcast::channel('chat.{chatId}', function ($user, $chatId) {
    $userIds = explode('-', $chatId);

    return in_array($user->id, $userIds);
});
Broadcast::channel('presence-chat.{chatId}', function ($user, $chatId) {
    $userIds = explode('-', $chatId);

    if (in_array($user->id, $userIds)) {
        return [
            'id' => $user->id,
            'name' => $user->name,
        ];
    }

    return false;
});
// admin-notifications
Broadcast::channel('admin-notifications', function ($user) {
    return $user->hasRole('admin') ? ['id' => $user->id, 'name' => $user->name] : false;
});
