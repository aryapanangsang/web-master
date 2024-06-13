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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();            
            $table->string('appplicant_name');
            $table->enum('gender',['Laki-laki','Perempuan']);
            $table->string('birth_of');
            $table->date('birth_of_date');
            $table->string('address');
            $table->string('phone_number');
            $table->string('education_level');
            $table->string('height');
            $table->string('weight');
            $table->string('identity_number')->unique();
            $table->string('npwp');
            $table->string('mother');
            $table->string('emergency_contact');
            $table->string('vaccine');
            $table->string('reference');
            $table->enum('office',['Cikarang','Purwakarta']);
            $table->string('company')->nullable();
            $table->string('pre_test')->nullable();
            $table->string('test1')->nullable();
            $table->string('test2')->nullable();
            $table->string('post_test1')->nullable();
            $table->string('post_test2')->nullable();
            $table->date('mcu_date')->nullable();
            $table->string('mcu_result')->nullable();
            $table->date('join_date')->nullable();
            $table->date('finished')->nullable();
            $table->string('status')->nullable();
            $table->string('information')->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
