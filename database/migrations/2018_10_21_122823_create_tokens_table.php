<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('maked_by')->unsigned()->nullable();
            $table->integer('owned_by')->unsigned()->nullable();
            $table->string('assigned_to')->nullable();
            $table->string('value')->unique();
            $table->timestamp('owned_at')->nullable();
            $table->timestamps();
            $table->foreign('maked_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('owned_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}
