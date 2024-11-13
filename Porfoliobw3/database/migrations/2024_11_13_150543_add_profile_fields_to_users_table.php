<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable();
            $table->date('birthday')->nullable();
            $table->string('profile_picture')->nullable(); // Opslag van profielfoto
            $table->text('about')->nullable(); // "Over mij" tekst
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'birthday', 'profile_picture', 'about']);
        });
    }
};
