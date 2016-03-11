<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $maxL = 50;
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug', 50);
            $table->text('content');
            $table->integer('nbNote')->default(0);
            $table->integer('category_id');
            $table->integer('user_id');
            $table->timestamps();
        });
        
        for($i=1;$i<3;$i++) {
            \App\Post::create([
           'name'=>'Post ' . $i,
            'slug'=>'post ' . $i,
            'content'=>'empty',
            'category_id'=>1,
            'user_id'=>1
        ]);
        }
        for($i=3;$i<5;$i++) {
            \App\Post::create([
                'name'=>'Post ' . $i,
                'slug'=>'post ' . $i,
                'content'=>'empty',
                'category_id'=>1,
                'user_id'=>2
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
