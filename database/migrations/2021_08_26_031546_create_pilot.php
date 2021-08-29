<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilots', function (Blueprint $table) {
            $table->id();
            $table->integer('no_kontak');
            $table->string('no_license')->unique();
            $table->date('masa_berlaku');
            $table->string('riwayat_training')->nullable();
            $table->timestamps();
            $table->foreignId('user_id')
                    ->nullable()
                    ->unsignedInteger()
                    ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreignId('satker_id')
                    ->nullable()
                    ->unsignedInteger()
                    ->references('id')
                  ->on('satkers')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pilots');
    }
}
