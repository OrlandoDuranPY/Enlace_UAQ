<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('rol')->default('user'); // Roles: super_admin, admin, user
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'super_admin_enlace@email.com',
            'password' => Hash::make('SuperAdminEnlace'),
            'rol' => 'super_admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin_enlace@email.com',
            'password' => Hash::make('AdminEnlace'),
            'rol' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user_enlace@email.com',
            'password' => Hash::make('UserEnlace'),
            'rol' => 'user',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
