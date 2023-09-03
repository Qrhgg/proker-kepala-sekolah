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
        Schema::create('kepalasekolah', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id');
            $table->string('nip', 20);
            $table->string('nama_kepalasekolah',50);
            $table->string('alamat',50);
            $table->string('no_hp',50);
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
        Schema::dropIfExists('kepalasekolahs');
    }
};
