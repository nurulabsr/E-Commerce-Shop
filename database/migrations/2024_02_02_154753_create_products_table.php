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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('product_thumnail_img');
            $table->string('product_name');
            $table->string('product_slug');
            $table->integer('product_quantity');
            $table->double('product_price');
            $table->double('product_offer_price');
            $table->date('product_offer_start_date');
            $table->date('product_offer_end_date');
            $table->text('product_short_description');
            $table->text('product_long_description');
            $table->text('product_video_link');
            $table->string('product_Stock_keeping_unit');
            $table->boolean('is_product_top');
            $table->boolean('is_product_best');
            $table->boolean('is_product_featured');
            $table->boolean('product_status');
            $table->text('product_SEO_title');
            $table->text('product_SEO_description');
            $table->integer('product_vendor_id');
            $table->integer('product_brand_id');
            $table->integer('product_category_id');
            $table->integer('product_sub_category_id');
            $table->integer('product_child_category_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
