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
        Schema::create('chapter', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('detail')->nullable();
            $table->text('pdf1')->nullable();
            $table->tinyInteger('pdf1_status')->default('0');
            $table->text('pdf2')->nullable();
            $table->tinyInteger('pdf2_status')->default('0');
            $table->text('pdf3')->nullable();
            $table->tinyInteger('pdf3_status')->default('0');
            $table->text('pdf4')->nullable();
            $table->tinyInteger('pdf4_status')->default('0');
            $table->text('video_links1')->nullable();
            $table->tinyInteger('video_links1_status')->default('0');
            $table->text('video_links2')->nullable();
            $table->tinyInteger('video_links2_status')->default('0');
            $table->text('video_links3')->nullable();
            $table->tinyInteger('video_links3_status')->default('0');
            $table->text('video_links4')->nullable();
            $table->tinyInteger('video_links4_status')->default('0');
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('captor');
    }
};
