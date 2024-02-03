<?php

namespace App\Http\Livewire\Registration;

use App\Models\registration\subagentmodel;
use Livewire\Component;
use Livewire\WithPagination;

class Subagent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $subagent;
    public $item_id;
    public $search = '';
    public $updateMode = false;
    protected $listeners = ['destroy'];

    protected $rules = [
        'subagent' => 'required|min:2',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function editRecord($item_id)
    {
        $record = subagentmodel::find($item_id);
        $this->subagent = $record->subagent;
        $this->item_id = $item_id;
        $this->updateMode = true;
    }

    public function updateRecord()
    {
        $validatedData = $this->validate();
        subagentmodel::find($this->item_id)->update([
            'subagent' => $validatedData['subagent'],
        ]);

        $this->dispatchBrowserEvent('close-model');

        $this->reset('subagent', 'updateMode');
    }
    public function closemodel()
    {
        $this->reset('subagent', 'updateMode');
    }

    public function savesubagent()
    {
        $validatedData = $this->validate();
        subagentmodel::create($validatedData);

        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Record Add Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
        $this->reset('subagent');

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
        $result = subagentmodel::find($this->item_id)->delete();

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

        $query = subagentmodel::query();
        if ($this->search) {
            $query->Where('subagent', 'like', '%' . $this->search . '%');

        }
        $show = $query->orderBy('id', 'DESC')->paginate(10);

        return view('livewire.registration.subagent', compact('show'));
    }
}
