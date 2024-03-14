<?php

namespace App\Http\Livewire;

use App\Models\registration\counselorcurrency;
use Livewire\Component;
use Livewire\WithPagination;

class Counselor extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $currency;
    public $item_id;
    public $search = '';
    public $updateMode = false;
    protected $listeners = ['destroy'];

    protected $rules = [
        'currency' => 'required|min:2',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function editRecord($item_id)
    {
        $record = counselorcurrency::find($item_id);
        $this->currency = $record->currency;
        $this->item_id = $item_id;
        $this->updateMode = true;
    }

    public function updateRecord()
    {
        $validatedData = $this->validate();
        counselorcurrency::find($this->item_id)->update([
            'currency' => $validatedData['currency'],
        ]);

        $this->dispatchBrowserEvent('close-model');

        $this->reset('currency', 'updateMode');
    }

    public function closemodel()
    {
        $this->reset('currency', 'updateMode');
    }

    public function savecounselor()
    {
        $validatedData = $this->validate();
        counselorcurrency::create($validatedData);

        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Record Add Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
        $this->reset('currency');

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
        $result = counselorcurrency::find($this->item_id)->delete();

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
    }
    public function render()
    {
        $query = counselorcurrency::query();
        if ($this->search) {
            $query->Where('currency', 'like', '%' . $this->search . '%');

        }
        $show = $query->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.counselor', compact('show'));
    }
}
