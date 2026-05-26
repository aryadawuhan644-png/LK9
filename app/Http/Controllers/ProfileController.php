<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    protected function profile(): ?User
    {
        return User::first();
    }

    public function index(): View
    {
        $profile = $this->profile();
        return view('profile.index', compact('profile'));
    }

    public function create(): View
    {
        if ($this->profile()) {
            return redirect()->route('profile.edit');
        }

        return view('profile.form', ['profile' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        if ($this->profile()) {
            return redirect()->route('profile.edit');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'bio' => 'nullable|string|max:1000',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        if ($request->hasFile('profile_photo')) {
            $validated['profile_photo'] = $request->file('profile_photo')->store('profiles', 'public');
        }

        $validated['password'] = Hash::make('password');

        User::create($validated);

        return redirect()->route('profile.index')->with('success', 'Profil berhasil dibuat dan disimpan.');
    }

    public function edit(): View
    {
        $profile = $this->profile();

        if (! $profile) {
            return redirect()->route('profile.create');
        }

        return view('profile.form', compact('profile'));
    }

    public function update(Request $request): RedirectResponse
    {
        $profile = $this->profile();

        if (! $profile) {
            return redirect()->route('profile.create');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $profile->id,
            'bio' => 'nullable|string|max:1000',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($profile->profile_photo) {
                Storage::disk('public')->delete($profile->profile_photo);
            }
            $validated['profile_photo'] = $request->file('profile_photo')->store('profiles', 'public');
        }

        $profile->update($validated);

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy(): RedirectResponse
    {
        $profile = $this->profile();

        if ($profile) {
            if ($profile->profile_photo) {
                Storage::disk('public')->delete($profile->profile_photo);
            }

            $profile->delete();
        }

        return redirect()->route('profile.create')->with('success', 'Profil berhasil dihapus. Silakan buat profil baru.');
    }
}
