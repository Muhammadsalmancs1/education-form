@extends('../admin/layout/main')

@section('content')
    

                <!-- Content wrapper -->
                <div class="content-wrapper px-lg-3 px-0">
                    <!-- Content -->


                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- <h4 class="pt-3 pb-2">Student Management</h4> -->


                        <div class="tab mb-3">
                            <div class="tab-scroll">
                                <button class="tablinks" data-tab="SD" id="defaultOpen">Student
                                    Data</button>
                                <button class="tablinks" data-tab="Appointments">Appointments</button>
                            </div>

                        </div>

                        <div id="SD" class="tabcontent">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class=" dashboard-btn  mb-3 d-flex justify-content-between align-items-center "
                                        style=" color:white !important; background-color: #8d8d8d !important">
                                        <div>
                                            <a href="{{route('studentlists','')}}" class="text-white">
                                                All Student
                                            </a>
                                        </div>
                                        <div><i class="bi bi-arrow-right-circle-fill ms-3"></i></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" dashboard-btn  mb-3 d-flex justify-content-between align-items-center "
                                        style=" color:white !important; background-color: #17a2b8 !important;">
                                        <div>
                                            <a href="{{route('studentlists','Inquiry')}}" class="text-white">
                                                In Query Student
                                            </a>
                                        </div>
                                        <div><i class="bi bi-arrow-right-circle-fill ms-3"></i></div>
                                    </div>
                                </div>
                              
                                <div class="col-lg-4">
                                    <div class=" dashboard-btn  mb-3 d-flex justify-content-between align-items-center "
                                        style=" color:white !important; background-color: #28a745!important;">
                                        <div>
                                            <a href="{{route('studentlists','In Progress')}}" class="text-white">
                                                In Progress Student
                                            </a>
                                        </div>
                                        <div><i class="bi bi-arrow-right-circle-fill ms-3"></i></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" dashboard-btn  mb-3 d-flex justify-content-between align-items-center "
                                        style=" color:white !important; background-color: #193765 !important">
                                        <div>
                                            <a href="{{route('studentlists','Visa Accepted')}}" class="text-white">
                                                Visa Accepted Student
                                            </a>
                                        </div>
                                        <div><i class="bi bi-arrow-right-circle-fill ms-3"></i></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" dashboard-btn  mb-3 d-flex justify-content-between align-items-center "
                                        style=" color:white !important; background-color: #196545 !important">
                                        <div>
                                            <a href="{{route('studentlists','Cas_T20')}}" class="text-white">
                                                Cas/T20
                                            </a>
                                        </div>
                                        <div><i class="bi bi-arrow-right-circle-fill ms-3"></i></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" dashboard-btn  mb-3 d-flex justify-content-between align-items-center "
                                        style=" color:white !important; background-color: #a5742b !important">
                                        <div>
                                            <a href="{{route('studentlists','Paid')}}" class="text-white">
                                                Paid Student
                                            </a>
                                        </div>
                                        <div><i class="bi bi-arrow-right-circle-fill ms-3"></i></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" dashboard-btn  mb-3 d-flex justify-content-between align-items-center "
                                        style=" color:white !important; background-color: #ffc107 !important">
                                        <div>
                                            <a href="" class="text-white">
                                                Deferred Student
                                            </a>
                                        </div>
                                        <div><i class="bi bi-arrow-right-circle-fill ms-3"></i></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" dashboard-btn  mb-3 d-flex justify-content-between align-items-center "
                                        style=" color:white !important; background-color: #dc3545 !important">
                                        <div>
                                            <a href="" class="text-white">
                                                Wasted Student
                                            </a>
                                        </div>
                                        <div><i class="bi bi-arrow-right-circle-fill ms-3"></i></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class=" dashboard-btn  mb-3 d-flex justify-content-between align-items-center "
                                        style=" color:white !important; background-color: #000000 !important">
                                        <div>
                                            <a href="" class="text-white">
                                                Closed Student
                                            </a>
                                        </div>
                                        <div><i class="bi bi-arrow-right-circle-fill ms-3"></i></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Striped Rows -->
                            <div class="card  pb-4 px-lg-4 px-2">
                                <h5 class="card-header px-0 bg-white border-bottom-0  py-3 mb-2">New Leads</h5>

                                <div class="table-responsive">
                                    <table id="new-lead" class="table  nowrap border-0 " style="width:100%">
                                        <thead>
                                            <tr class="dt-head">

                                                <th>#</th>

                                                <th> Name </th>

                                                <th> Number</th>

                                                <th> Session </th>

                                                <th> Email</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="">

                                                <td class="">1</td>


                                                <td class=""> Daniyal Adnan</td>


                                                <td class=""> 03208242965</td>


                                                <td class=""> JANUARY- MARCH 2022</td>

                                                <td class=""> abc@gmail.com</td>



                                            </tr>
                                            <tr class="">

                                                <td class="">1</td>


                                                <td class=""> Daniyal Adnan</td>


                                                <td class=""> 03208242965</td>


                                                <td class=""> JANUARY- MARCH 2022</td>

                                                <td class=""> abc@gmail.com</td>



                                            </tr>
                                            <tr class="">

                                                <td class="">1</td>


                                                <td class=""> Daniyal Adnan</td>


                                                <td class=""> 03208242965</td>


                                                <td class=""> JANUARY- MARCH 2022</td>

                                                <td class=""> abc@gmail.com</td>



                                            </tr>
                                            <tr class="">

                                                <td class="">1</td>


                                                <td class=""> Daniyal Adnan</td>


                                                <td class=""> 03208242965</td>


                                                <td class=""> JANUARY- MARCH 2022</td>

                                                <td class=""> abc@gmail.com</td>



                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/ Striped Rows -->

                        </div>

                        <div id="Appointments" class="tabcontent">
                            <div class="card  pb-4 px-lg-4 px-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-header px-0 bg-white border-bottom-0  py-3 mb-2">Today Appointments</h5>
                                
                                </div>
                               
                                <livewire:index />
                        </div>
    @endsection