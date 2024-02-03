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
            $table->text('product_thumnail_img')->nullable();
            $table->string('product_name');
            $table->string('product_slug')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->double('product_price')->nullable();
            $table->double('product_offer_price');
            $table->date('product_offer_start_date')->nullable();
            $table->date('product_offer_end_date')->nullable();
            $table->text('product_short_description');
            $table->text('product_long_description');
            $table->text('product_video_link')->nullable();
            $table->string('product_Stock_keeping_unit');
            $table->string('product_type');
            $table->integer('is_product_approved')->default('0');
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
