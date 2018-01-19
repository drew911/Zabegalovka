<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->string('surname')->after('name');
          $table->date('date_of_birth')->after('surname');
          $table->integer('phone')->after('date_of_birth');
          $table->string('address')->after('phone');
          $table->string('city')->after('address');
          $table->integer('zip_code')->after('city');
          $table->string('country')->after('zip_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('zip_code');
            $table->dropColumn('country');
        });
    }
}
