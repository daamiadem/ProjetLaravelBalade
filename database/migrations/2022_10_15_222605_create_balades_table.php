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
        Schema::create('balades', function (Blueprint $table) {
            $table->id();
            $table->string('titleBalade');
            $table->text("descriptionBalade");
            $table->text("dateBalade");
            $table->integer("capaciteBalade");
            $table->text("imageDescBalade");
            $table->text("MoyensBalade");
            $table->text("Destination");
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
        Schema::dropIfExists('balades');
    }
};
