<?php

namespace App\Http\Livewire\Registration;

use App\Models\registration\referencemodel;
use Livewire\Component;
use Livewire\WithPagination;

class Reference extends Component
{use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $reference;
    public $item_id;
    public $search = '';
    public $updateMode = false;
    protected $listeners = ['destroy'];

    protected $rules = [
        'reference' => 'required|min:2',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function editRecord($item_id)
    {
        $record = referencemodel::find($item_id);
        $this->reference = $record->reference;
        $this->item_id = $item_id;
        $this->updateMode = true;
    }

    public function updateRecord()
    {
        $validatedData = $this->validate();
        referencemodel::find($this->item_id)->update([
            'reference' => $validatedData['reference'],
        ]);

        $this->dispatchBrowserEvent('close-model');

        $this->reset('reference', 'updateMode');
    }

    public function closemodel()
    {
        $this->reset('reference', 'updateMode');
    }

    public function savereference()
    {
        $validatedData = $this->validate();
        referencemodel::create($validatedData);

        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Record Add Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
        $this->reset('reference');

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
        $result = referencemodel::find($this->item_id)->delete();

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
        $query = referencemodel::query();
        if ($this->search) {
            $query->Where('reference', 'like', '%' . $this->search . '%');

        }
        $show = $query->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.registration.reference', compact('show'));
    }
}
