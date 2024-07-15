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
        Schema::create('question', function (Blueprint $table) {
            $table->id();
            $table->integer('test_id');
            $table->integer('question_type');
            $table->text('question');
            $table->text('option_one');
            $table->text('option_two');
            $table->text('option_three');
            $table->text('option_four');
            $table->text('answer');
            $table->text('duration');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('question');
    }
};
