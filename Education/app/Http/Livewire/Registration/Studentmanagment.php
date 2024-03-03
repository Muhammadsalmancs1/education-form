<?php

namespace App\Http\Livewire\Registration;

use App\Models\registerformmodel;
use App\Models\registration\followcomments;
use App\Models\registration\countrymodel;
use App\Models\registration\referencemodel;
use App\Models\registration\sessionmodel;
use App\Models\usermanage\manageusermodel;
use Livewire\Component;
use Livewire\WithPagination;

class Studentmanagment extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];
    public $view;
    public $search = "";
// search variables
    public $search_ref;
    public $search_counselor;
    public $search_session;
// update status
    public $statusChanges = [];
// main search record
    public $mainsearch;

//  follow up
    public $followrecord;

// edit registration form
    public $itemid;
    public $name;
    public $email;
    public $contact;
    public $address;
    public $qualification1;
    public $grade1;
    public $qualification2;
    public $grade2;
    public $qualification3;
    public $grade3;
    public $education_country;
    public $interested_country;
    public $session_looking;
    public $year;
    public $courses;
    public $course_name;
    public $reference;

    public $follows = [
        ['followup' => '', 'comment' => ''],
    ];
    protected $followRules = [
        'follows.*.followup' => 'required',
        'follows.*.comment' => 'required',
    ];

    public function view($id)
    {
        $result = registerformmodel::find($id);
        $this->itemid = $id;
        $this->name = $result->Student_name;
        $this->email = $result->Student_email;
        $this->contact = $result->Student_contact;
        $this->address = $result->Student_address;
        $this->qualification1 = $result->Qualification_1;
        $this->grade1 = $result->Grade_1;
        $this->qualification2 = $result->Qualification_2;
        $this->grade2 = $result->Grade_2;
        $this->qualification3 = $result->Qualification_3;
        $this->grade3 = $result->Grade_3;
        $this->education_country = $result->Education_country;
        $this->interested_country = $result->Interested_Country;
        $this->session_looking = $result->Session_Looking;
        $this->year = $result->Year;
        $this->courses = $result->Courses;
        $this->course_name = $result->Courses_name;
        $this->reference = $result->Refferene;

    }

    public function updateregistrationform()
    {
        $store = registerformmodel::find($this->itemid);
        $store->Student_name = $this->name;
        $store->Student_email = $this->email;
        $store->Student_contact = $this->contact;
        $store->Student_address = $this->address;
        $store->Qualification_1 = $this->qualification1;
        $store->Grade_1 = $this->grade1;
        $store->Qualification_2 = $this->qualification2;
        $store->Grade_2 = $this->grade2;
        $store->Qualification_3 = $this->qualification3;
        $store->Grade_3 = $this->grade3;
        $store->Education_country = $this->education_country;
        $store->Interested_Country = $this->interested_country;
        $store->Session_Looking = $this->session_looking;
        $store->Year = $this->year;
        $store->Courses = $this->courses;
        $store->Courses_name = $this->course_name;
        $store->Refferene = $this->reference;
        $store->update();
        $this->dispatchBrowserEvent('close-editmodel');
        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Record Updated Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);

    }

    // delete record
    public function deleteRecord($item_id)
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
        $result = registerformmodel::find($this->item_id)->delete();

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

// reset filter
    public function search_reset()
    {
        $this->search_ref = '';
        $this->search_counselor = '';
        $this->search_session = '';
    }

    public function search($search)
    {
        $this->search = $search;
    }

    // status update
    public function status_update($id)
    {
        $student = registerformmodel::find($id);
        if ($student) {
            $status = $this->statusChanges[$id]; // Get the selected status string
            $student->status = $status;
            $student->update();
            $this->dispatchBrowserEvent('swal', [
                'position' => 'center-center',
                'icon' => 'success',
                'title' => 'Record Updated Successfully',
                'showConfirmButton' => false,
                'timer' => 2000,
            ]);
            $this->render();
        }
    }

// follow up

    public function followup($item_id)
    {
        $find = registerformmodel::find($item_id);
        $this->followrecord = $find;
        $latestComment = followcomments::where('student_id', $item_id)->orderBy('id', 'DESC')->latest()->first();
        $this->follows = [
            ['followup' => @$latestComment->followup, 'comment' => @$latestComment->comment],
        ];
    }

    public function addfollows()
    {
        array_push($this->follows, ['followup' => '', 'comment' => '']);
    }

    public function followupform($studentid)
    {

        $validatedData = $this->validate($this->followRules);
        $followsup = [];
        foreach ($this->follows as $item) {
            $followsup[] = ['followup' => $item['followup'], 'comment' => $item['comment']];
        }
        $followcommentsData = [];
        foreach ($followsup as $follow) {
            $followcommentsData[] = array_merge(['student_id' => $studentid], $follow);
        }
        followcomments::insert($followcommentsData);

        $this->dispatchBrowserEvent('swal', [
            'position' => 'center-center',
            'icon' => 'success',
            'title' => 'Comment Add Successfully',
            'showConfirmButton' => false,
            'timer' => 2000,
        ]);
        $this->reset('follows');
        $this->dispatchBrowserEvent('close-model');
    }

    public function render()
    {
        $query = registerformmodel::query();

        if ($this->mainsearch) {
            $query->where('Status', $this->mainsearch);
        }
        if ($this->search_session) {
            $query->where('Session_Looking', $this->search_session);
        }

        if ($this->search_counselor) {
            $query->where('Counselor', $this->search_counselor);
        }
        if ($this->search_ref) {
            $query->where('Refferene', $this->search_ref);
        }
        if ($this->search == "Inquiry") {
            $query->where('status', 'Inquiry');
        }
        if ($this->search == "In Progress") {
            $query->where('status', 'In Progress');
        }
        if ($this->search == "Paid") {
            $query->where('status', 'Paid');
        }
        if ($this->search == "Cas/T20") {
            $query->where('status', 'Cas/T20');
        }
        if ($this->search == "Visa") {
            $query->where('status', 'Visa');
        }

        if ($this->search == "Visa Accepted") {
            $query->where('status', 'Visa Accepted');
        }

        if ($this->search == "Visa Accepted") {
            $query->where('status', 'Visa Accepted');
        }
        $show = $query->orderBy('id', 'DESC')->paginate(10);
        $referal = referencemodel::get();
        $session = sessionmodel::get();
        $counselor = manageusermodel::where('role', 'Counselor')->get();
        $followuprecord = $this->followrecord;

        $coun = countrymodel::orderBy('id','Desc')->get();
        $refer = referencemodel::orderBy('id','Desc')->get();
        $sessions = sessionmodel::orderBy('id','Desc')->get();
        return view('livewire.registration.studentmanagment', compact('show', 'referal', 'session', 'counselor', 'followuprecord','coun','refer','sessions'));
    }

}
