@extends('../admin/layout/main')

@section('content')




          <!-- Content wrapper -->
          <div class="content-wrapper px-lg-3 px-0">
            <!-- Content -->


            <div class="container-xxl flex-grow-1 container-p-y">
                <!-- <h4 class=" pb-2">User Register</h4> -->
               
                      

                        <livewire:registration.bookingleavedate />

@endsection

@section('script')



<script>
    $(document).ready(function () {

        $('.add-more-leave').on('click', function () {
            var templateClone = $('#leave_template').html();
            $('.add-more-leave-div').append(templateClone);
            updateLeaveNumbers();
        });

        $('.add-more-leave-div').on('click', '.delete-leave', function () {
            $(this).closest('.leave-div').remove();
            updateLeaveNumbers();
        });

        function updateLeaveNumbers() {
            var leaveLabels = $('.add-more-leave-div').find('.form-label.text-danger');
            leaveLabels.each(function (index) {
                $(this).find('.leave-number').text(index + 1);
            });
        }
        updateLeaveNumbers();
    });
</script>
<!-- add more time -->
<script>
    $(document).ready(function () {

        $('.add-more-time').on('click', function () {
            var templateClone = $('#time_template').html();
            $('.add-more-time-div').append(templateClone);
            updateTimeNumbers();
        });

        $('.add-more-time-div').on('click', '.delete-time', function () {
            $(this).closest('.time-div').remove();
            updateTimeNumbers();
        });

        function updateTimeNumbers() {
            var timeLabels = $('.add-more-time-div').find('.form-label.text-danger');
            timeLabels.each(function (index) {
                $(this).find('.time-number').text(index + 1);
            });
        }
        updateTimeNumbers();
    });
</script>
@endsection
