<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsumerSessionController extends Controller
{
    public function create()
    {
        return view('store.auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::guard('consumer')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()
            ->intended(route('consumer.dashboard'))
            ->with('sonner', [
                'type' => 'success',
                'message' => 'Welcome back!',
            ]);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        Auth::guard('consumer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('store.home');
    }
}
