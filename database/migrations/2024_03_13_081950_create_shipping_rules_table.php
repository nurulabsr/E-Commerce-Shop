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
        Schema::create('shipping_rules', function (Blueprint $table) {
            $table->id();
            $table->string('rule_name');
            $table->string('shipping_type');
            $table->integer('min_amount');
            $table->integer('cost');
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table('shipping_rules', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('shipping_rules');
    }
};
