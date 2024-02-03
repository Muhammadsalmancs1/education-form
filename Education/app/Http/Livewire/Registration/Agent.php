<?php

namespace App\Http\Livewire\Registration;

use App\Models\registration\agentmodel;
use Livewire\Component;
use Livewire\WithPagination;

class Agent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $agent;
    public $item_id;
    public $search = '';
    public $updateMode = false;
    protected $listeners = ['destroy'];

    protected $rules = [
        'agent' => 'required|min:2',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function editRecord($item_id)
    {
        $record = agentmodel::find($item_id);
        $this->agent = $record->agent;
        $this->item_id = $item_id;
        $this->updateMode = true;
    }

    public function updateRecord()
    {
        $validatedData = $this->validate();
        agentmodel::find($this->item_id)->update([
            'agent' => $validatedData['agent'],
        ]);

        $this->dispatchBrowserEvent('close-model');

        $this->reset('agent', 'updateMode');
    }

    public function closemodel()
    {
        $this->reset('agent', 'updateMode');
    }

    public function saveagent()
    {
        $validatedData = $this->validate();
        agentmodel::create($validatedData);

        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Record Add Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
        $this->reset('agent');

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
        $result = agentmodel::find($this->item_id)->delete();

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
        $query = agentmodel::query();
        if ($this->search) {
            $query->Where('agent', 'like', '%' . $this->search . '%');

        }
        $show = $query->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.registration.agent', compact('show'));
    }
}
