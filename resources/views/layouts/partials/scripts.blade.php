<!-- REQUIRED JS SCRIPTS -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
<script src="{{ asset('/js/toastr.min.js') }}" type="text/javascript"></script>


<script>
    $('div.alert').not('.alert-important').delay({{config('app.tiempo_oculta_alerta',3000)}}).fadeOut(350);
    $(function(){
        $('[data-toggle="tooltip"]').tooltip();
    })


    if ('serviceWorker' in navigator) {
        console.log("¿Se registrará el trabajador de servicio?");
        navigator.serviceWorker.register('{{asset('sw.js')}}')
            .then(function(reg){
                console.log("Sí lo hizo.");
            }).catch(function(err) {
            console.log("No, no fue así. Esto sucedió:", err)
        });
    }

    function erroresToList(errors) {

        var res ="<ul style='list-style-type: none; padding:0px;'>";

        $.each(errors,function (field,fieldErrors) {

            $.each(fieldErrors,function (index,error) {
                res = res+'<li>'+error+'</li>';
            })
        })

        return res;
    }

    $.fn.serializeObject = function()
    {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    // Loading button plugin (removed from BS4)
    (function($) {
        $.fn.button = function(action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));
</script>

<!-- Scripts inyectados-->
@stack('scripts')
@yield('scripts')