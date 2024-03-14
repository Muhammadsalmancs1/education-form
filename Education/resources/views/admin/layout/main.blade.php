<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Education Consultents</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <!-- <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" /> -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('../admin/assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('../admin/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('../admin/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('../admin/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('../admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Helpers -->
    <script src="{{asset('../admin/assets/vendor/js/helpers.js')}}"></script>
    <script src="{{asset('../admin/assets/js/config.js')}}"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   
    <!-- Add this to your main layout or component -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @livewireStyles
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
          @include('../admin/layout/sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
           
                @include('../admin/layout/header')

                <!-- / Navbar -->




@yield('content')


                
                        <!-- Footer -->
                  
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <script src="{{asset('../admin/assets/vendor/libs/jquery/jquery.js')}}"></script>
        <script src="{{asset('../admin/assets/vendor/libs/popper/popper.js')}}"></script>
        <script src="{{asset('../admin/assets/vendor/js/bootstrap.js')}}"></script>
        <script src="{{asset('../admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('../admin/assets/vendor/js/menu.js')}}"></script>
        <!-- Main JS -->
        <script src="{{asset('../admin/assets/js/main.js')}}"></script>
        <!-- Page JS -->
        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script src="{{asset('./admin/assets/Js/table.js')}}"></script>
        <script>
            $("#view").on("shown.bs.modal", function () {
                $('#select2').select2({
                    dropdownParent: $('#view .modal-content form .modal-body .container .row .col-lg-6')
                });
                // $.fn.modal.Constructor.prototype.enforceFocus = function() {};
            })

        </script>
        <script>
            // new DataTable('#new-lead');
            $(document).ready(function () {

                new DataTable('#new-lead', {
                    language: {
                        searchPlaceholder: "Search records"
                    },
                    responsive: true,
                    "paging": false,
                    "info": false
                });

                // new DataTable('#appointments');
                new DataTable('#appointments', {
                    language: {
                        searchPlaceholder: "Search records"
                    },
                    responsive: true,
                    "paging": false,
                    "info": false
                });


            });

        </script>

        <script>
            // document.getElementById("defaultOpen").click();
            $(document).ready(function () {
                // Click event for tab buttons
                $(".tablinks").click(function () {
                    var tabName = $(this).data("tab");

                    // Remove the "active" class from all tab buttons
                    $(".tablinks").removeClass("active");

                    // Hide all tab content
                    $(".tabcontent").hide();

                    // Show the selected tab content
                    $("#" + tabName).show();

                    // Add the "active" class to the clicked tab button
                    $(this).addClass("active");
                });

                // Trigger the default tab to open
                $("#defaultOpen").click();
            });
            document.getElementById("defaultOpen").click();
        </script>
 @livewireScripts
</body>
</html>
@yield('script')
<script>
    window.addEventListener('swal', function (e) {
        const swalConfig = {
            position: e.detail.position,
            icon: e.detail.icon,
            title: e.detail.title,
            showConfirmButton: e.detail.showConfirmButton,
            timer: e.detail.timer,
        };
    
        Swal.fire(swalConfig);
    });
    
    
    window.addEventListener('swal:confirm', function (e) {
        const swalConfig = {
            position: e.detail.position,
            icon: e.detail.icon,
            title: e.detail.title,
            showConfirmButton: e.detail.showConfirmButton,
            timer: e.detail.timer,
        };

        Swal.fire(swalConfig).then((willDelete) => {
            if (willDelete.isConfirmed) {
                window.livewire.emit('destroy', e.detail.item_id);
            }
        });
    });
    window.addEventListener('swal:timedelete', function (e) {
        const swalConfig = {
            position: e.detail.position,
            icon: e.detail.icon,
            title: e.detail.title,
            showConfirmButton: e.detail.showConfirmButton,
            timer: e.detail.timer,
        };

        Swal.fire(swalConfig).then((willDelete) => {
            if (willDelete.isConfirmed) {
                window.livewire.emit('confirmdestroy', e.detail.item_id);
            }
        });
    });
</script>