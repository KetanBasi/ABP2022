<!-- ANCHOR: Core JS: Popper -->
<script src="{{ asset('js/core/popper.min.js') }}"></script>

<!-- ANCHOR: Core JS: Bootstrap -->
<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>

<!-- ANCHOR: Plugin: Perfect Scrollbar -->
<script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>

<!-- ANCHOR: Plugin: Smooth Scrollbar -->
<script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>

<!-- ANCHOR: Github Buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- ANCHOR: Material Dashboard -->
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/material-dashboard.min.js') }}?v=3.0.4"></script>

<!-- ANCHOR: Other Internal JS -->
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
