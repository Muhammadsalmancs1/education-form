<div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="tab mb-3">
            <div class="tab-scroll">
                <button class="tablinks" data-tab="sm" id="defaultOpen" wire:click="search('')">Student
                    Management</button>
                <button class="tablinks" data-tab="sm" wire:click="search('Inquiry')">Inquiry</button>
                <button class="tablinks" data-tab="sm" wire:click="search('In Progress')">In Progress</button>
                <button class="tablinks" data-tab="sm" wire:click="search('Paid')">Paid</button>
                <button class="tablinks" data-tab="sm" wire:click="search('Cas/T20')">Cas/T20</button>
                <button class="tablinks" data-tab="sm" wire:click="search('Visa')">Visa</button>
                <button class="tablinks" data-tab="sm" wire:click="search('Visa Accepted')">Visa Accepted</button>
                <button class="tablinks" data-tab="sm" wire:click="search('')">Close</button>
            </div>

        </div>

        <div id="sm" class="tabcontent">
            <div class="card  pb-4 px-lg-4 px-2">
                <h5 class="card-header px-0 bg-white border-bottom-0  py-3 mb-2">Student Management</h5>
                <form action="" wire.submit="search_form" wire.ignore.self>
                <div class="row ">
                    <div class="col-lg-3 mb-3">

                        <select class="form-select" wire:model="search_session"
                            >
                            <option>Select Session </option>
                            @foreach ($session as $item)
                            <option value="{{$item->session}}">
                                {{$item->session}} </option>
                            @endforeach  
                        </select>

                    </div>


                    <div class="col-lg-3 mb-3">

                        <select class="form-select" wire:model="search_currency">
                            <option>Select Counselor </option>
                            @foreach ($currancy as $item)
                            <option value="{{$item->currency}}">
                                {{$item->currency}} </option>
                            @endforeach
                          
                        </select>

                    </div>

                    <div class="col-lg-3 mb-3">
                        <select class="form-select" wire:model="search_ref">
                            <option>Select Ref </option>
                            @foreach ($referal as $item)
                            <option value="{{$item->reference}}">
                                {{$item->reference}} </option>
                            @endforeach
                          
                        </select>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <div class="d-flex">
                            <button  type="button" class="btn btn-secondary mt-md-0 mt-3" wire:click="search_reset">Clear</button>
                        </div>
                    </div>
                </form>
                </div>
                <div class="table-responsive">
                    <table id="sm-table" class="table  nowrap border-0 " style="width:100%">
                        <thead>
                            <tr class="dt-head">

                                <th>#</th>

                                <th> Name </th>

                                <th style="text-align:center; "> Contact# </th>

                                <th style="text-align:center; "> Session Month </th>


                                <th style="text-align:center; "> Interested Country </th>

                                <th style="text-align:center; "> Reference </th>
                                <th style="text-align:center; "> Status </th>
                                <th style="text-align:center; "> Counselor </th>
                                <th style="text-align:center; "> Uni List </th>
                                <th style="text-align:center; "> Actions </th>
                                <th style="text-align:center; "> FollowUp </th>
                                <th style="text-align:center; "> Del </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show as $key => $item)
                                
                           
                            <tr>

                                <td class="text-center">{{intval($key) + 1}}</td>


                                <td class="text-center"> {{$item->Student_name}}</td>

                                <td class="text-center">  {{$item->Student_contact}}</td>

                                <td class="text-center"> {{$item->Session_Looking}} </td>
                                <td class="text-center">  {{$item->Interested_Country}} </td>
                                <td class="text-center"> {{$item->Refferene}} </td>

                               


                                <td class="text-center">
                                    <form action="" wire:submit="status_update({{$item->id}})">
                                    <div class="d-flex align-items-center">
                                        <select class="form-select "  required="required"
                                            style="min-width: 180px !important;"   wire:model="statusChanges.{{ $item->id }}">
                                            <!--<option  disabled></option>-->
                                            <option value="{{$item->Status}}">{{$item->Status}}</option>
                                            <option value="In Progress">
                                                In Progress </option>
                                            <option value="Cas/T20" selected="">
                                                Cas/T20</option>
                                            <option value="Visa Accepted">
                                                Visa Acptd </option>
                                            <option value="Visa">
                                                Visa Rfsd</option>
                                            <option value="Paid">
                                                Paid Student
                                            </option>
                                            <option value="Wasted" selected="">
                                                Wasted</option>
                                          

                                        </select>

                                        <button class="btn btn-primary btn-xs ms-2 p-2" type="button" wire:click="status_update({{$item->id}})">
                                            Submit</button>
                                        </div>
                                    </form>
                                </td>

                                <td class="text-center">{{$item->Counselor}}</td>

                                <td class="text-center">
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#uni-view"
                                        class="btn btn-primary btn-xs me-2 view-btn" title="View"
                                        data-toggle="tooltip">
                                        View
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button type="button" wire:click="view({{$item->id}})" data-bs-toggle="modal" data-bs-target="#view"
                                        class="btn btn-primary btn-xs me-2 view-btn" title="View"
                                        data-toggle="tooltip">
                                        View
                                    </button>

                                    <button type="button" data-bs-toggle="modal" data-bs-target="#edit"
                                        class="btn btn-primary btn-xs edit-btn" title="Edit"
                                        data-toggle="tooltip">
                                        Edit
                                    </button>

                                </td>
                                <td class="text-center"> <button type="button"
                                        class="btn btn-primary btn-xs edit-btn" data-bs-toggle="modal"
                                        data-bs-target="#followUp" title="FollowUp"
                                        data-toggle="tooltip">
                                        FollowUp
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-xs edit-btn"
                                        data-bs-toggle="modal" data-bs-target="#delete" wire:click="deleteRecord({{$item->id}})">
                                        Delete
                                    </button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div
                class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    , Developed with by
                    <a href="https://techwizard.com" target="_blank"
                        class="footer-link fw-medium">Techwizard</a>
                </div>

            </div>
        </footer>

        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>

         <!--View Modal -->
         <div class="modal fade" id="view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self wire:dirty>
         <div class="modal-dialog  modal-fullscreen ">
             <div class="modal-content ">
                 <div class="modal-header modal-header-style">
                     <h5 class="modal-title mb-3 text-white " id="staticBackdropLabel">Student Registration</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <form action="">
                     <div class="modal-body">
                         <div class="container ">
                             <div class="row">
                                 <div class="col-lg-4 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-2 ">Name<span
                                             class="text-danger">*</span></label>
                                     <input type="text" class="form-control name" name="name" readonly value="{{optional($view)->Student_name}}"
                                         required="">
                                     
                                 </div>
                                 <div class="col-lg-4 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-3 col-md-7">Email Address </label>
                                     <input readonly type="email" class="form-control name" name="email"
                                         value="{{optional($view)->Student_email}}">
                                 </div>
                                 <div class="col-lg-4 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-3 col-md-6">Contact# <span
                                             class="text-danger">*</span> </label>
                                     <input readonly type="number" class="form-control name" name="contact"
                                         value="{{optional($view)->Student_contact}}" required="">
                                 </div>

                                 <div class="col-lg-12 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-2 ">Address <span
                                             class="text-danger">*</span></label>
                                     <input readonly type="text" class="form-control name" name="address"
                                         value="{{optional($view)->Student_address}}" required="">
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-md-10 ">Qualification 1<span
                                             class="text-danger">*</span></label>
                                     <select class="form-select" name="qualification" required="required">
                                         <!--<option  disabled></option>-->
                                         <option value="{{optional($view)->Qualification_1}}"> {{optional($view)->Qualification_1}}</option>
                                     </select>
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-md-6 ">Grade 1 </label>
                                     <input readonly type="text" class="form-control name" name="grade_1"
                                         value="{{optional($view)->Grade_1}}">
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-md-10 ">Qualification 2 <span
                                             class="text-danger">*</span></label>
                                     <select class="form-select" name="qualification_2">
                                         <option value="{{optional($view)->Qualification_2}}">{{optional($view)->Qualification_2}}</option>
                                     </select>
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-md-6 ">Grade 2 </label>
                                     <input readonly type="text" class="form-control name" name="grade_2"
                                         value="{{optional($view)->Grade_2}}">
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-md-10 ">Qualification 3 </label>
                                     <select class="form-select" name="qualification_3" required="required">
                                         <option value="{{optional($view)->Qualification_3}}">{{optional($view)->Qualification_3}}</option>
                                     </select>
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-6 ">Grade 3 </label>
                                     <input readonly type="text" class="form-control name" name="grade_3"
                                         value="{{optional($view)->Grade_3}}">
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-10 ">Education Country <span
                                             class="text-danger">*</span></label>
                                     <select class="form-select" name="country_id" required="">
                                         <option value="{{optional($view)->Education_country}}">
                                            {{optional($view)->Education_country}} </option>
                                     </select>
                                 </div>
                                 <div class="col-lg-6 mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-10 ">Interested Country <span
                                             class="text-danger">*</span></label>
                                     <select class="form-select">
                                         <option value="{{optional($view)->Interested_Country}}" selected>
                                            {{optional($view)->Interested_Country}}</option>
                                         
                                     </select>
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-10 "> Session Looking <span
                                             class="text-danger">*</span></label>
                                     <select class="form-select" name="session" required="">
                                         <option value="{{optional($view)->Session_Looking}}" selected="">{{optional($view)->Session_Looking}}
                                     </select>
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-6 ">Year <span
                                             class="text-danger">*</span>
                                     </label>
                                     <input readonly type="text" class="form-control name" name="year" value="{{optional($view)->Year}}"
                                         required="">
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-2 ">Courses<span
                                             class="text-danger">*</span></label>
                                     <input readonly type="text" class="form-control name" name="course"
                                         value="{{optional($view)->Courses}}" required="">
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-5 col-md-12">IELTS/TOEFL/SAT1/2
                                         GRE/ GMAT
                                         Score
                                     </label>
                                     <input readonly type="text" class="form-control name" name="score" value="{{optional($view)->Courses_name}}">
                                 </div>
                                 <div class="col-lg-12 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-3 col-md-8">How you know about AS
                                         EDUCATION
                                         <span class="text-danger">*</span>
                                     </label>
                                     <input readonly type="text" class="form-control name" name="ref" value="{{optional($view)->Refferene}}"
                                         required="">
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <!-- <button type="button" class="btn btn-primary">Save</button> -->
                     </div>
                 </form>
             </div>
         </div>
     </div>
</div>


