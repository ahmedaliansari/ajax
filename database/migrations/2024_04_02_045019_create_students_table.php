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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('gender',['Male','Female']);
            $table->enum('status',['Active','InActive'])->default('InActive');
            $table->enum('jobs',['Graphics Designer','Web Developer','Ios Developer','Full Stack Developer']);
            $table->LongText('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
