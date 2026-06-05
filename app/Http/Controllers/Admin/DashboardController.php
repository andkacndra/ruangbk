<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Article;
use App\Models\CounselingSession;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik
        $totalStudents = User::role('siswa')->count();
        $totalTeachers = User::role('guru')->count();
        $totalArticles = Article::count();
        $totalCounseling = CounselingSession::count();

        // Booking terbaru
        $latestBookings = CounselingSession::with([
            'student',
            'teacher'
        ])
        ->latest()
        ->take(3)
        ->get();

        // Artikel terbaru
        $latestArticles = Article::latest()
            ->take(8)
            ->get();

        return view('admin.dashboard', compact(
            'totalStudents',
            'totalTeachers',
            'totalArticles',
            'totalCounseling',
            'latestBookings',
            'latestArticles'
        ));
    }
}
