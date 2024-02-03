<div>
    <div class="table-responsive">
        <table id="inquiry" class="table  nowrap border-0 " style="width:100%">
            <thead>
                <tr class="dt-head">

                    <th>#</th>
                    <th>Today Date</th>
                    <th>Time</th>
                    <th>Std Name </th>
                    <th> Number</th>
                    <th> Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($new_students as $key => $student)
                <tr class="">
                    <td class="">{{$key+1}}</td>
                    <td>{{$student->Date}}</td>
                    <td>{{$student->time}}</td>
                    <td class="">{{$student->Student_name}}</td>
                    <td class="">{{$student->Student_contact}}</td>
                    <td class="">{{$student->Student_email}}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary btn-xs" wire:click="confirmDelete({{$student->id}})">Waste On</button>
                            <button class="btn btn-primary btn-xs ms-2" wire:click="updateRecord({{$student->id}})">Transfer to Data</button>
                       </div>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>

<div class="card  pb-4 px-lg-4 px-2 mt-3">
    <h5 class="card-header px-0 bg-white border-bottom-0  py-3 mb-2">All Appointments</h5>
    <div class="table-responsive">
   <input type="search" class="form-control ps-4 mb-4" wire:model="search" placeholder="Search...">
        <table class="table  nowrap border-0 " style="width:100%">
            <thead>
                <tr class="dt-head">

                    <th>#</th>
                    <th> Date</th>
                    <th>Time</th>
                    <th>Std Name </th>
                    <th> Number</th>
                    <th> Email</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($students as $key => $student)
                <tr class="">
                    <td class="">{{$key+1}}</td>
                    <td>{{$student->Date}}</td>
                    <td>{{$student->time}}</td>
                    <td class="">{{$student->Student_name}}</td>
                    <td class="">{{$student->Student_contact}}</td>
                    <td class="">{{$student->Student_email}}</td>
                </tr>
                    
                @endforeach
          
            </tbody>
        </table>
    </div>
</div>
</div>
