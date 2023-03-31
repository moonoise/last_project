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
        Schema::create('part1', function (Blueprint $table) {
            $table->id();
            $table->string('prefix')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('nickname')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('age')->nullable();
            $table->string('religion')->nullable();
            $table->string('idcard')->nullable();
            $table->string('royalorchidplusno')->nullable();
            $table->string('bloodtype')->nullable();
            $table->string('congenitaldisease')->nullable();

            $table->string('email')->nullable();
            $table->string('lineid')->nullable();
            $table->string('homeaddress')->nullable();
            $table->string('workingaddress')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('mobile')->nullable();

            $table->string('personfullname')->nullable();
            $table->string('personrelationship')->nullable();
            $table->string('personmobile')->nullable();

            $table->string('enprefix')->nullable();
            $table->string('enfname')->nullable();
            $table->string('enlname')->nullable();
            $table->string('enposition')->nullable();
            $table->string('endivision')->nullable();
            $table->string('endepartment')->nullable();
            $table->string('enministry')->nullable();

            // ข้อมูลส่วนที่ 5 : ลักษณะของงานที่รับผิดชอบ
            $table->longText('jobdescript')->nullable();

            // ข้อมูลส่วนที่ 6 : ความตั้งใจที่จะนำความรู้ที่ได้รับจากการศึกษาอบรมไปประยุกต์ใช้ประโยชน์ และแนวทางการดำเนินการ
            $table->longText('descriptapplyforjob')->nullable();
            $table->string('token')->unique();
            $table->enum('consent',[1,2])->nullable();
            $table->enum('registerstatus',[0,1])->nullable()->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('part1');
    }
};
