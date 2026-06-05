<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\MoodCheck;
use Illuminate\Http\Request;

class MoodCheckController extends Controller
{
    public function index()
    {
        $questions = [
            "Aku merasa semangat menjalani hari",
            "Aku merasa cemas atau khawatir",
            "Aku kesulitan fokus belajar",
            "Aku merasa sedih tanpa alasan jelas",
            "Aku merasa percaya diri di sekolah",
        ];

        $options = [
            "Tidak Pernah",
            "Jarang",
            "Kadang-kadang",
            "Sering",
            "Selalu",
        ];

        return view('student.mood-check.index', compact('questions', 'options'));
    }

    public function store(Request $request)
    {
        $answers = $request->answers;

        $score = 0;

        foreach ($answers as $answer) {
            switch ($answer) {
                case 'Tidak Pernah':
                    $score += 1;
                    break;
                case 'Kadang-kadang':
                    $score += 2;
                    break;
                case 'Sering':
                    $score += 3;
                    break;
                case 'Sangat Sering':
                    $score += 4;
                    break;
            }
        }

        if ($score <= 15) {
            $result = 'Baik';
            $color = 'green';
            $emoji = '😊';
            $message = 'Mood kamu hari ini cukup stabil. Pertahankan ya!';
        } elseif ($score <= 25) {
            $result = 'Sedang';
            $color = 'yellow';
            $emoji = '😐';
            $message = 'Mood kamu sedang tidak stabil. Coba istirahat dan cerita ke orang terpercaya.';
        } else {
            $result = 'Perlu Perhatian';
            $color = 'red';
            $emoji = '😟';
            $message = 'Kamu terlihat sedang tidak baik-baik saja. Disarankan untuk konsultasi dengan guru BK.';
        }

        // simpan ke database
        MoodCheck::create([
            'user_id' => auth()->id(),
            'score' => $score,
            'result' => $result,
        ]);

        return view('student.mood-check.result', compact(
            'score',
            'result',
            'color',
            'emoji',
            'message'
        ));
    }
}
