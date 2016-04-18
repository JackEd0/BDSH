<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Card;

class CreateCardTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('card_type_id');
            $table->timestamps();
        });

        Card::create(['card_type_id' => 1,
        ]);
        Card::create(['card_type_id' => 2,
        ]);
        Card::create(['card_type_id' => 3,
        ]);
        Card::create(['card_type_id' => 4,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('cards');
    }
}
