<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('monk_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreignId('dzongkhag_id')
                  ->nullable()
                  ->constrained('dzongkhags')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreignId('gewog_id')
                  ->nullable()
                  ->constrained('gewogs')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreignId('village_id')
                  ->nullable()  
                  ->constrained('villages')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
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
        Schema::dropIfExists('addresses');
    }
}