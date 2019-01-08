<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_perusahaan');
            $table->string('deskripsi_pendek');
            $table->text('deskripsi');
            $table->text('alamat');
            $table->string('hari_kerja');
            $table->string('jam_kerja');
            $table->string('telp1');
            $table->string('telp2');
            $table->string('telp3');
            $table->string('email')->nullable();
            $table->String('facebook')->nullable();
            $table->string('instagram')->nullable();
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
        Schema::drop('contacts');
    }
}
