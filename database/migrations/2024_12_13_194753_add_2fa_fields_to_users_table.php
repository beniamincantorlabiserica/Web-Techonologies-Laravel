<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_2fa_enabled')->default(false);
            $table->string('2fa_method')->nullable(); // e.g., 'google_auth', 'sms'
            $table->text('2fa_secret')->nullable(); // for Google Authenticator
            $table->json('2fa_backup_codes')->nullable(); // for backup codes
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
