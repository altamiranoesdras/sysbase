<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="{{asset('dist/js/pages/dashboard3.js')}}"></script>

<script>
    $('div.alert').not('.alert-important').delay({{config('app.delay_fade_out_div_alert',3000)}}).fadeOut(350);
</script>

{{--<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>--}}

<!--Scripts inyectados-->
@stack('scripts')
@yield('scripts')
{{$scripts or ''}}