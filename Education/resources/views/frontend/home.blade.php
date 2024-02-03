@extends('../frontend/layout/main')

@section('content')

<nav class="navbar" style="background-color: #cd2122;">
    <div class="container-fluid w-100">
        <a class="navbar-brand d-flex justify-content-center align-items-center w-100 flex-md-row flex-column"
            href="home.html">
            <img src="{{asset('website/assets/images/logo.png')}}" alt="" class="logo-img me-3">
            <h1 class="text-white mt-lg-0 mt-3">Student Registration Form</h1>
        </a>
    </div>
</nav>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <form id="regForm" action="{{route('registration_form')}}" method="post">
                @csrf
                <!-- One "tab" for each step in the form: -->
                <div class="tab">
                    <div class="Scriptcontent">
                        <h1 class="top-heading">Select Date</h1>
                        <!-- DEMO HTML -->
                        
                        <div class="calendar-wrapper mt-4">
                          <input type="date" class="form-control name" name="date" id="date" placeholder="Select Date"
                          required="">
                        </div>
                        <!-- END DEMO HTML -->
                    </div>
                </div>

                <div class="tab">

                    <h1 class="top-heading">Select Time</h1>
                    <br>
                    <div class="d-flex justify-content-center flex-wrap my-lg-5 my-4">
                        @foreach ($time as $item)
                            
                        
                        <button type="button" class="me-2 main-btn2" value="{{ date('H:i', strtotime($item->start_time)) }} - {{ date('H:i', strtotime($item->end_time)) }}" onclick="addValueToForm('{{ date('H:i', strtotime($item->start_time)) }} - {{ date('H:i', strtotime($item->end_time)) }}')">{{ date('H:i', strtotime($item->start_time)) }} - {{ date('H:i', strtotime($item->end_time)) }}</button>
                        @endforeach
                        <input type="hidden" id="timeInput" name="time" />
                    </div>
                </div>
                <div class="tab">
                    <div class="row">
                        <h1 class="top-heading mb-lg-5 mb-4"> Registration Form</h1>

                        <div class="col-lg-4 lube-input mb-3">
                            <label class="control-label mb-2 mt-2 col-sm-2 ">Name<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control name" name="name" placeholder="Enter name"
                                required="">
                         
                        </div>
                        <div class="col-lg-4 lube-input mb-3">
                            <label class="control-label mb-2 mt-2 col-sm-3 col-md-7">Email Address </label>
                            <input type="email" class="form-control name" name="email" placeholder="Enter Email ">
                        </div>
                        <div class="col-lg-4 lube-input mb-3">
                            <label class="control-label mb-2 mt-2 col-sm-3 col-md-6">Contact# <span
                                    class="text-danger">*</span> </label>
                            <input type="number" class="form-control name" name="contact"
                                placeholder="Enter contact #" required="">
                        </div>

                        <div class="col-lg-12 lube-input mb-3">
                            <label class="control-label mb-2 mt-2 col-sm-2 ">Address <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control name" name="address" placeholder="Enter address"
                                required="">
                        </div>
                        <div class="col-lg-6 lube-input mb-3">
                            <label class="control-label mb-2 mt-2 col-md-10 ">Qualification 1<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" name="qualification_1" required="required">
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
                        <div class="col-lg-6 lube-input mb-3" id="text_area" style="display:none;">

                            <label class="control-label mb-2 mt-2 col-md-6 ">Other</label>
                            <input type="text" class="form-control name" name="other" placeholder="Enter  Other">


                        </div>
                        <div class="col-lg-6 lube-input mb-3">
                            <label class="control-label mb-2 mt-2 col-md-6 ">Grade 1 </label>
                            <input type="text" class="form-control name" name="grade_1" placeholder="Enter Grade">
                        </div>
                        <div class="col-lg-6 lube-input mb-3">
                            <label class="control-label mb-2 mt-2 col-md-10 ">Qualification 2 <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" name="qualification_2">
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
                            <input type="text" class="form-control name" name="grade_2" placeholder="Enter Grade">
                        </div>
                        <div class="col-lg-6 lube-input mb-3">
                            <label class="control-label mb-2 mt-2 col-md-10 ">Qualification 3 </label>
                            <select class="form-select" name="qualification_3" required="required">
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
                            <input type="text" class="form-control name" name="grade_3" placeholder="Enter Grade">
                        </div>
                        <div class="col-lg-6 lube-input mb-3">
                            <label class="control-label mb-2 mt-2 col-sm-10 ">Education Country <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" name="country" required="">
                                @foreach ($country as $item)
                                <option value="{{$item->country}}">
                                    {{$item->country}} </option>
                                    @endforeach
                               
                            </select>
                        </div>
                        <div class="col-lg-6 lube-input mb-3">
                            <label class="control-label mb-2 mt-2 col-sm-10 ">Interested Country <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" name="interested_country">
                                @foreach ($country as $item)
                                <option value="{{$item->country}}">
                                    {{$item->country}} </option>
                                    @endforeach
                               
                            </select>
                        </div>
                        <div class="col-lg-6 lube-input mb-3">
                            <label class="control-label mb-2 mt-2 col-sm-10 "> Session Looking <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" name="session" required="">
                                @foreach ($session as $item)
                                <option value="{{$item->session}}" selected="">
                                    {{$item->session}}</option>
                                    @endforeach
                              
                            </select>
                        </div>
                        <div class="col-lg-6 lube-input mb-3">
                            <label class="control-label mb-2 mt-2 col-sm-6 ">Year <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control name" name="year" placeholder="Enter Year"
                                required="">
                        </div>
                        <div class="col-lg-6 lube-input mb-3">
                            <label class="control-label mb-2 mt-2 col-sm-2 ">Courses<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control name" name="course" placeholder="Enter Courses"
                                required="">
                        </div>
                        <div class="col-lg-6 lube-input mb-3">
                            <label class="control-label mb-2 mt-2 col-sm-5 col-md-12">IELTS/TOEFL/SAT1/2 GRE/ GMAT
                                Score
                            </label>
                            <input type="text" class="form-control name" name="score"
                                placeholder="Enter Score with Name">
                        </div>
                        <div class="col-lg-12 lube-input mb-3">
                            <label class="control-label mb-2 mt-2 col-sm-3 col-md-8">How you know about AS EDUCATION
                                <span class="text-danger">*</span>
                            </label>
                                <select class="form-select form-control name" name="ref" required="">
                                    <option value="" >
                                        Select Univeristy</option>
                                    @foreach ($reference as $item)
                                    <option value="{{$item->reference}}">
                                        {{$item->reference}}</option>
                                        @endforeach
                                  
                                </select>
                        </div>
                    </div>
                </div>

                <div style="overflow:auto;">
                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <button type="button" class="main-btn mx-1" id="prevBtn"
                            onclick="nextPrev(-1)">Previous</button>
                        <button type="submit" class="main-btn mx-1" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </form>

        </div>
    </div>
</div>


   @endsection

   @section('script')
   <script>
    function addValueToForm(button) {
        var timeInput = document.getElementById("timeInput");
        timeInput.value = button;
        nextPrev(1);
    }

    $(function() {
    $("#date").datepicker({
        format: "mm/dd/yyyy",
        startDate: "0d",
        todayHighlight: true,
        autoclose: true,
        orientation: "bottom auto",
        todayBtn: "linked",
        todayHighlight: true,
        templates: {
            leftArrow: '<i class="fas fa-angle-left"></i>',
            rightArrow: '<i class="fas fa-angle-right"></i>'
        }
    }).on('show', function(e) {
        $('.datepicker-header').addClass('bg-danger text-white');
    });
});


// date function where we cannot select previeus date more then five
var currentDate = new Date();
var minDate = new Date();
minDate.setDate(currentDate.getDate() - {{$dates}});
var minDateFormatted = minDate.toISOString().split('T')[0];
document.getElementById('date').min = minDateFormatted;
//end date function where we cannot select previeus date more then five




    </script>

   @endsection