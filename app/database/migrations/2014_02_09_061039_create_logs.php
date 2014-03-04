<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogs extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function($table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('logID');

            // RFC 5424
            $table->enum('severity', ['debug', 'info', 'notice', 'warn', 'err', 'crit', 'alert', 'emerg']);

            $table->integer('applicationID')->unsigned()->nullable()->index();
            $table->integer('actor_userID')->unsigned()->nullable()->index();
            $table->integer('target_userID')->unsigned()->nullable()->index();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('logs');
    }

}
