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
        Schema::table('orders', function (Blueprint $table) {
            // Drop foreign key constraint terlebih dahulu
            $table->dropForeign(['customer_id']);
            
            // Ubah kolom customer_id menjadi nullable
            $table->foreignId('customer_id')->nullable()->change();
            
            // Tambahkan kembali foreign key dengan nullable
            $table->foreign('customer_id')
                  ->references('customer_id')
                  ->on('customers')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop foreign key
            $table->dropForeign(['customer_id']);
            
            // Ubah kembali menjadi not nullable
            $table->foreignId('customer_id')->nullable(false)->change();
            
            // Tambahkan kembali foreign key dengan cascade delete
            $table->foreign('customer_id')
                  ->references('customer_id')
                  ->on('customers')
                  ->cascadeOnDelete();
        });
    }
};
