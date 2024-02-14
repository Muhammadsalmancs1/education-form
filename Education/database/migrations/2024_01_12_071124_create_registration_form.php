<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_form', function (Blueprint $table) {
            $table->id();
            $table->date('Date');
            $table->dateTimeTz('time', $precision = 0);
            $table->integer('timeid')->nullable();
            $table->string('Meeting_type')->nullable();
            $table->string('Student_name');
            $table->string('Student_email')->nullable();
            $table->string('Student_contact');
            $table->string('Student_address');
            $table->string('Qualification_1')->nullable();
            $table->string('Grade_1');
            $table->string('Qualification_2')->nullable();
            $table->string('Grade_2');
            $table->string('Qualification_3');
            $table->string('Grade_3');
            $table->string('Education_country');
            $table->string('Interested_Country');
            $table->string('Session_Looking');
            $table->string('Year');
            $table->string('Courses');
            $table->string('Courses_name');
            $table->string('Refferene');
            $table->string('Counselor')->nullable();

            $table->string('Status')->default('Pending');
            $table->text('Message');
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
        Schema::dropIfExists('registration_form');
    }
}
