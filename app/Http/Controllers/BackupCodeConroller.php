<?php

protected function generateBackupCodes()
{
    return array_map(fn() => strtoupper(Str::random(10)), range(1, 5));
}

public function verifyBackupCode(Request $request)
{
    $user = $request->user();
    $backupCodes = json_decode($user->2fa_backup_codes, true);

    if (in_array($request->input('backup_code'), $backupCodes)) {
        $remainingCodes = array_diff($backupCodes, [$request->input('backup_code')]);
        $user->update(['2fa_backup_codes' => json_encode($remainingCodes)]);

        return redirect()->route('dashboard')->with('success', '2FA verified.');
    } else {
        return back()->withErrors(['backup_code' => 'Invalid backup code.']);
    }
}
