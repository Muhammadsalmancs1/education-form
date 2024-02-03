@extends('../admin/layout/main')

@section('content')


          <!-- Content wrapper -->
          <div class="content-wrapper px-lg-3 px-0">
            <!-- Content -->


            <div class="container-xxl flex-grow-1 container-p-y">
                <!-- <h4 class="pt-3 pb-2">Student Management</h4> -->

   
   
                <livewire:transection.assign-counselors />

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
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->



@endsection