<?php

namespace App\Http\Livewire\Transection;
use App\Models\registerformmodel;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\usermanage\manageusermodel;


class AssignCounselors extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $counselor;
    public $showAssignedCounselor = false;
    public $assigncounselors = true;
    public $search = '';
    public $assignupdate = [];
    public $students = [];
    public function counselorasign(){
   
        foreach ($this->students as $student) {
            registerformmodel::where('id', $student)->update(['Counselor' => $this->counselor]);
        }
        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Counselor Assigned',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
        $this->reset('students','counselor');
    }

    public function assignedtable(){
        $this->showAssignedCounselor = true;
        $this->assigncounselors = false;

    }
    public function assigntable(){
        $this->showAssignedCounselor = false;
        $this->assigncounselors = true;

    }

    public function updateassigncounselor($id){
        $result = registerformmodel::find($id);
        $result->Counselor = $this->assignupdate[$id];
        $result->update();
        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Counselor Assign Updated',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
        
    }
    public function render()
    {
        $query = registerformmodel::query();
        $query->where('Counselor',Null);
        if ($this->search) {
            $query->where(function($q) {
                $q->where('Student_name', 'like', '%'.$this->search.'%')
                  ->orWhere('Student_contact', 'like', '%'.$this->search.'%')
                  ->orWhere('Student_email', 'like', '%'.$this->search.'%')
                  ->orWhere('Refferene', 'like', '%'.$this->search.'%')
                  ->orWhere('Year', 'like', '%'.$this->search.'%')
                  ->orWhere('Session_Looking', 'like', '%'.$this->search.'%')
                  ->orWhere('Interested_Country', 'like', '%'.$this->search.'%')
                  ->orWhere('Date', 'like', '%'.$this->search.'%');
            });
        }
        $show = $query->orderBy('id', 'DESC')->get();
        $assigned = registerformmodel::where('Counselor','!=',Null)->get();
        $counse = manageusermodel::where('role','Counselor')->get();
        return view('livewire.transection.assign-counselors',compact('show','assigned','counse'));
    }
}
