<div>
    <div class="card mb-4">
        <h5 class="card-header">Leave Date</h5>
        <div class="card-body" >
    <form class="row " wire:submit.prevent="bookingleavedate" wire:ignore.self> 
        <div class="row add-more-leave-div">
            @foreach($developers as $index => $developer)                                
              <div class="mb-3 col-lg-6 leave-div" style="position: relative;">
                <label class="form-label text-danger" for="" >Leave {{ $index }}<span class="leave-number"></span></label>
                <input type="date" class="form-control" placeholder="Enter Date"  wire:model="developers.{{ $index }}.leave_date" name="leave_date">
                @error('developers.' . $index . '.leave_date') 
                <span class="error">{{ $message }}</span> 
            @enderror
                <button class="delete-leave" wire:click="removeindex({{$index}})"><i class="bi bi-trash-fill"></i></button>
                </div>
                @endforeach
            </div>
     
      <div class="row">
        <div class="col-lg-6 ms-auto ">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-warning me-2" wire:click="addDeveloper">Add More</button>
                <button type="button" class="btn btn-primary " wire:click="bookingleavedate">Save</button>
            </div>                                      
             
            </div>
      </div>
    </form>
        </div></div>
<div class="card mb-4">
<h5 class="card-header">Select Time</h5>
<div class="card-body" >
    <form  wire:submit.prevent="bookingtime" wire:ignore.self>
    <div class="add-more-time-div mb-2">
        @foreach($time as $index => $times)
       <div class="row  p-0">
        <div class="col-lg-12">
            <label for="" class="text-danger form-label">Number {{$index}} <span class="time-number"></span></label>
        </div>
        <div class="mb-3 col-lg-6">
            <label class="form-label" for="basic-default-fullname">Start Time </label>
            <input type="time" class="form-control" placeholder="Enter Date" wire:model="time.{{ $index }}.start_time">
            @error('time.' . $index . '.start_date') 
            <span class="error">{{ $message }}</span> 
        @enderror
          </div>
          <div class="mb-3 col-lg-6">
              <label class="form-label" for="basic-default-fullname">End Time</label>
              <input type="time" class="form-control" placeholder="Enter Date" wire:model="time.{{ $index }}.end_time">
              @error('time.' . $index . '.end_date') 
              <span class="error">{{ $message }}</span> 
          @enderror
          </div>
       </div>
       @endforeach
    </div>
        <div class="col-lg-6 ms-auto ">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-warning me-2" wire:click="addtimerow">Add More</button>
            <button type="button" class="btn btn-primary " wire:click="bookingtime">Save</button>
        </div>                                      
         
        </div>
      </form>
</div>
</div>

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<script type="text/template" id="leave_template" wire:ignore.self>
<div class="mb-3 col-lg-6 leave-div" style="position: relative;" >
<label class="form-label text-danger" for="" >Leave <span class="leave-number"></span></label>
<input type="date" class="form-control" placeholder="Enter Date" wire:model="developers.{{ @$index }}.leave_date" name="leave_date[]">
<button class="delete-leave"><i class="bi bi-trash-fill"></i></button>
</div>
</script>

<script type="text/template" id="time_template">
<div class="row time-div">
<div class="col-lg-12" style="position: relative;">
<label for="" class="text-danger form-label">Number <span class="time-number"></span></label>
<button class="delete-time"><i class="bi bi-trash-fill"></i></button>
</div>
<div class="mb-3 col-lg-6">
<label class="form-label" for="basic-default-fullname">Start Time</label>
<input type="time" class="form-control" placeholder="Enter Date">
</div>
<div class="mb-3 col-lg-6">
<label class="form-label" for="basic-default-fullname">End Time</label>
<input type="time" class="form-control" placeholder="Enter Date">
</div>
</div>
</script>

</div>
