<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Registrationform extends Component
{
    public $date;
    public $time;
    public $name;
    public $email;
    public $contact;
    public $address;
    public $qualification1;
    public $grade1;
    public $qualification2;
    public $grade2;
    public $qualification3;
    public $grade3;
    public $education_country;
    public $interested_country;
    public $session_looking;
    public $year;
    public $courses;
    public $course_name;
    public $reference;

    public function render()
    {
        return view('livewire.registrationform');
    }

    public function registerform(){
        dd($name, $email, $contact);
    }
}
