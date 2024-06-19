<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('meta_tag')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('keyword')->nullable();
            $table->string('youtube')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('slider_header')->nullable();
            $table->string('slider_text')->nullable();
            $table->string('file')->nullable();
            $table->string('category')->nullable();
            $table->string('secound_row_first_title')->nullable();
            $table->string('secound_row_first_file')->nullable();
            $table->string('secound_row_first_link')->nullable();
            $table->string('secound_row_secound_col_category')->nullable();
            $table->string('secound_row_third_file')->nullable();
            $table->string('third_row_category')->nullable();
            $table->string('fourth_row_first_image')->nullable();
            $table->string('fourth_row_first_link')->nullable();
            $table->string('fourth_row_secound_cat')->nullable();
            $table->string('fifth_row_first_cat')->nullable();
            $table->string('fifth_row_second_cat')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
