<?php

use Twilio\Rest\Client;

public function sendSmsOtp(Request $request)
{
    $user = $request->user();
    $otp = rand(100000, 999999);
    cache()->put("otp_{$user->id}", $otp, now()->addMinutes(5));

    $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
    $twilio->messages->create(
        $user->phone,
        [
            'from' => env('TWILIO_FROM'),
            'body' => "Your OTP is: $otp"
        ]
    );

    return response()->json(['message' => 'OTP sent']);
}

public function verifySmsOtp(Request $request)
{
    $user = $request->user();
    $otp = cache()->get("otp_{$user->id}");

    if ($request->input('otp') == $otp) {
        cache()->forget("otp_{$user->id}");
        return redirect()->route('dashboard')->with('success', '2FA verified.');
    } else {
        return back()->withErrors(['otp' => 'Invalid OTP.']);
    }
}
