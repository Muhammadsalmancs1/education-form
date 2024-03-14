<?php

namespace App\Http\Livewire;
use App\Models\registerformmodel;
use Carbon\Carbon;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\Component;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $item_id;
    public $updateMode = false;
    public $search = '';

    protected $listeners = ['destroy'];

    public function confirmDelete($item_id)
    {
        $this->item_id = $item_id;

        $this->dispatchBrowserEvent('swal:confirm', [
            'position' => 'center',
            'icon' => 'warning',
            'title' => 'Are You Sure You Want to Waste This?',
            'showConfirmButton' => true,
            'timer' => 0,
            'item_id' => $item_id,
        ]);
    }

    public function destroy()
{
    $result = registerformmodel::find($this->item_id)->delete();

    if ($result) {
        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Record Wasted Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
        $this->render();
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

public function updateRecord($item_id)
{
    $result = registerformmodel::find($item_id);
    $result->status = 'Inquiry';
    $result->update();
    $this->dispatchBrowserEvent('swal', [
        'position' => 'center-center',
        'icon' => 'success',
        'title' => 'Record Updated Successfully',
        'showConfirmButton' => false,
        'timer' => 2000,
    ]);

}
    public function render()
    {
        $query = registerformmodel::query();
        if ($this->search) {
            $query->where(function($q) {
                $q->where('Student_name', 'like', '%'.$this->search.'%')
                  ->orWhere('Student_contact', 'like', '%'.$this->search.'%')
                  ->orWhere('Student_email', 'like', '%'.$this->search.'%')
                  ->orWhere('Refferene', 'like', '%'.$this->search.'%')
                  ->orWhere('Year', 'like', '%'.$this->search.'%')
                  ->orWhere('Session_Looking', 'like', '%'.$this->search.'%')
                  ->orWhere('Interested_Country', 'like', '%'.$this->search.'%')
                  ->orWhere('Date', 'like', '%'.$this->search.'%');
            });
        }
    $students =$query->where('status','Pending')->orderBy('id', 'DESC')->get();
        $today = Carbon::now()->toDateString();
        $new_students = registerformmodel::where('status','Pending')->whereDate('created_at', $today)->get();
        return view('livewire.index',compact('new_students','students'));
    }
}
