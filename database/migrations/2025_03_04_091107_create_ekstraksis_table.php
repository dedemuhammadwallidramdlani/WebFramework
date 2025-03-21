<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('ekstraksis', function (Blueprint $table) {
        $table->id(); // Kolom primary key
        $table->unsignedBigInteger('bahanbaku_id'); // Kolom foreign key
        $table->decimal('hasil_ekstraksi', 8, 2); // Kolom hasil ekstraksi
        $table->string('satuan_hasil'); // Kolom satuan hasil
        $table->date('tanggal_ekstraksi'); // Kolom tanggal ekstraksi
        $table->timestamps(); // Kolom created_at dan updated_at
    });
}

public function down()
{
    Schema::dropIfExists('ekstraksis');
}
};
