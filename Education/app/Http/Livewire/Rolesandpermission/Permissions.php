<?php

namespace App\Http\Livewire\Rolesandpermission;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $permission;
    public $item_id;
    public $updateMode = false;
    public $search = '';
    protected $listeners = ['destroy'];
    protected $rules = [
        'permission' => 'required|min:2',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function editRecord($item_id)
    {
        $record = Permission::find($item_id);
        $this->permission = $record->name;
        $this->item_id = $item_id;
    }

    public function updateRecord()
    {
        $validatedData = $this->validate();
        $store = Permission::find($this->item_id);
        $store->name = $this->permission;
        $store->update();
        if ($store) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'center-center',
                'icon' => 'success',
                'title' => 'Permission Updated Successfully',
                'showConfirmButton' => false,
                'timer' => 2000,
            ]);
            $this->dispatchBrowserEvent('close-model');
            $this->reset('permission');
        }
    }

    public function closemodel()
    {
        $this->reset('permission');
    }

    public function savepermission()
    {
        $validatedData = $this->validate();
        $store = new Permission;
        $store->name = $this->permission;
        $store->save();
        if ($store) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'center-center',
                'icon' => 'success',
                'title' => 'Permission Added Successfully',
                'showConfirmButton' => false,
                'timer' => 2000,
            ]);
            $this->reset('permission');
            $this->dispatchBrowserEvent('close-model');
        } else {

        }

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
        $result = Permission::find($this->item_id)->delete();

        if ($result) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'center-center',
                'icon' => 'success',
                'title' => 'Permission Deleted Successfully',
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
        $show = Permission::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.rolesandpermission.permissions', compact('show'));
    }
}
