<!-- plugins:js -->
<script src="{{ asset('dashboard/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('dashboard/assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('dashboard/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/misc.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('dashboard/assets/js/dashboard.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/todolist.js') }}"></script>
<!-- End custom js for this page -->
@stack('scripts')
