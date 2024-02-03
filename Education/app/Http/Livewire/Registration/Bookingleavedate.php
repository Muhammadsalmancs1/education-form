<?php

namespace App\Http\Livewire\Registration;
use Livewire\WithPagination;
use App\Models\registration\bookingleavedate_model;
use App\Models\registration\bookingtimemodel;

use RealRashid\SweetAlert\Facades\Alert;
use Livewire\Component;

class Bookingleavedate extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $developers = [
        ['leave_date' => '']
    ];
    public $time = [
        ['start_time' => '', 'end_time' => '']
    ];
    protected $rules = [
        'developers.*.leave_date' => 'required',
    ];
    protected $timeRules = [
        'time.*.start_time' => 'required',
        'time.*.end_time' => 'required',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function addDeveloper()
    {
        array_push($this->developers, ['leave_date' => '']);
    }
    public function removeindex($index)
    {
        unset($this->developers[$index]);
        $this->developers = array_values($this->developers);
    }
    protected $listeners = ['destroy'];

    public function bookingleavedate(){
     
        $validatedData =  $this->validate($this->rules); 
        $leaveDates = [];
        foreach ($this->developers as $item) {
            $leaveDates[] = ['leave_date' => $item['leave_date']];
        }
    
        bookingleavedate_model::insert($leaveDates);
        
         $this->dispatchBrowserEvent('swal', [
             'position' => 'center-center',
             'icon' => 'success',
             'title' => 'Date Add Successfully',
             'showConfirmButton' => false,
             'timer' => 2000,
         ]);
          $this->reset('developers');
    }



    // time section

    public function addtimerow()
    {
        array_push($this->time, ['start_time' => '', 'end_time' => '']);
    }
    public function removetimeindex($index)
    {
        unset($this->time[$index]);
        $this->index = array_values($this->time);
    }

    public function bookingtime(){
     
        $validatedData =  $this->validate($this->timeRules); 
        $times = [];
        foreach ($this->time as $item) {
            $times[] = ['start_time' => $item['start_time'], 'end_time' => $item['end_time']];
            
        }
   
        bookingtimemodel::insert($times);
        
         $this->dispatchBrowserEvent('swal', [
             'position' => 'center-center',
             'icon' => 'success',
             'title' => 'Time Add Successfully',
             'showConfirmButton' => false,
             'timer' => 2000,
         ]);
          $this->reset('time');
    }

    public function render()
    {
        return view('livewire.registration.bookingleavedate');
    }
}
