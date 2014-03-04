<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function($table)
        {
            $table->engine = 'InnoDB';

            $table->increments('userID');
            $table->string('username')->unique();
            $table->string('first_name');
            $table->string('last_name');

            $table->string('email');
            $table->string('phone')->nullable();
            $table->binary('photo')->nullable();

            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();

            $table->text('password');


            $table->boolean('is_admin')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement('ALTER TABLE `users` CHANGE `photo` `photo` LONGBLOB  NULL;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}
