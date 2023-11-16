<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            // Add the user_id column
            $table->unsignedBigInteger('user_id');

            // Add a foreign key constraint to connect the user_id to the id in the users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            // Remove the foreign key constraint
            $table->dropForeign(['user_id']);

            // Remove the user_id column
            $table->dropColumn('user_id');
        });
    }
}
