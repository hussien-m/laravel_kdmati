<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/


Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::routes(['middleware' => 'auth:admin']);


Broadcast::channel('App.Models.Admin.{userId}', function ($user, $userId) {
    return auth()->guard('admin')->user()->id === $userId;
});

Broadcast::channel('events', function ($user) {
    return true;
});
