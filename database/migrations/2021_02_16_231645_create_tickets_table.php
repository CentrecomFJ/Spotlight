<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('account_id')->unsigned();
            $table->integer('ticket_category_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('priority')->nullable();
            $table->longText('message')->nullable();
            $table->string('status');

            //foreign keys
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('ticket_category_id')->references('id')->on('ticket_categories');

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
        Schema::dropIfExists('tickets');
    }
}
