<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        return inertia('auth/login');
    }
    public function store(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($validator, true)) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.'
            ]);
        }

        $request->session()->regenerate();
        return redirect()->intended('/listing')->with('success', 'Login Successfully!');
    }
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('listing.index')->with('success', 'Logout Successfully!');
    }
}
