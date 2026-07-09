<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductOptionsColumnsToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->text('product_options')->nullable()->after('alert_text');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->string('product_option')->nullable()->after('product_cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->dropColumn('product_options');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('product_option');
        });
    }
}
