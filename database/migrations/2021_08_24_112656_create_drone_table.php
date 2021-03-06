<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Satker;

class CreateDroneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drones', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pesawat');
            $table->string('merk');
            $table->string('keterangan')->nullable();
            $table->string('tanda_pengenal')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('drones');
    }
}
