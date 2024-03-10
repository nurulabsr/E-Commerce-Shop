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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('layout');
            $table->string('email');
            $table->string('currency');
            $table->string('currency_icon');
            $table->string('timezone');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table('general_settings', function(Blueprint $table){
           $table->dropSoftDeletes();
        });
        Schema::dropIfExists('general_settings');
    }
};
