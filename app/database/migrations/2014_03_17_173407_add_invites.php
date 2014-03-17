<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvites extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invites', function($table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('code');
            $table->string('only_for_description');

            $table->timestamps();
        });

        Schema::create('invites_groups', function($table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('inviteID')->unsigned()->index();
            $table->integer('groupID')->unsigned()->index();

            $table->foreign('inviteID')
                  ->references('id')
                  ->on('invites')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('groupID')
                  ->references('id')
                  ->on('groups')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invites');
        Schema::drop('invites_groups');
    }

}
