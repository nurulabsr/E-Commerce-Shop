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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->text('admin_vendor_profile_banner')->nullable();
            $table->string('admin_vendor_profile_phone');
            $table->string('admin_vendor_profile_email');
            $table->text('admin_vendor_profile_address');
            $table->text('admin_vendor_profile_description');
            $table->text('admin_vendor_profile_facebook_url')->nullable();
            $table->text('admin_vendor_profile_twitter_url')->nullable();
            $table->text('admin_vendor_profile_insagram_url')->nullable();
            $table->boolean('admin_vendor_profile_status')->nullable();
            $table->integer('admin_vendor_profile_user_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendors', function(Blueprint $table){
           $table->dropSoftDeletes(); 
        });
        Schema::dropIfExists('vendors');
    }
};
