<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CounselingSession;
use Illuminate\Http\Request;

class CounselingController extends Controller
{
    public function index()
    {
        $teachers = User::role('guru')->get();

        return view(
            'student.counseling.index',
            compact('teachers')
        );
    }

    public function show(User $teacher)
    {
        $availableTimes = [
            '08:00',
            '09:00',
            '10:00',
            '11:00',
            '13:00',
            '14:00',
        ];

        $selectedDate = request('date', now()->toDateString());

        $bookedTimes = CounselingSession::where('teacher_id', $teacher->id)
            ->where('session_date', $selectedDate)
            ->whereIn('status', ['pending', 'accepted'])
            ->pluck('session_time')
            ->map(function ($time) {
                return substr($time, 0, 5);
            })
            ->toArray();

        return view(
            'student.counseling.show',
            compact(
                'teacher',
                'availableTimes',
                'bookedTimes',
                'selectedDate'
            )
        );
    }

    public function store(Request $request, User $teacher)
    {
        $validated = $request->validate([
            'session_date' => 'required|date',
            'session_time' => 'required',
            'session_type' => 'nullable',
            'student_note' => 'nullable|string|max:1000',
        ]);

        $alreadyBooked = CounselingSession::where('teacher_id', $teacher->id)
            ->where('session_date', $validated['session_date'])
            ->where('session_time', $validated['session_time'])
            ->whereIn('status', ['pending', 'accepted'])
            ->exists();

        if ($alreadyBooked) {
            return back()->with(
                'error',
                'Jam tersebut sudah dibooking.'
            );
        }

        CounselingSession::create([
            'student_id' => auth()->id(),
            'teacher_id' => $teacher->id,
            'session_date' => $validated['session_date'],
            'session_time' => $validated['session_time'],
            'session_type' => 'online',
            'student_note' => $validated['student_note'],
            'status' => 'pending',
        ]);

        return redirect('/student/dashboard')
            ->with(
                'success',
                'Booking konseling berhasil dibuat dan sedang menunggu persetujuan guru BK.'
            );
    }

    public function history()
    {
        $sessions = CounselingSession::with('teacher')
            ->where('student_id', auth()->id())
            ->latest()
            ->get();

        return view(
            'student.history',
            compact('sessions')
        );
    }
}
