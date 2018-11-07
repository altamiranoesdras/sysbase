<!-- REQUIRED JS SCRIPTS -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
<script src="{{ asset('/js/toastr.min.js') }}" type="text/javascript"></script>


<script>
    $('div.alert').not('.alert-important').delay({{config('app.tiempo_oculta_alerta',3000)}}).fadeOut(350);
    $(function(){
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>

<!-- Scripts inyectados-->
@stack('scripts')
@yield('scripts')