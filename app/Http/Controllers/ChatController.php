<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\CounselingSession;
use Illuminate\Http\Request;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function show(CounselingSession $session)
    {
        $user = auth()->user();

        $isStudent =
            $session->student_id === $user->id;

        $isTeacher =
            $session->teacher_id === $user->id;

        if (!$isStudent && !$isTeacher) {
            abort(403);
        }

        $messages = $session->messages()
            ->with('sender')
            ->latest()
            ->take(20)
            ->get()
            ->reverse();

        ChatMessage::where(
            'counseling_session_id',
            $session->id
        )
        ->where(
            'sender_id',
            '!=',
            auth()->id()
        )
        ->whereNull('read_at')
        ->update([
            'read_at' => now(),
        ]);

        return view(
            'chat.show',
            compact('session', 'messages')
        );
    }

    public function markAsRead(CounselingSession $session)
    {
        ChatMessage::where(
            'counseling_session_id',
            $session->id
        )
        ->where(
            'sender_id',
            '!=',
            auth()->id()
        )
        ->whereNull('read_at')
        ->update([
            'read_at' => now()
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function send(
        Request $request,
        CounselingSession $session
    ) {
        $user = auth()->user();

        $isStudent =
            $session->student_id === $user->id;

        $isTeacher =
            $session->teacher_id === $user->id;

        if (!$isStudent && !$isTeacher) {
            abort(403);
        }

        if ($session->status !== 'accepted') {
            return back()->with(
                'error',
                'Chat belum tersedia.'
            );
        }

        $request->validate([
            'message' => 'required|string|max:5000'
        ]);

        $message = ChatMessage::create([
            'counseling_session_id' => $session->id,
            'sender_id' => auth()->id(),
            'message' => $request->message,
        ]);

        broadcast(
            new MessageSent($message)
        )->toOthers();

        return back();
    }

    public function complete(
        CounselingSession $session
    )
    {
        $user = auth()->user();

        $isStudent =
            $session->student_id === $user->id;

        $isTeacher =
            $session->teacher_id === $user->id;

        if (!$isStudent && !$isTeacher) {
            abort(403);
        }

        $session->update([
            'status' => 'completed'
        ]);

        if ($user->hasRole('guru')) {

            return redirect()
                ->route('teacher.chats')
                ->with(
                    'success',
                    'Konseling berhasil diselesaikan.'
                );
        }

        return redirect()
            ->route('student.history')
            ->with(
                'success',
                'Konseling berhasil diselesaikan.'
            );
    }
}
