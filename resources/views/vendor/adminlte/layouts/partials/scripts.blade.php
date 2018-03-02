<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
{{--<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>--}}
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->


<!-- jQuery v3.2.1 -->
<script src="{{ asset('bower/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
<!-- jQuery 2.2.3 -->
{{--<script src="plugins/jquery-2.2.3.min.js"></script>--}}
<!-- jQuery UI 1.11.4 -->
<script src="{{asset("bower/jquery-ui/jquery-ui.min.js")}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('bower/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
{{--<script src="bootstrap/js/bootstrap.min.js"></script>--}}

<!-- AdminLTE App -->
<script src="{{ asset('bower/AdminLTE/dist/js/app.min.js') }}" type="text/javascript"></script>
{{--<script src="dist/js/app.min.js"></script>--}}

<!-- icheck -->
<script src="{{ asset('bower/iCheck/icheck.min.js') }}" type="text/javascript"></script>

<!-- bootstrap-toggle -->
<script src="{{ asset('bower/bootstrap-toggle/js/bootstrap-toggle.min.js') }}" type="text/javascript"></script>
{{--<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>--}}

<script src="{{asset("/bower/toastr/toastr.min.js")}}"></script>

{{--<!-- FastClick -->--}}
{{--<script src="plugins/fastclick/fastclick.js"></script>--}}
{{--<!-- Sparkline -->--}}
{{--<script src="plugins/sparkline/jquery.sparkline.min.js"></script>--}}
{{--<!-- jvectormap -->--}}
{{--<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>--}}
{{--<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>--}}
{{--<!-- SlimScroll 1.3.0 -->--}}
{{--<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>--}}
{{--<!-- ChartJS 1.0.1 -->--}}
{{--<script src="plugins/chartjs/Chart.min.js"></script>--}}
{{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
{{--<script src="dist/js/pages/dashboard2.js"></script>--}}
{{--<!-- AdminLTE for demo purposes -->--}}
{{--<script src="dist/js/demo.js"></script>--}}

<!-- Ocultar alertas flash -->
<script>
    $('div.alert').not('.alert-important').delay({{config('app.delay_fade_out_div_alert',3000)}}).fadeOut(350);
</script>

@stack('scripts')
@yield('scripts')
{{$scripts or ''}}
