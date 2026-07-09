<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrackingColumnsToLandingPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->string('meta_pixel_id')->nullable()->after('product_options');
            $table->string('gtm_id')->nullable()->after('meta_pixel_id');
            $table->string('ga4_id')->nullable()->after('gtm_id');
            $table->string('google_ads_id')->nullable()->after('ga4_id');
            $table->string('google_ads_label')->nullable()->after('google_ads_id');
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
            $table->dropColumn(['meta_pixel_id', 'gtm_id', 'ga4_id', 'google_ads_id', 'google_ads_label']);
        });
    }
}
