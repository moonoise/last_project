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
        Schema::create('part3', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('part1_id');
            // ข้อมูลส่วนที่ 3 : ประวัติการศึกษา
            $table->string('edudegree')->nullable()->default(null);
            $table->string('eduqualification')->nullable(); //วุฒิการศึกษา
            $table->string('eduinstitution')->nullable();
            $table->string('eduyear')->nullable();
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
        Schema::dropIfExists('part2');
    }
};
