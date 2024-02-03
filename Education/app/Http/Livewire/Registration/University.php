<?php

namespace App\Http\Livewire\Registration;
use Livewire\WithPagination;
use App\Models\registration\universitymodel;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\Component;

class University extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $university;
    public $item_id;
    public $search = '';
    public $updateMode = false;
    protected $listeners = ['destroy'];

    protected $rules = [
        'university' => 'required|min:2',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function editRecord($item_id)
    {
        $record = universitymodel::find($item_id);
        $this->university = $record->university; 
        $this->item_id = $item_id; 
        $this->updateMode = true;
    }

    public function updateRecord()
{
    $validatedData =  $this->validate();
    universitymodel::find($this->item_id)->update([
        'university' => $validatedData['university'],
    ]);

    $this->dispatchBrowserEvent('close-model');

    $this->reset('university','updateMode');
}

public function closemodel()
{
    $this->reset('university','updateMode');
}


    public function saveuniversity()
    {
       $validatedData =  $this->validate(); 
       universitymodel::create($validatedData);
       
        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Record Add Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
         $this->reset('university');
        
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
        $result = universitymodel::find($this->item_id)->delete();
    
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
    public function render()
    {
        $query = universitymodel::query();
        if ($this->search) {
            $query->Where('university', 'like', '%' . $this->search . '%');

        }
        $show = $query->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.registration.university',compact('show'));
    }
}
