<?php

use App\Models\CounselingSession;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Chat Channel
|--------------------------------------------------------------------------
*/

Broadcast::channel(
    'chat.{sessionId}',
    function ($user, $sessionId) {

        $session =
            CounselingSession::find(
                $sessionId
            );

        if (!$session) {
            return false;
        }

        return
            $session->student_id
                === $user->id
            ||
            $session->teacher_id
                === $user->id;
    }
);

/*
|--------------------------------------------------------------------------
| Notification Channel
|--------------------------------------------------------------------------
*/

Broadcast::channel(
    'App.Models.User.{id}',
    function ($user, $id) {

        return (int) $user->id
            === (int) $id;
    }
);
