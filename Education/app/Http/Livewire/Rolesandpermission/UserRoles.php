<?php

namespace App\Http\Livewire\Rolesandpermission;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserRoles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $role;
    public $item_id;
    public $updateMode = false;
    public $search = '';
    public $permissiongive = [];
    protected $listeners = ['destroy'];
    protected $rules = [
        'role' => 'required|min:2',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function editRecord($item_id)
    {
        $record = Role::find($item_id);
        $this->role = $record->name;
        $this->item_id = $item_id;
    }

    public function updateRecord()
    {
        $validatedData = $this->validate();
        $store = Role::find($this->item_id);
        $store->name = $this->role;
        $store->update();
        if ($store) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'center-center',
                'icon' => 'success',
                'title' => 'Role Updated Successfully',
                'showConfirmButton' => false,
                'timer' => 2000,
            ]);
            $this->dispatchBrowserEvent('close-model');
            $this->reset('role');
        }
    }

    public function closemodel()
    {
        $this->reset('role');
    }

    public function saverole()
    {
        $validatedData = $this->validate();
        $store = new Role;
        $store->name = $this->role;
        $store->save();
        if ($store) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'center-center',
                'icon' => 'success',
                'title' => 'Role Added Successfully',
                'showConfirmButton' => false,
                'timer' => 2000,
            ]);
            $this->reset('role');
            $this->dispatchBrowserEvent('close-model');
        } else {

        }

    }

    public function Assignpermissions(){
        dd($this->permissiongive);
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
        $result = Role::find($this->item_id)->delete();

        if ($result) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'center-center',
                'icon' => 'success',
                'title' => 'Role Deleted Successfully',
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
        $show = Role::orderBy('id', 'DESC')->paginate(10);
        $permissions = Permission::orderBy('id', 'DESC')->get();

        return view('livewire.rolesandpermission.user-roles',compact('show','permissions'));
    }
}
