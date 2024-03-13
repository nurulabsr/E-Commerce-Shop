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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_name');
            $table->string('coupon_code');
            $table->string('max_use');
            $table->integer('quantity');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('discount_type');
            $table->string('discount_value');
            $table->boolean('status');
            $table->integer('total_used');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table('coupons', function(Blueprint $table){
           $table->dropSoftDeletes();
        });
        Schema::dropIfExists('coupons');
    }
};
