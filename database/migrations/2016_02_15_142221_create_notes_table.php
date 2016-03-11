<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('post_id');
            $table->integer('user_id');
            $table->timestamps();
        });
        \App\Note::create([
            'content'=>'vide1',
            'post_id'=>1,
            'user_id'=>1
        ]);
        \App\Note::create([
            'content'=>'vide1',
            'post_id'=>2,
            'user_id'=>1
        ]);
        \App\Note::create([
            'content'=>'vide1',
            'post_id'=>2,
            'user_id'=>2
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notes');
    }
}
