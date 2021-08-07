<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monks', function (Blueprint $table) {
            $table->id();

            $table->string('cid')->unique();
            $table->string('regno');
            $table->date('dob');
            $table->string('choename');
            
            $table->string('regage');
            $table->year('year');
            
            $table->string('image');

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreignId('position_id')
                  ->nullable()
                  ->constrained('positions')
                  ->onUpdate('cascade')
                  ->onDelete('set null');

            $table->foreignId('dratshang_id')
                  ->nullable()
                  ->constrained('dratshangs')
                  ->onUpdate('cascade')
                  ->onDelete('set null');

            $table->foreignId('education_id')
                ->nullable()
                ->constrained('educations')
                ->onUpdate('cascade')
                ->onDelete('set null');
            
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
        Schema::dropIfExists('monks');
    }
}
