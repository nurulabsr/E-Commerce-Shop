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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->text('brand_image')->nullable();
            $table->string('brand_name')->nullable();
            $table->boolean('is_brand_featured');
            $table->boolean('brand_status');
            $table->string('brand_slug');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
        Schema::table('brands', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
    }
};
