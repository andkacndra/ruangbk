<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\MentalTestResult;
use Illuminate\Http\Request;

class MentalTestController extends Controller
{
    public function index()
    {
        return view('student.mental-test.index');
    }

    public function store(Request $request)
    {
        $academic =
            $request->a1 +
            $request->a2 +
            $request->a3 +
            $request->a4 +
            $request->a5;

        $anxiety =
            $request->b1 +
            $request->b2 +
            $request->b3 +
            $request->b4 +
            $request->b5;

        $social =
            $request->c1 +
            $request->c2 +
            $request->c3 +
            $request->c4 +
            $request->c5;

        $result = MentalTestResult::create([
            'user_id' => auth()->id(),
            'academic_score' => $academic,
            'anxiety_score' => $anxiety,
            'social_score' => $social,
        ]);

        return redirect()->route(
            'student.mental-test.result',
            $result->id
        );
    }

    public function result(MentalTestResult $result)
    {
        $scores = [
            'academic' => $result->academic_score,
            'anxiety' => $result->anxiety_score,
            'social' => $result->social_score,
        ];

        $highestCategory = array_keys(
            $scores,
            max($scores)
        )[0];

        $recommendation = '';

        switch ($highestCategory) {

            case 'academic':
                $recommendation =
                    'Kamu tampak mengalami tekanan akademik yang cukup tinggi. Cobalah membuat jadwal belajar yang teratur, mengurangi kebiasaan menunda tugas, dan berdiskusi dengan Guru BK jika tekanan mulai mengganggu aktivitas sehari-hari.';
                break;

            case 'anxiety':
                $recommendation =
                    'Kamu menunjukkan kecenderungan mengalami kecemasan emosional. Luangkan waktu untuk beristirahat, berbicara dengan orang yang dipercaya, dan jangan ragu berkonsultasi dengan Guru BK.';
                break;

            case 'social':
                $recommendation =
                    'Kamu tampak mengalami kesulitan dalam aspek sosial atau pertemanan. Konseling dengan Guru BK dapat membantu menemukan strategi yang tepat untuk membangun hubungan sosial yang lebih nyaman.';
                break;
        }

        return view(
            'student.mental-test.result',
            compact(
                'result',
                'highestCategory',
                'recommendation'
            )
        );
    }

    public function history()
    {
        $results = MentalTestResult::where(
            'user_id',
            auth()->id()
        )
        ->latest()
        ->get();

        return view(
            'student.mental-test.history',
            compact('results')
        );
    }
}
