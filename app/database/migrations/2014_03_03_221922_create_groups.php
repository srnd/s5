<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroups extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function($table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name')->unique();
            $table->text('description');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('users_groups', function($table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('userID')->unsigned()->index();
            $table->integer('groupID')->unsigned()->index();

            $table->foreign('userID')
                  ->references('userID')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('groupID')
                  ->references('id')
                  ->on('groups')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

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
        Schema::drop('groups');
        Schema::drop('users_groups');
    }

}
