<div>
    <div class="tab mb-3">
        <div class="tab-scroll">
            <button class="tablinks" data-tab="AC"  wire:click="assigntable">Assign Counselor </button>
            <button class="tablinks" data-tab="AC" wire:click="assignedtable">Assigned Counselor</button>

        </div>

    </div>
    @if ($assigncounselors)
    <div id="AC" class="tabcontent">

        <!-- Striped Rows -->
        <div class="card  pb-4 px-lg-4 px-2">
            <h5 class="card-header px-0 bg-white border-bottom-0  py-3  ">Assign Counselor</h5>
            <div class="row filter-div">
                <div class="col-md-5 ms-auto">
                    <form action="" wire:submit.prevent="counselorasign">
                    <div class="d-flex align-items-center flex-md-row flex-column ">
                        <select class="form-select " wire:model="counselor">
                            <option value=""> -- Select Coun --</option>
                            @foreach ($counse as $key => $item)
                            <option value="{{$item->name}}">
                                {{$item->name}} </option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary mx-2 mt-md-0 mt-3">Submit</button>
                    </div>
                </form> 
                </div>
            </div>
            <div class="table-responsive mt-3">
                <input type="search" class="form-control ps-4 mb-4" wire:model="search" placeholder="Search...">
                <table id="assign-C" class="table  nowrap border-0 " style="width:100%">
                    <thead>
                        <tr class="dt-head">
                            <th style="width: 50px;">Check</th>
                            <th style="width: 40px;">#</th>

                            <th style="text-align:center; "> Name </th>
                            <th style="text-align:center; "> Assign Std </th>
                            <th style="text-align:center; "> Email </th>
                            <th style="text-align:center; "> Contact# </th>

                            <th style="text-align:center; "> Session Month </th>


                            <th style="text-align:center; "> Education Country </th>
                            <th style="text-align:center; "> Interested Country </th>
                            <th style="text-align:center; "> Reference </th>
                            <th style="text-align:center; "> Status </th>


                            <th style="text-align:center; "> Actions </th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($show as $key => $item)
                            
                       
                        <tr>
                            <td style="width: 40px !important;"><input type="checkbox"
                                    name="check[]" value="{{$item->id}}" wire:model="students.{{$item->id}}"></td>
                            <td class="text-center" style="width: 40px;">{{$key+1}}</td>


                            <td class="text-center">
                            {{$item->Student_name}}</td>
                            <td>


                                <input type="hidden" class="form-control name">




                            </td>
                            <td class="text-center">{{$item->Student_email}}</td>
                            <td class="text-center"> {{$item->Student_contact}}</td>


                            <td class="text-center">{{$item->Session_Looking}}</td>




                            <td class="text-center">{{$item->Education_country}} </td>

                            <td class="text-center"> {{$item->Interested_Country}}<br> </td>

                            <td class="text-center">{{$item->Refferene}}</td>
                            <!--#progres =1-->
                            <!--#potential = 2-->
                            <!--#deferred = 3-->
                            <!--#wasted = 4-->

                            <td>{{$item->Status}}</td>


                            <td class="text-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#view"
                                    class="btn btn-primary btn-xs me-2 view-btn" title="View"
                                    data-toggle="tooltip">
                                    View
                                </button>

                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Striped Rows -->

    </div>
    @endif
    @if ($showAssignedCounselor)
    <div id="ANC" class="tabcontent">

        <!-- Striped Rows -->
        <div class="card  pb-4 px-lg-4 px-2">
            <h5 class="card-header px-0 bg-white border-bottom-0  py-3 mb-2">Assigned Counselor</h5>
            <div class="table-responsive">
                <table id="ADC" class="table  nowrap border-0 " style="width:100%">
                    <thead>

                        <tr class="dt-head">
                            <th>#</th>

                            <th style=" text-align:center; "> Name </th>
                            <th style=" text-align:center; "> Status </th>
                            <th style=" text-align:center; "> Email </th>
                            <th style=" text-align:center; "> Contact# </th>

                            <th style=" text-align:center; "> Session Month </th>



                            <th style=" text-align:center; "> Interested Country </th>
                            <th style=" text-align:center; "> Reference </th>

                            <th style=" text-align:center; "> Assign Std </th>

                            <th style=" text-align:center; "> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assigned as $key => $item)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td class="text-center">
                                {{$item->Student_name}}</td>
                            <td>
                                <form method="" wire:submit.prevent="updateassigncounselor({{$item->id}})">

                                    <div class="d-flex">
                                        <input type="hidden" class="form-control name" name="std_id"
                                            value="1541" placeholder="Enter address" required="">
                                        <select class="form-select " required="required"
                                            style="min-width: 180px !important;" wire:model="assignupdate.{{$item->id}}">
                                            <!--<option  disabled></option>-->
                                            <option value="{{$item->Counselor}}" selected >{{$item->Counselor}}</option>
                                            @foreach ($counse as $key => $coun)
                                            <option value="{{$coun->name}}">
                                                {{$coun->name}} </option>
                                            @endforeach
                                        </select>

                                        <button class="btn btn-primary btn-sm ms-2" type="submit"
                                            name="wasted" value="1541  "> Submit</button>
                                    </div>
                                </form>
                            </td>

                            <td class="text-center"> {{$item->Student_email}}</td>
                            <td class="text-center"> {{$item->Student_contact}}</td>


                            <td class="text-center">{{$item->Session_Looking}}</td>






                            <td class="text-center">{{$item->Interested_Country}}<br> </td>

                            <td class="text-center">{{$item->Refferene}} </td>
                            <!--#progres =1-->
                            <!--#potential = 2-->
                            <!--#deferred = 3-->
                            <!--#wasted = 4-->

                            <td>Closed</td>


                            <td class="text-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#view"
                                    class="btn btn-primary btn-xs me-2 view-btn" title="View"
                                    data-toggle="tooltip">
                                    View
                                </button>

                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Striped Rows -->

    </div>
    @endif
</div>
