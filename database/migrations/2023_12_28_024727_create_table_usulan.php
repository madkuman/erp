<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsulan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulan', function (Blueprint $table) {
            $table->id();
            $table->year('tahun')->nullable();
            $table->dateTime('tanggal_usulan')->nullable();
            $table->text('nama')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->json('dokumen_ids')->nullable();
            $table->integer('user_atasan_id')->nullable();
            $table->integer('allow_edit')->nullable();
            $table->text('indikator')->nullable();
            $table->text('target')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usulan');
    }
}
