@extends('../admin/layout/main')

@section('content')
    

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- <h4 class="pt-3 pb-2">Registration</h4> -->
      <!-- Striped Rows -->
  


            <livewire:registration.country />


      <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
  </div>



@endsection

@section('script')
<script>
  window.addEventListener('close-model', event => {
  
          $('#staticBackdrop').modal('hide');
  
  })
</script>
@endsection