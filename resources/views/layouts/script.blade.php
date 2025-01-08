<script src=" {{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src=" {{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src=" {{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src=" {{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src=" {{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<!-- owl.carousel js -->
<script src=" {{ asset('assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>

<!-- auth-2-carousel init -->
<script src=" {{ asset('assets/js/pages/auth-2-carousel.init.js') }}"></script>

   <!-- apexcharts -->
   <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
     <!-- Required datatable js -->
     <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
     <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

   <!-- dashboard init -->
   <script src="{{ asset('assets/js/pages/dashboard.init.js')}}"></script>
     <!-- Datatable init js -->
     <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>    

<!-- App js -->
<script src=" {{ asset('assets/js/app.js') }}"></script>
@stack('scripts')