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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('NomParticipant');
            $table->text("PrenomParticipant");
            $table->text("MailParticipant");
            $table->text("EtatPhysique");
            $table->text("imageParticipant");
            $table->text("numParticipant");
            $table->text("AgeParticipant");
            $table->unsignedBigInteger('balade_id'); 
            $table->foreign('balade_id')->references('id')->on('balades')->onDelete('cascade'); 
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
        Schema::dropIfExists('participants');
    }
};
