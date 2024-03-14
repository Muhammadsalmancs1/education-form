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
    public $item_id;
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
    protected $listener = ['confirmdestroy'];


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
        $this->time = array_values($this->time);
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

    public function confirmDelete($item_id)
    {
        $this->item_id = $item_id;

        $this->dispatchBrowserEvent('swal:confirm', [
            'position' => 'center',
            'icon' => 'warning',
            'title' => 'Are You Sure?',
            'showConfirmButton' => true,
            'timer' => 0,
            'item_id' => $item_id,
        ]);
    }

    public function destroy()
    {
        $result = bookingleavedate_model::find($this->item_id)->delete();
    
        if ($result) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'center-center',
                'icon' => 'success',
                'title' => 'Record Deleted Successfully',
                'showConfirmButton' => false,
                'timer' => 2000,
            ]);
        } else {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'center-center',
                'icon' => 'error',
                'title' => 'Error Deleting Record',
                'showConfirmButton' => true,
                'timer' => 2000,
            ]);
        }
        $this->emit('refreshData');
    }


    // time delete
    public function timeDelete($item_id)
    {
        $this->item_id = $item_id;
        $result = bookingtimemodel::find($this->item_id)->delete();
        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Record Deleted Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
    }


    public function render()
    {
        $show = bookingleavedate_model::orderBy('id','DESC')->paginate(10); // assuming you want to paginate the results
        $listingtime = bookingtimemodel::orderBy('id','DESC')->paginate(10); 
        return view('livewire.registration.bookingleavedate', ['show' => $show, 'listingtime' => $listingtime]);
    }
}
