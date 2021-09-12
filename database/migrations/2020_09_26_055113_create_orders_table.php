<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->startingValue(3000);
            $table->string('user_id');
            $table->string('type');
            $table->string('service');
            $table->timestamp('deadline')->useCurrent();
            $table->string('language')->nullable();
            $table->integer('pages');
            $table->string('level');
            $table->string('topic')->nullable();
            $table->integer('sources')->nullable();
            $table->string('subject')->nullable();
            $table->string('style')->nullable();
            $table->longText('instructions')->nullable();
            $table->boolean('draft')->default(false);
            $table->boolean('bidding')->default(false);
            $table->boolean('in_progress')->default(false);
            $table->boolean('completed')->default(false);
            $table->boolean('cancelled')->default(false);
            $table->double('price');
            $table->date('order_date')->useCurrent();
            $table->timestamp('order_completed_at')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
