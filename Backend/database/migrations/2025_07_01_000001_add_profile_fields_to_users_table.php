<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 20)->unique()->nullable()->after('email');
            $table->string('country', 100)->nullable()->after('phone');
            $table->string('account_type', 20)->nullable()->after('country');
            $table->string('school_name', 255)->nullable()->after('account_type');
            $table->string('address', 500)->nullable()->after('school_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'country', 'account_type', 'school_name', 'address']);
        });
    }
};
