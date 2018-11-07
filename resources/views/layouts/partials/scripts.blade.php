<!-- REQUIRED JS SCRIPTS -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
<script src="{{ asset('/js/toastr.min.js') }}" type="text/javascript"></script>


<script>
    $('div.alert').not('.alert-important').delay({{config('app.tiempo_oculta_alerta',3000)}}).fadeOut(350);
    $(function(){
        $('[data-toggle="tooltip"]').tooltip();
    })


    if ('serviceWorker' in navigator ) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('{{asset('service-worker.js')}}').then(function(registration) {
                // Registration was successful
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
            }, function(err) {
                // registration failed :(
                console.log('ServiceWorker registration failed: ', err);
            });
        });
    }
</script>

<!-- Scripts inyectados-->
@stack('scripts')
@yield('scripts')