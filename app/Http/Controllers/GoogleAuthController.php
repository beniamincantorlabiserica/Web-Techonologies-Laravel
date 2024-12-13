<?php

namespace App\Http\Controllers;

use PragmaRX\Google2FA\Google2FA;

public function enableGoogle2FA(Request $request)
{
    $user = $request->user();
    $google2fa = new Google2FA();
    $secret = $google2fa->generateSecretKey();

    $user->update([
        '2fa_secret' => encrypt($secret),
        '2fa_method' => 'google_auth',
        'is_2fa_enabled' => true,
        '2fa_backup_codes' => json_encode($this->generateBackupCodes()),
    ]);

    $qrCodeUrl = $google2fa->getQRCodeUrl(
        config('app.name'),
        $user->email,
        $secret
    );

    return view('2fa.qrcode', compact('qrCodeUrl'));
}


public function verifyGoogle2FA(Request $request)
{
    $google2fa = new Google2FA();
    $user = $request->user();
    $secret = decrypt($user->2fa_secret);

    if ($google2fa->verifyKey($secret, $request->input('otp'))) {
        // Successful verification
        return redirect()->route('dashboard')->with('success', '2FA enabled.');
    } else {
        // Failed verification
        return back()->withErrors(['otp' => 'Invalid OTP.']);
    }
}

