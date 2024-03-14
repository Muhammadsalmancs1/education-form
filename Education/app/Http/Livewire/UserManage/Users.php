<?php

namespace App\Http\Livewire\UserManage;
use App\Models\usermanage\manageusermodel;
use App\Models\User;

use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Livewire\Component;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name;
    public $email;
    public $password;
    public $role;
    public $item_id;
    public $updateMode = false;
    protected $listeners = ['destroy'];
    protected $rules = [
        'name' => 'required|min:4',
        'email' => 'required|email',
        'password' => 'required',
        'role' => 'required|',

    ];

    protected $updateroles = [
        'name' => 'required|min:4',
        'email' => 'required|email',
        'role' => 'required|',

    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function saveusers(){
        $validatedData =  $this->validate(); 
        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->role = $this->role;
        $user->save();
        $user->assignRole($this->role);

        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'User Add Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
         $this->reset('name','email','password','role');
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
        $result = manageusermodel::find($this->item_id)->delete();
    
        if ($result) {
            $this->dispatchBrowserEvent('swal', [
                'position' => 'center-center',
                'icon' => 'success',
                'title' => 'User Deleted Successfully',
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

    public function editrecord($item_id)
    {
        $record = manageusermodel::find($item_id);
        $this->name = $record->name; 
        $this->email = $record->email; 
        $this->role = $record->role;
        $this->item_id = $item_id; 


    }
    public function updaterecord(){
        $validatedData =  $this->validate($this->updateroles); 
        $user = User::find($this->item_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->role = $this->role;
        $user->update();
        
    if ($user->hasRole($this->role)) {
        $user->removeRole($this->role);
    }

    $user->assignRole($this->role);
        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'User Updated Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
        $this->dispatchBrowserEvent('close-model');
        $this->reset('name','email','password','role');
    }
    public function closemodel(){
        $this->reset('name','email','password','role');
    }

    public function render()
    {
        $show = manageusermodel::orderBy('id', 'DESC')->paginate(10);
        $roles = Role::orderBy('id', 'DESC')->get();
        return view('livewire.user-manage.users',compact('show','roles'));
    }
}
