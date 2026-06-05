<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('student.profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('student.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:laki-laki,perempuan',
            'kelas' => 'nullable|string|max:255',
            'jurusan' => 'nullable|string|max:255',
        ]);

        $user->update($validated);

        return redirect()
            ->route('student.profile')
            ->with('success', 'Profil berhasil diperbarui');
    }

    public function password()
    {
        return view('student.profile.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check(
            $request->current_password,
            $user->password
        )) {
            return back()->withErrors([
                'current_password' => 'Password lama salah'
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()
            ->route('student.profile')
            ->with('success', 'Password berhasil diubah');
    }
}
