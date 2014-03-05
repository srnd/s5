<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHooks extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webhooks', function($table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->bigInteger('applicationID')->unsigned()->index();
            $table->string('name');
            $table->string('event');
            $table->text('url');

            $table->foreign('applicationID')
                  ->references('applicationID')
                  ->on('applications')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');


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
        Schema::drop('webhooks');
    }

}
