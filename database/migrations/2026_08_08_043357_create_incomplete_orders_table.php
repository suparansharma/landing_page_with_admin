<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncompleteOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomplete_orders', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->index();
            $table->unsignedBigInteger('landing_page_id')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
            
            $table->foreign('landing_page_id')->references('id')->on('landing_pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomplete_orders');
    }
}
