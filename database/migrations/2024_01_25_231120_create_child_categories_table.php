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
        Schema::create('child_categories', function (Blueprint $table) {
            $table->id();
            $table->string('child_category_name');
            $table->string('child_category_slug');
            $table->boolean('child_category_status');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('child_categories', function(Blueprint $table){
             $table->dropSoftDeletes();
        });
        Schema::dropIfExists('child_categories');
    }
};
