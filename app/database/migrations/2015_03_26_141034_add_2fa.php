<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add2fa extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('users_2fa', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
            $table->integer('userID')->unsigned()->index();
			$table->enum('type', ['totp', 'yubikey']);
            $table->text('private');

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
        Schema::drop('users_2fa');
    }

}
