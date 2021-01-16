<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::create will make a new table
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            //unsigned() is a MySQL data type. This means we cannot insert a negative number
            $table->bigInteger('role_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        // Schema::table will update an existing table
        Schema::table('role_user', function (Blueprint $table) {

            // foreign means we are pointing the value of this column to a key(column) on another table
            // refrences means we want to get the value for this table from the id column on the roles table
            // onCascade('delete') means the child table can update/delete parent table and vice versa
            $table->foreign('role_id')->references('id')->on('roles')
            ->onCascade('delete');
            $table->foreign('user_id')->references('id')->on('users')
            ->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
