@extends('../admin/layout/main')

@section('content')

<div class="content-wrapper px-lg-3 px-0">

    <livewire:registration.studentmanagment :mainsearch="@$mainsearch" />
  
</div>
<!-- / Layout page -->
</div>


@endsection

@section('script')
<script>
  window.addEventListener('close-model', event => {
  
          $('#followUp').modal('hide');
  
  });
  window.addEventListener('close-editmodel', event => {
  
  $('#view').modal('hide');

});
window.addEventListener('close-unilistmodel', event => {
  
  $('#action-uni').modal('hide');

});
</script>
@endsection