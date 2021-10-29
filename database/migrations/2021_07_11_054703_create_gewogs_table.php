<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGewogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gewogs', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->foreignId('dzongkhag_id')
                  ->nullable()
                  ->constrained('dzongkhags')
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
        Schema::dropIfExists('gewogs');
    }
}
