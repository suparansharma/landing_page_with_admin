<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('main_image')->nullable();
            $table->string('secondary_image')->nullable();
            $table->text('features')->nullable();
            $table->string('premium_text')->nullable();
            $table->string('weight_text')->nullable();
            $table->string('old_price')->nullable();
            $table->string('current_price')->nullable();
            $table->string('delivery_text')->nullable();
            $table->string('guarantee_text')->nullable();
            $table->string('alert_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landing_pages');
    }
}
