<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('organiser_id');
            $table->string('title');
            $table->date('date');
            $table->string('image');
            $table->text('preview');
            $table->text('file_content');
            $table->integer('hit');
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('organiser_id')->references('id')->on('organisers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
