<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWritersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->nullable();
            $table->string('first_name')->nullable();
            $table->string('second_name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('gender');
            $table->string('certificate_path')->nullable();
            $table->bigInteger('completed_orders')->default(0);
            $table->bigInteger('incomplete_orders')->default(0);
            $table->double('account_balance')->default(0);
            $table->integer('rating')->default(0);
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->boolean('active')->default(1);
            $table->string('university')->nullable();
            $table->string('degree')->nullable();
            $table->longText('about')->nullable();
            $table->year('graduation_year')->nullable();
            $table->string('government_id_path')->nullable();
            $table->integer('success_rate')->default(0);
            $table->rememberToken();
            $table->boolean('email_verified')->default(0);
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_url')->nullable();
            $table->integer('position_in_rating')->default(0);
            $table->boolean('approved')->default(false);
            $table->boolean('failed_test')->nullable();
            $table->string('sample-essay')->nullable();
            $table->longText('verification_token')->nullable();
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
        Schema::dropIfExists('writers');
    }
}
