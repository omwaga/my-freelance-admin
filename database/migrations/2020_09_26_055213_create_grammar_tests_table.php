<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrammarTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grammar_tests', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('choice_one');
            $table->string('choice_two');
            $table->string('choice_three');
            $table->string('choice_four');
            $table->string('answer');
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('grammar_tests');
    }
}
