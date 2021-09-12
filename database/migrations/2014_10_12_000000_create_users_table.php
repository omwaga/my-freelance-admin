<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("email");
            $table->string("password");
            $table->string("name")->nullable();
            $table->string("first_name")->nullable();
            $table->string("second_name")->nullable();
            $table->double("balance")->default(0);
            $table->string('email_verified')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('member_since')->useCurrent();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_url')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('admin')->default(0);
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
        Schema::dropIfExists('users');
    }
}
