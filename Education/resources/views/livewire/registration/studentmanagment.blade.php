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
                <h5 class="card-header px-0 bg-white border-bottom-0  py-3 mb-2">@if($search){{$search}} @else Student Management @endif</h5>
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

                        <select class="form-select" wire:model="search_counselor">
                            <option>Select Counselor </option>
                            @foreach ($counselor as $item)
                            <option value="{{$item->name}}">
                                {{$item->name}} </option>
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
                              

                                    <button type="button" data-bs-toggle="modal" data-bs-target="#view"
                                    class="btn btn-primary btn-xs me-2 view-btn" wire:click="view({{$item->id}})" title="Edit"
                                        data-toggle="tooltip">
                                        Edit
                                    </button>

                                </td>
                                <td class="text-center"> <button type="button"
                                        class="btn btn-primary btn-xs edit-btn" data-bs-toggle="modal"
                                        data-bs-target="#followUp" title="FollowUp"
                                        data-toggle="tooltip" wire:click="followup({{$item->id}})">
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
         aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
         <div class="modal-dialog  modal-fullscreen ">
             <div class="modal-content ">
                 <div class="modal-header modal-header-style">
                     <h5 class="modal-title mb-3 text-white " id="staticBackdropLabel">Student Registration</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <form action="" wire:submit.prevent="updateregistrationform()">
                     <div class="modal-body">
                         <div class="container ">
                             <div class="row">
                                 <div class="col-lg-4 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-2 ">Name<span
                                             class="text-danger">*</span></label>
                                     <input type="text" class="form-control name" name="name" wire:model="name"  value="{{optional($view)->Student_name}}"
                                         required="">
                                     
                                 </div>
                                 <div class="col-lg-4 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-3 col-md-7">Email Address </label>
                                     <input  type="email" class="form-control name" wire:model="email" name="email"
                                         value="{{optional($view)->Student_email}}">
                                 </div>
                                 <div class="col-lg-4 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-3 col-md-6">Contact# <span
                                             class="text-danger">*</span> </label>
                                     <input  type="number" class="form-control name" wire:model="contact" name="contact"
                                         value="{{optional($view)->Student_contact}}">
                                 </div>

                                 <div class="col-lg-12 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-2 ">Address <span
                                             class="text-danger">*</span></label>
                                     <input  type="text" class="form-control name" wire:model="address" name="address"
                                         value="{{optional($view)->Student_address}}" >
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-md-10 ">Qualification 1<span
                                             class="text-danger">*</span></label>
                                     <select class="form-select" wire:model="qualification1" >
                                         <!--<option  disabled></option>-->
                                         <option value=""> -- School Level --</option>

                                         <option value="Matric">
                                             Matric </option>
         
                                         <option value="O-Level">
                                             O-Level </option>
         
                                         <option value="Other">
                                             Other </option>
                                     </select>
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-md-6 ">Grade 1 </label>
                                     <input type="text" class="form-control name" wire:model="grade1" name="grade_1">
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-md-10 ">Qualification 2 <span
                                             class="text-danger">*</span></label>
                                     <select class="form-select" wire:model="qualification2">
                                        <option value=""> -- College Level --</option>
                                        <option value="Inter">
                                            Inter </option>
                                        <option value="A-Level">
                                            A-Level </option>
                                        <option value="IB">
                                            IB </option>
                                        <option value="AP">
                                            AP </option>
                                        <option value="Other">
                                            Other </option>
                                        <option value="none">
                                            none </option>
                                     </select>
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-md-6 ">Grade 2 </label>
                                     <input type="text" class="form-control name" wire:model="grade2">
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-md-10 ">Qualification 3 </label>
                                     <select class="form-select" wire:model="qualification3" >
                                        <option value=""> -- University Level --</option>
                                <option value="B.Com">
                                    B.Com </option>
                                <option value="BA">
                                    BA </option>
                                <option value="3 Year Bachelors">
                                    3 Year Bachelors </option>
                                <option value="4 Year Bachelors">
                                    4 Year Bachelors </option>
                                <option value="Master">
                                    Master </option>
                                <option value="Other">
                                    Other </option>
                                <option value="none">
                                    none </option>
                                     </select>
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-6 ">Grade 3 </label>
                                     <input  type="text" class="form-control name" wire:model="grade3">
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-10 ">Education Country <span
                                             class="text-danger">*</span></label>
                                     <select class="form-select" wire:model="education_country" >
                                        @foreach ($coun as $item)
                                        <option value="{{$item->country}}">
                                            {{$item->country}} </option>
                                            @endforeach
                                     </select>
                                 </div>
                                 <div class="col-lg-6 mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-10 ">Interested Country <span
                                             class="text-danger">*</span></label>
                                     <input type="text" class="form-select" wire:model="interested_country">
                                       
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-10 "> Session Looking <span
                                             class="text-danger">*</span></label>
                                     <select class="form-select" wire:model="session_looking" >
                                        @foreach ($sessions as $item)
                                        <option value="{{$item->session}}" selected="">
                                            {{$item->session}}</option>
                                            @endforeach
                                        </select>
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-6 ">Year <span
                                             class="text-danger">*</span>
                                     </label>
                                     <input type="text" class="form-control name" wire:model="year">
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-2 ">Courses<span
                                             class="text-danger">*</span></label>
                                     <input type="text" class="form-control name" wire:model="courses">
                                 </div>
                                 <div class="col-lg-6 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-5 col-md-12">IELTS/TOEFL/SAT1/2
                                         GRE/ GMAT
                                         Score
                                     </label>
                                     <input  type="text" class="form-control name" wire:model="course_name">
                                 </div>
                                 <div class="col-lg-12 lube-input mb-3">
                                     <label class="control-label mb-2 mt-2 col-sm-3 col-md-8">How you know about AS
                                         EDUCATION
                                         <span class="text-danger">*</span>
                                     </label>
                                     <select type="text" class="form-control name" wire:model="reference">
                                         @foreach ($refer as $item)
                                         <option value="{{$item->reference}}">
                                             {{$item->reference}}</option>
                                             @endforeach
                                            </select>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="button" class="btn btn-primary" wire:click="updateregistrationform()">Save</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>


    <!--follow Modal -->
    <div class="modal fade" id="followUp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self wire:dirty>
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header modal-header-style">
                <h5 class="modal-title mb-3 text-white" id="staticBackdropLabel">Student Follow Up </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" wire.ignore.self wire:submit.prevent="followupform({{@$followuprecord->id}})">
                <div class="modal-body h-auto">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 mb-3">
                                <label class="control-label col-sm-2 ">Session</label>
                                <input type="text" class="form-control name" name="name" value="{{@$followuprecord->Session_Looking}}" readonly="">
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label class="control-label col-sm-2 ">Name</label>
                                <input type="text" class="form-control name" name="name"
                                    value="{{@$followuprecord->Student_name}}" placeholder="Enter name" readonly="">
                            </div>

                            <div class="col-lg-3 mb-3">
                                <label class="control-label col-sm-10 ">Interested Country *</label>
                                <input type="text" class="form-control name" name="email" value="{{@$followuprecord->Interested_Country}}"
                                    placeholder="  " readonly="">

                            </div>
                            <div class="col-lg-3 mb-3">
                                <label class="control-label col-sm-3 col-md-7">Interested Courses </label>
                                <input type="text" class="form-control name" name="email" value="{{@$followuprecord->Courses}}"
                                    placeholder="  " readonly="">
                            </div>

                            <div class="col-lg-3 mb-3">
                                <label class="control-label col-sm-3 col-md-6">Contact# </label>
                                <input type="text" class="form-control name" name="contact"
                                    placeholder="Enter contact #" value="{{@$followuprecord->Student_contact}}" readonly="">
                            </div>
                            <div class="col-lg-9 mb-3">
                                <label class="control-label col-sm-5 ">Address</label>
                                <input type="text" class="form-control name" name="address"
                                value="{{@$followuprecord->Student_address}}"
                                    placeholder="Enter address" readonly="">
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-3 mt-4">
                                <div class="comment-div">
                                    Comments
                                </div>
                            </div>
                        </div>
                        <div class="add-more-comment-div">
                            @foreach($follows as $index => $developer)  
                            <div class="row ">
                                <div class="col-lg-3 mb-3">
                                    <label class="control-label col-sm-5 "> Follow Up {{$index}} </label>
                                    <input type="date" class="form-control name" name="address" wire:model="follows.{{ $index }}.followup" value=""
                                        placeholder="Enter address">
                                </div>
                                <!-- <div class="col-lg-3 mb-3">
                                    <label class="control-label col-sm-5 "
                                        style="width: fit-content; white-space: nowrap;"> Next Follow Up</label>
                                    <input type="date" class="form-control name" name="address" value=""
                                        placeholder="Enter address" readonly="">
                                </div> -->

                                <div class="col-lg-9 mb-3">
                                    <label class="control-label col-sm-5 "> Comments {{$index}}</label>
                                    <input type="text" class="form-control name" name="address" wire:model="follows.{{ $index }}.comment" value=""
                                        placeholder="Enter address">
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="row">
                            <div class="col-lg-12 mb-3 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" wire:click="addfollows">Add More
                                    Comments</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success w-50 mx-auto" wire:click="followupform({{@$followuprecord->id}})">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


</div>


