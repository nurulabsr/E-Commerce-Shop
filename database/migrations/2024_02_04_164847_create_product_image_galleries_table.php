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
        Schema::create('product_image_galleries', function (Blueprint $table) {
            $table->id();
            $table->text('product_image_gallery_img');
            $table->integer('product_image_gallery_product_id');
            $table->integer('product_vendor_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table('product_image_galleries', function(Blueprint $table){
           $table->dropSoftDeletes();
        });
        Schema::dropIfExists('product_image_galleries');
    }
};
