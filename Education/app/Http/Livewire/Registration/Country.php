<?php

namespace App\Http\Livewire\Registration;
use Livewire\WithPagination;
use App\Models\registration\countrymodel;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\Component;

class Country extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $country;
    public $item_id;
    public $updateMode = false;
    public $search = '';
    protected $listeners = ['destroy'];
    protected $rules = [
        'country' => 'required|min:2',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function editRecord($item_id)
    {
        $record = countrymodel::find($item_id);
        $this->country = $record->country; 
        $this->item_id = $item_id; 
        $this->updateMode = true;
    }

    public function updateRecord()
{
    $validatedData =  $this->validate();
    countrymodel::find($this->item_id)->update([
        'country' => $validatedData['country'],
    ]);

    $this->dispatchBrowserEvent('close-model');

    $this->reset('country','updateMode');
}

public function closemodel()
{
    $this->reset('country','updateMode');
}

    public function savecountry()
    {
       $validatedData =  $this->validate(); 
       countrymodel::create($validatedData);
       
        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Record Add Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
         $this->reset('country');
        
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
        $result = CountryModel::find($this->item_id)->delete();
    
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
        $query = countrymodel::query();
        if ($this->search) {
            $query->Where('country', 'like', '%' . $this->search . '%');

        }
        $show = $query->orderBy('id', 'DESC')->paginate(10);
       

        return view('livewire.registration.country', compact('show'));
    }
}
