<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('customer_name', 100)->nullable()->after('customer_id');
            $table->string('email', 100)->nullable()->after('customer_name');
            $table->text('address')->nullable()->after('email');
            $table->string('snap_token')->nullable()->after('remaining_amount');
            $table->string('transaction_id')->nullable()->after('snap_token');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['customer_name', 'email', 'address', 'snap_token', 'transaction_id']);
        });
    }
};