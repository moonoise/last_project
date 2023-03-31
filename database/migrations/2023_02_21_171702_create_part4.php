<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('part4', function (Blueprint $table) {
            // ข้อมูลส่วนที่ 4 : การศึกษาอบรม/งานด้านบริหาร
            $table->id();
            $table->unsignedBigInteger('part1_id');
            $table->enum('choices', ['1', '2'])->nullable()->default(null);
            $table->string('coursename')->nullable(); //ชื่อหลักสูตรที่อบรม
            $table->string('generation')->nullable(); //รุ่นที่
            $table->string('period')->nullable(); //ระยะเวลา
            $table->string('institution')->nullable(); //สภาบัน
            $table->timestamps();

            $table->foreign('part1_id')
            ->references('id')->on('part1')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('part4');
    }
};
