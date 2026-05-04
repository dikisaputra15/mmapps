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
        Schema::create('mmstatistiks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_listing');
            $table->bigInteger('post_id_cat');
            $table->date('listing_date')->nullable();
            $table->string('time_incident')->nullable();
            $table->string('post_title');
            $table->text('address');
            $table->string('regency_city');
            $table->string('province_name');
            $table->string('country');
            $table->string('location');
            $table->string('main_incident');
            $table->string('incident_category')->nullable();
            $table->string('incident_type')->nullable();
            $table->string('sub_incident_type')->nullable();
            $table->string('weapon_type')->nullable();
            $table->string('sub_weapon')->nullable();
            $table->string('actor')->nullable();
            $table->string('actor_type')->nullable();
            $table->string('sub_actor_type')->nullable();
            $table->string('actor_gender')->nullable();
            $table->string('actor_age')->nullable();
            $table->string('target')->nullable();
            $table->string('sub_target')->nullable();
            $table->string('sub_target_intel_mil')->nullable();
            $table->string('target_type')->nullable();
            $table->string('target_gender')->nullable();
            $table->string('target_age')->nullable();
            $table->string('violence')->nullable();
            $table->integer('number_of_incident');
            $table->integer('number_of_injuries');
            $table->integer('number_of_fatalities');
            $table->text('article_link')->nullable();
            $table->string('number_of_protest')->nullable();
            $table->text('issue')->nullable();
            $table->text('additional_info');
            $table->date('date_posting');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mmstatistiks');
    }
};
