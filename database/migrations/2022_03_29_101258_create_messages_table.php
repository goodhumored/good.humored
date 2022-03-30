<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('text');
            $table->unsignedBigInteger('from_id');
            $table->unsignedBigInteger('attachment_id');
            $table->unsignedBigInteger('peer_id');
            $table->foreign('from_id')->references('id')->on('users');
            $table->foreign('attachment_id')->references('id')->on('attachments');
            $table->foreign('peer_id')->references('id')->on('chats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
