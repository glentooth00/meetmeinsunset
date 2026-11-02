<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Consumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsumerRegisteredUserController extends Controller
{
    public function create()
    {
        return view('store.auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:consumers,email'],
            'phone' => ['nullable', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $consumer = Consumer::create($validated);

        Auth::guard('consumer')->login($consumer);

        $request->session()->regenerate();

        return redirect()
            ->route('store.home')
            ->with('sonner', [
                'type' => 'success',
                'message' => 'Welcome to MeetMeinSunset! Your account has been created.',
            ]);
    }
}
