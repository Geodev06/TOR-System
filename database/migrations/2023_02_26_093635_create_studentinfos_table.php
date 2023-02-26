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
        Schema::create('studentinfos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lrn')->unique();
            $table->string('firstname');
            $table->string('middlename')->nullable()->default('');
            $table->string('lastname');
            $table->string('birthdate');
            $table->integer('sex');
            $table->string('province');
            $table->string('town');
            $table->string('barrio')->nullable()->default('');
            $table->string('guardian');
            $table->string('guardian_address');
            $table->string('guardian_occupation')->nullable()->default('');
            $table->string('elem_school');
            $table->string('elem_school_year');
            $table->string('elem_years');
            $table->decimal('gen_ave', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentinfos');
    }
};
