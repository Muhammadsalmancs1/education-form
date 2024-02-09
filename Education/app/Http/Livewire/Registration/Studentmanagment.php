<?php

namespace App\Http\Livewire\Registration;
use Livewire\WithPagination;
use App\Models\registerformmodel;
use App\Models\registration\sessionmodel;
use App\Models\registration\counselorcurrency;
use App\Models\registration\referencemodel;
use Spatie\Permission\Models\Role;
use App\Models\usermanage\manageusermodel;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\Component;

class Studentmanagment extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];
    public $view;
    public $search="";
// search variables
    public $search_ref;
    public $search_counselor;
    public $search_session;
// update status
public $statusChanges = [];


    public function view($id){
        $result= registerformmodel::find($id);
        $this->view = $result; 

    }

    // delete record
    public function deleteRecord($item_id)
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
        $result = registerformmodel::find($this->item_id)->delete();
    
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

// reset filter
public function search_reset(){
    $this->search_ref = '';
    $this->search_counselor = '';
    $this->search_session = ''; 
}



    public function search($search){
     $this->search = $search;
    }

    // status update
    public function status_update($id)
    {
        $student = registerformmodel::find($id);
        if ($student) {
            $status = $this->statusChanges[$id]; // Get the selected status string
            $student->status = $status;
            $student->update();
            $this->dispatchBrowserEvent('swal', [
                'position' => 'center-center',
                'icon' => 'success',
                'title' => 'Record Updated Successfully',
                'showConfirmButton' => false,
                'timer' => 2000,
            ]);
            $this->render();
        }
    }


    public function render()
    {
        $query = registerformmodel::query();
        
    if ($this->search_session) {
        $query->where('Session_Looking', $this->search_session);
    }

    if ($this->search_counselor) {
        $query->where('Counselor', $this->search_counselor);
    }
    if ($this->search_ref) {
        $query->where('Refferene', $this->search_ref);
    }
        if ($this->search == "Inquiry") {
            $query->where('status', 'Inquiry');
        }
        if ($this->search == "In Progress") {
            $query->where('status', 'In Progress');
        }
        if ($this->search == "Paid") {
            $query->where('status', 'Paid');
        }
        if ($this->search == "Cas/T20") {
            $query->where('status', 'Cas/T20');
        }
        if ($this->search == "Visa") {
            $query->where('status', 'Visa');
        }

        if ($this->search == "Visa Accepted") {
            $query->where('status', 'Visa Accepted');
        }

        if ($this->search == "Visa Accepted") {
            $query->where('status', 'Visa Accepted');
        }
        $show = $query->orderBy('id', 'DESC')->paginate(10);
        $referal = referencemodel::get();
        $session= sessionmodel::get();
        $counselor = manageusermodel::where('role','Counselor')->get();
        return view('livewire.registration.studentmanagment',compact('show','referal','session','counselor'));
    }


  
}
