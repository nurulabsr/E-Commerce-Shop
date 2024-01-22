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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->text('slider_banner')->nullable();
            $table->string('slider_type')->nullable();
            $table->string('slider_title')->nullable();
            $table->integer('product_price_slider')->nullable();
            $table->string('slider_button_url')->nullable();
            $table->integer('slider_serial')->nullable();
            $table->boolean('slider_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table('sliders', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('sliders');
        
    }
};
