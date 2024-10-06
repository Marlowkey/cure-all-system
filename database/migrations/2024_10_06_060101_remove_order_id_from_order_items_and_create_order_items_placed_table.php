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
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['order_id']); // Drop the foreign key
            $table->dropColumn('order_id');
        });

        // Create the order_items_placed table
        Schema::create('order_items_placed', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('medicine_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the order_items_placed table
        Schema::dropIfExists('order_items_placed');

        // Re-add the order_id column to order_items
        Schema::table('order_items', function (Blueprint $table) {
            $table->foreignId('order_id')->nullable()->constrained()->onDelete('cascade');
        });
    }
};
