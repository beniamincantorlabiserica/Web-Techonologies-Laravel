<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $hashedPassword = $this->customHashPassword($validated['password']);

        $request->user()->update([
            'password' => $hashedPassword,
        ]);

        return back()->with('status', 'password-updated');
    }


    public function customHashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}

