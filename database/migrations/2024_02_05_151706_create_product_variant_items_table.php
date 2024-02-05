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
        Schema::create('product_variant_items', function (Blueprint $table) {
            $table->id();
            $table->string("product_variant_item_name");
            $table->integer("product_variant_item_price");
            $table->boolean("product_variant_item_is_default");
            $table->boolean("product_variant_item_status");
            $table->integer("product_variant_item_product_variant_id");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table("product_variant_items", function(Blueprint $table){
           $table->dropSoftDeletes();
        });
        Schema::dropIfExists('product_variant_items');
    }
};
