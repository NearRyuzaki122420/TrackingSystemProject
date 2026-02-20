<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => false,
            'status' => session('status'),
        ]);
    }

    public function update(Request $request)
    {
        // Minimal (you can improve later)
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        $request->user()->update($request->only('name', 'email'));

        return Redirect::route('profile.edit')->with('status', 'profile-updated')->setStatusCode(303);
    }

    public function destroy(Request $request)
    {
        // Minimal placeholder
        $request->user()->delete();

        return Redirect::to('/')->setStatusCode(303);
    }
}