<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplications extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function($table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('applicationID');

            $table->string('name');
            $table->text('description');

            // Authentication
            $table->string('token');
            $table->text('secret');

            // Permissions
            $table->boolean('whitelist_login')->default(false);
            $table->boolean('whitelist_extended')->default(false);
            $table->boolean('allow_internal')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('applications_admins', function($table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->bigInteger('applicationID')->unsigned()->index();
            $table->integer('admin_userID')->unsigned()->index();

            $table->timestamps();

            $table->foreign('admin_userID')
                  ->references('userID')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('applicationID')
                  ->references('applicationID')
                  ->on('applications')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        Schema::create('applications_users', function($table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->bigInteger('applicationID')->unsigned()->index();
            $table->integer('userID')->unsigned()->index();
            $table->string('code');
            $table->string('access_token');

            $table->boolean('allow_extended')->default(false);


            $table->foreign('userID')
                  ->references('userID')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

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
        Schema::drop('applications_users');
        Schema::drop('applications_admins');
        Schema::drop('applications');
    }

}
