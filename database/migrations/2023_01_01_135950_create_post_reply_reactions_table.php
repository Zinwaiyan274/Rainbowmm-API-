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
        Schema::create('post_reply_reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_reaction_id')->constrained('post_reactions')->onDelete('cascade');
            $table->longText('reply_comment')->nullable();
            $table->enum('reply_like',['true','false'])->default('false')->nullable();
            $table->integer('reply_user_id');
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
        Schema::dropIfExists('post_reply_reactions');
    }
};
