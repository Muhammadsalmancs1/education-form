<?php

namespace App\Http\Livewire\Registration;

use App\Models\registration\sessionmodel;
use Livewire\Component;
use Livewire\WithPagination;

class Session extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $session;
    public $item_id;
    public $search = '';
    public $updateMode = false;
    protected $listeners = ['destroy'];

    protected $rules = [
        'session' => 'required|min:2',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function editRecord($item_id)
    {
        $record = sessionmodel::find($item_id);
        $this->session = $record->session;
        $this->item_id = $item_id;
        $this->updateMode = true;
    }

    public function updateRecord()
    {
        $validatedData = $this->validate();
        sessionmodel::find($this->item_id)->update([
            'session' => $validatedData['session'],
        ]);

        $this->dispatchBrowserEvent('close-model');

        $this->reset('session', 'updateMode');
    }
    public function closemodel()
    {
        $this->reset('session', 'updateMode');
    }

    public function savesession()
    {
        $validatedData = $this->validate();
        sessionmodel::create($validatedData);

        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Record Add Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
        $this->reset('session');

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
        $result = sessionmodel::find($this->item_id)->delete();

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
        $query = sessionmodel::query();
        if ($this->search) {
            $query->Where('session', 'like', '%' . $this->search . '%');

        }
        $show = $query->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.registration.session', compact('show'));
    }
}
