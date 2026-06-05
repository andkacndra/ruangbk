<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Student\CounselingController;
use App\Http\Controllers\Teacher\DashboardController as TeacherDashboardController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Student\MentalTestController;
use App\Http\Controllers\Student\ArticleController;
use App\Http\Controllers\Student\MoodCheckController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::middleware(['role:siswa'])->group(function () {

        Route::get(
            '/student/dashboard',
            [DashboardController::class, 'index']
        )->name('student.dashboard');
        Route::get('/student/counseling', [CounselingController::class, 'index'])
            ->name('student.counseling');
        Route::get('/student/counseling/{teacher}', [CounselingController::class, 'show'])
            ->name('student.counseling.show');
        Route::post('/student/counseling/{teacher}/book', [CounselingController::class, 'store'])
            ->name('student.counseling.book');
        Route::get(
            '/student/history',
            [CounselingController::class, 'history']
        )->name('student.history');
        Route::get(
            '/student/mental-test',
            [MentalTestController::class, 'index']
        )->name('student.mental-test');
        Route::post(
            '/student/mental-test',
            [MentalTestController::class, 'store']
        )->name('student.mental-test.store');
        Route::get(
            '/student/mental-test/{result}',
            [MentalTestController::class, 'result']
        )->name('student.mental-test.result');
        Route::get(
            '/student/articles',
            [ArticleController::class, 'index']
        )->name('student.articles');
        Route::get(
            '/student/articles/{article:id}',
            [ArticleController::class, 'show']
        )->name('student.articles.show');
        Route::get(
            '/student/mood-check',
            [MoodCheckController::class, 'index']
        )->name('student.mood-check');
        Route::post(
            '/student/mood-check',
            [MoodCheckController::class, 'store']
        )->name('student.mood-check.store');
        Route::get(
            '/student/profile',
            [\App\Http\Controllers\Student\ProfileController::class, 'index']
        )->name('student.profile');

        Route::get(
            '/student/profile/edit',
            [\App\Http\Controllers\Student\ProfileController::class, 'edit']
        )->name('student.profile.edit');

        Route::put(
            '/student/profile/update',
            [\App\Http\Controllers\Student\ProfileController::class, 'update']
        )->name('student.profile.update');

        Route::get(
            '/student/profile/password',
            [\App\Http\Controllers\Student\ProfileController::class, 'password']
        )->name('student.profile.password');

        Route::put(
            '/student/profile/password',
            [\App\Http\Controllers\Student\ProfileController::class, 'updatePassword']
        )->name('student.profile.password.update');

    });

    Route::middleware(['role:guru'])->group(function () {

        Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])
            ->name('teacher.dashboard');
        Route::patch(
            '/teacher/session/{session}/accept',
            [TeacherDashboardController::class, 'accept']
        )->name('teacher.session.accept');
        Route::patch(
            '/teacher/session/{session}/reject',
            [TeacherDashboardController::class, 'reject']
        )->name('teacher.session.reject');
        Route::get(
            '/teacher/bookings',
            [TeacherDashboardController::class, 'bookings']
        )->name('teacher.bookings');

        Route::get(
            '/teacher/chats',
            [TeacherDashboardController::class, 'chats']
        )->name('teacher.chats');

    });

    Route::middleware(['role:admin'])->group(function () {

        Route::get(
            '/admin/dashboard',
            [AdminDashboardController::class, 'index']
        )->name('admin.dashboard');
        Route::get(
            '/admin/articles',
            [AdminArticleController::class, 'index']
        )->name('admin.articles.index');
        Route::get(
            '/admin/articles/create',
            [AdminArticleController::class, 'create'
        ])->name('admin.articles.create');
        Route::post(
            '/admin/articles',
            [AdminArticleController::class, 'store']
        )->name('admin.articles.store');
        Route::get(
            '/admin/articles/{article}/edit',
            [AdminArticleController::class, 'edit']
        )->name('admin.articles.edit');
        Route::put(
            '/admin/articles/{article}',
            [AdminArticleController::class, 'update']
        )->name('admin.articles.update');
        Route::delete(
            '/admin/articles/{article}',
            [AdminArticleController::class, 'destroy']
        )->name('admin.articles.destroy');
        Route::get(
            '/admin/users',
            [\App\Http\Controllers\Admin\UserController::class, 'index']
        )->name('admin.users.index');
        Route::get(
            '/admin/users/create',
            [\App\Http\Controllers\Admin\UserController::class, 'create']
        )->name('admin.users.create');
        Route::post(
            '/admin/users',
            [\App\Http\Controllers\Admin\UserController::class, 'store']
        )->name('admin.users.store');
        Route::get(
            '/admin/users/{user}/edit',
            [\App\Http\Controllers\Admin\UserController::class, 'edit']
        )->name('admin.users.edit');
        Route::put(
            '/admin/users/{user}',
            [\App\Http\Controllers\Admin\UserController::class, 'update']
        )->name('admin.users.update');
        Route::delete(
            '/admin/users/{user}',
            [\App\Http\Controllers\Admin\UserController::class, 'destroy']
        )->name('admin.users.destroy');

    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::get(
        '/chat/{session}',
        [ChatController::class, 'show']
    )->name('chat.show');

    Route::post(
        '/chat/{session}/send',
        [ChatController::class, 'send']
    )->name('chat.send');

    Route::patch(
    '/chat/{session}/complete',
    [ChatController::class, 'complete']
    )->name('chat.complete');

});

Route::post(
    '/chat/{session}/read',
    [ChatController::class, 'markAsRead']
)->name('chat.read');

Route::get(
    '/student/mental-test-history',
    [MentalTestController::class, 'history']
)->name('student.mental-test.history');
