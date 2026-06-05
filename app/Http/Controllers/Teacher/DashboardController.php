<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\CounselingSession;
use App\Notifications\BookingStatusNotification;

class DashboardController extends Controller
{
    public function index()
{
    $sessions = CounselingSession::with('student')
        ->where('teacher_id', auth()->id())
        ->latest()
        ->get();

    $pendingCount = CounselingSession::where(
        'teacher_id',
        auth()->id()
    )
    ->where('status', 'pending')
    ->count();

    $acceptedCount = CounselingSession::where(
        'teacher_id',
        auth()->id()
    )
    ->where('status', 'accepted')
    ->count();

    $rejectedCount = CounselingSession::where(
        'teacher_id',
        auth()->id()
    )
    ->where('status', 'rejected')
    ->count();

    $completedCount = CounselingSession::where(
        'teacher_id',
        auth()->id()
    )
    ->where('status', 'completed')
    ->count();

    return view(
        'teacher.dashboard',
        compact(
            'sessions',
            'pendingCount',
            'acceptedCount',
            'rejectedCount',
            'completedCount'
        )
    );
}

    public function chats()
    {
        $sessions = CounselingSession::with('student')
            ->where('teacher_id', auth()->id())
            ->where('status', 'accepted')
            ->latest()
            ->get();

        return view(
            'teacher.chats',
            compact('sessions')
        );
    }

    public function bookings()
    {
        $sessions = CounselingSession::with('student')
            ->where('teacher_id', auth()->id())
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view(
            'teacher.bookings',
            compact('sessions')
        );
    }

    public function accept(
        CounselingSession $session
    ) {
        if (
            $session->teacher_id
            !== auth()->id()
        ) {
            abort(403);
        }

        $session->update([
            'status' => 'accepted'
        ]);

        // realtime notification
        $session->student
            ->notify(
                new BookingStatusNotification(
                    $session
                )
            );

        return back()->with(
            'success',
            'Booking berhasil diterima.'
        );
    }

    public function reject(
        CounselingSession $session
    ) {
        if (
            $session->teacher_id
            !== auth()->id()
        ) {
            abort(403);
        }

        $session->update([
            'status' => 'rejected'
        ]);

        // realtime notification
        $session->student
            ->notify(
                new BookingStatusNotification(
                    $session
                )
            );

        return back()->with(
            'success',
            'Booking berhasil ditolak.'
        );
    }
}
