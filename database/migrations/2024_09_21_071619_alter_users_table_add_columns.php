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
            $table->string('username')->nullable();
            $table->string('contact_num', 20)->nullable();
            $table->string('street')->nullable();
            $table->string('barangay')->nullable();
            $table->string('municipality')->nullable();
            $table->enum('role', ['customer', 'pharmacist', 'rider', 'admin'])->default('customer');
            $table->string('user_image')->nullable();
            $table->string('valid_id_num', 50)->nullable();
            $table->string('valid_id_image')->nullable();
            $table->string('valid_id_type', 50)->nullable();

            // New columns for latitude and longitude
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'contact_num',
                'street',
                'barangay',
                'municipality',
                'role',
                'user_image',
                'valid_id_num',
                'valid_id_image',
                'valid_id_type',
                'latitude',
                'longitude' // Drop these if rolling back
            ]);
        });
    }
};
