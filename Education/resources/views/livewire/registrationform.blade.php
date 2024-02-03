<div>
    

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <form id="regForm" wire:submit.prevent="registerform">
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">
                        <div class="Scriptcontent">
                            <h1 class="top-heading">Select Date</h1>
                            <!-- DEMO HTML -->
                            <div class="calendar-wrapper mt-4">
                                <button id="btnPrev" type="button"></button>
                                <button id="btnNext" type="button"></button>
                                <div id="divCal"></div>
                            </div>
                            <!-- END DEMO HTML -->
                        </div>
                    </div>

                    <div class="tab">

                        <h1 class="top-heading">Select Time</h1>
                        <br>
                        <div class="d-flex justify-content-center flex-wrap my-lg-5 my-4">
                            <input type="button"  class="me-2 main-btn2" value="12:00 am" wire:model="time" onclick="nextPrev(1)">
                            <input type="button" class="me-2 main-btn2" value="01:15 pm" onclick="nextPrev(1)">
                            <input type="button" class="me-2 main-btn2" value="04:20 am" onclick="nextPrev(1)">
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row">
                            <h1 class="top-heading mb-lg-5 mb-4"> Registration Form</h1>

                            <div class="col-lg-4 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-sm-2 ">Name<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control name" wire:model="name" name="name" placeholder="Enter name"
                                    required="" >
                            </div>
                            <div class="col-lg-4 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-sm-3 col-md-7">Email Address </label>
                                <input type="email" class="form-control name"  wire:model="email" name="email" placeholder="Enter Email ">
                            </div>
                            <div class="col-lg-4 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-sm-3 col-md-6">Contact# <span
                                        class="text-danger">*</span> </label>
                                <input type="number" class="form-control name" wire:model="contact" name="contact"
                                    placeholder="Enter contact #" required="">
                            </div>

                            <div class="col-lg-12 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-sm-2 ">Address <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control name" wire:model="address" name="address" placeholder="Enter address"
                                    required="">
                            </div>
                            <div class="col-lg-6 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-md-10 ">Qualification 1<span
                                        class="text-danger">*</span></label>
                                <select class="form-select" wire:model="qualification1" name="qualification" required="required">
                                    <!--<option  disabled></option>-->
                                    <option value=""> -- School Level --</option>

                                    <option value="1">
                                        Matric </option>

                                    <option value="2">
                                        O-Level </option>

                                    <option value="3">
                                        Other </option>
                                </select>
                            </div>
                            <div class="col-lg-6 lube-input mb-3" id="text_area" style="display:none;">

                                <label class="control-label mb-2 mt-2 col-md-6 ">Other</label>
                                <input type="text" class="form-control name" name="other" placeholder="Enter  Other">


                            </div>
                            <div class="col-lg-6 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-md-6 ">Grade 1 </label>
                                <input type="text" class="form-control name" wire:model="grade1" name="grade_1" placeholder="Enter Grade">
                            </div>
                            <div class="col-lg-6 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-md-10 ">Qualification 2 <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="qualification_2" wire:model="qualification2">
                                    <option value=""> -- College Level --</option>
                                    <option value="1">
                                        Inter </option>
                                    <option value="2">
                                        A-Level </option>
                                    <option value="3">
                                        IB </option>
                                    <option value="4">
                                        AP </option>
                                    <option value="5">
                                        Other </option>
                                    <option value="6">
                                        none </option>
                                </select>
                            </div>
                            <div class="col-lg-6 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-md-6 ">Grade 2 </label>
                                <input type="text" class="form-control name" wire:model="grade2" name="grade_2" placeholder="Enter Grade">
                            </div>
                            <div class="col-lg-6 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-md-10 ">Qualification 3 </label>
                                <select class="form-select" name="qualification_3" wire:model="qualification3" required="required">
                                    <option value=""> -- University Level --</option>
                                    <option value="1">
                                        B.Com </option>
                                    <option value="2">
                                        BA </option>
                                    <option value="3">
                                        3 Year Bachelors </option>
                                    <option value="4">
                                        4 Year Bachelors </option>
                                    <option value="5">
                                        Master </option>
                                    <option value="6">
                                        Other </option>
                                    <option value="7">
                                        none </option>
                                </select>
                            </div>
                            <div class="col-lg-6 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-sm-6">Grade 3 </label>
                                <input type="text" class="form-control name" wire:model="grade3" name="grade_3" placeholder="Enter Grade">
                            </div>
                            <div class="col-lg-6 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-sm-10 ">Education Country <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="country_id" wire:model="education_country" required="">
                                    <option value="8">
                                        AUSTRALIA </option>
                                    <option value="7">
                                        CANADA </option>
                                    <option value="9">
                                        MALAYSIA </option>
                                    <option value="11">
                                        PAKISTAN </option>
                                    <option value="10">
                                        TURKEY </option>
                                    <option value="6">
                                        UAE </option>
                                    <option value="5">
                                        UK </option>
                                    <option value="4">
                                        USA </option>
                                </select>
                            </div>
                            <div class="col-lg-6 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-sm-10 ">Interested Country <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" wire:model="interested_country">
                                    <option value="8">
                                        AUSTRALIA </option>
                                    <option value="7">
                                        CANADA </option>
                                    <option value="9">
                                        MALAYSIA </option>
                                    <option value="11">
                                        PAKISTAN </option>
                                    <option value="10">
                                        TURKEY </option>
                                    <option value="6">
                                        UAE </option>
                                    <option value="5">
                                        UK </option>
                                    <option value="4">
                                        USA </option>
                                </select>
                            </div>
                            <div class="col-lg-6 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-sm-10 "> Session Looking <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="session"  wire:model="session_looking" required="">
                                    <option value="17" selected="">
                                    </option>
                                    <option value="10" selected="">
                                        JANUARY- MARCH 2022 </option>
                                    <option value="12" selected="">
                                        JANUARY- MARCH 2023 </option>
                                    <option value="15" selected="">
                                        JANUARY- MARCH 2024 </option>
                                    <option value="9" selected="">
                                        SEPTEMBER 2021 </option>
                                    <option value="11" selected="">
                                        SEPTEMBER 2022 </option>
                                    <option value="13" selected="">
                                        SEPTEMBER 2023 </option>
                                    <option value="16" selected="">
                                        SEPTEMBER 2024 </option>
                                </select>
                            </div>
                            <div class="col-lg-6 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-sm-6 ">Year <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control name" wire:model="year" name="year" placeholder="Enter Year"
                                    required="">
                            </div>
                            <div class="col-lg-6 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-sm-2 ">Courses<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control name" wire:model="courses" name="course" placeholder="Enter Courses"
                                    required="">
                            </div>
                            <div class="col-lg-6 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-sm-5 col-md-12">IELTS/TOEFL/SAT1/2 GRE/ GMAT
                                    Score
                                </label>
                                <input type="text" class="form-control name" wire:model="course_name" name="score"
                                    placeholder="Enter Score with Name">
                            </div>
                            <div class="col-lg-12 lube-input mb-3">
                                <label class="control-label mb-2 mt-2 col-sm-3 col-md-8">How you know about AS EDUCATION
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control name" wire:model="reference" name="ref" placeholder="Enter Reference"
                                    required="">
                            </div>
                        </div>
                    </div>

                    <div style="overflow:auto;">
                        <div class="d-flex justify-content-center align-items-center mt-4">
                            <button type="button" class="main-btn mx-1" id="prevBtn"
                                onclick="nextPrev(-1)">Previous</button>
                            <button type="button" class="main-btn mx-1" id="nextBtn" onclick="nextPrev(1)">Next</button>
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


</div>
