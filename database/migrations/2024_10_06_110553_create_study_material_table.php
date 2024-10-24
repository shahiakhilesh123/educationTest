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
        Schema::create('study_material', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('course_id');
            $table->text('description');
            $table->text('long_description');
            $table->tinyInteger('mode')->default('1');
            $table->string('online_price')->default('0');
            $table->string('online_old_price')->default('0');
            $table->string('offline_price')->default('0');
            $table->string('offline_old_price')->default('0');
            $table->string('image')->default(null);
            $table->string('pdf_1')->default(null);
            $table->string('pdf_2')->default(null);
            $table->string('pdf_3')->default(null);
            $table->string('pdf_4')->default(null);
            $table->string('pdf_5')->default(null);
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
        Schema::dropIfExists('study_material');
    }
};
