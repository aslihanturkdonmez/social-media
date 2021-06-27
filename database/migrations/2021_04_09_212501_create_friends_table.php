<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->id();
      /*       $table->foreignId('requester')->constrained()->onDelete('cascade');            
            $table->foreignId('user_requested')->constrained()->onDelete('cascade'); */
            $table->unsignedBigInteger('requester');
            $table->unsignedBigInteger('user_requested');
            
            $table->foreign('requester')->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
           
            $table->foreign('user_requested')->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('friends');
    }
}
