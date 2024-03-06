<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitylist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universitylist', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->string('universityname')->nullable();
            $table->date('applied_date')->nullable();
            $table->string('offerstatus')->nullable();
            $table->string('fee')->nullable();
            $table->string('cas')->nullable();
            $table->string('visa')->nullable();
            $table->string('agent')->nullable();
            $table->string('deposit')->nullable();
            $table->string('medical')->nullable();
            $table->string('action')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('universitylist');
    }
}
