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
        Schema::create('part2', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('part1_id');
            // ข้อมูลส่วนที่ 2 : ประวัติการรับราชการ / การทำงาน
            $table->enum('personneltype',[1,2])->nullable()->default(null);
            $table->string('office')->nullable();
            $table->string('division')->nullable();
            $table->string('position')->nullable();
            $table->string('positionlevel')->nullable();
            $table->string('position2')->nullable();
            $table->string('positionlevel2')->nullable();

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
