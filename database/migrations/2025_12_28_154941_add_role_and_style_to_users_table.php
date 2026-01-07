<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'role')) {
                $table->enum('role', ['admin', 'student'])
                      ->default('student')
                      ->after('password');
            }

            if (!Schema::hasColumn('users', 'style')) {
                $table->enum('style', ['serius', 'santai'])
                      ->default('santai')
                      ->after('role');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
            if (Schema::hasColumn('users', 'style')) {
                $table->dropColumn('style');
            }
        });
    }

};
