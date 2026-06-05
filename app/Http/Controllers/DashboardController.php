<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CounselingSession;

class DashboardController extends Controller
{
    public function index()
    {
        $upcomingSessions = CounselingSession::with('teacher')
            ->where('student_id', auth()->id())
            ->whereIn('status', [
                'pending',
                'accepted'
            ])
            ->latest()
            ->get();

        return view(
            'student.dashboard',
            compact('upcomingSessions')
        );
    }
}

        // $user = Auth::user();

        // if ($user->hasRole('admin')) {
        //     return redirect('/admin/dashboard');
        // }

        // if ($user->hasRole('guru')) {
        //     return redirect('/teacher/dashboard');
        // }

        // if ($user->hasRole('siswa')) {
        //     return redirect('/student/dashboard');
        // }

        // abort(403);
