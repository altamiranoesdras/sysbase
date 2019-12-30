<!-- REQUIRED JS SCRIPTS -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
<script src="{{ asset('/js/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/sweetalert2.min.js') }}" type="text/javascript"></script>


<script>
    $('div.alert').not('.alert-important').delay({{config('app.tiempo_oculta_alerta',3) * 1000}}).fadeOut(350);
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

    /**
     * Formatea los datos de los inputs de un formulario
     * solo se utiliza en archivos de servicio DataTable ej: VentaDataTable.php
     * en el método html
     * ->ajax([
     *      'data' => "function(data) { formatDataDatatables($('#form-filter-ventas').serializeArray(), data);   }"
     *  ])
     * @param source
     * @param target
     */
    function formatDataDataTables(source, target) {
        $(source).each(function (i, v) {

            // consola(i, v);
            target[v['name']] = v['value'];
        })

    }


    var globalDebug = "{{(Int) env('APP_DEBUG') }}";

    globalDebug = Boolean(parseInt(globalDebug));

    console.log('Estado depuración ',globalDebug);

    /**
     * Imprime en consola del navegador la data si el entorno debug de laravel esta activo
     * @param data
     */
    function consolaJs(data,...otherData) {
        if (globalDebug){
            console.log(data,otherData);
        }
    }

    /**
     * Funcion para confirmar la eliminacion de los registros de cualquier datatable
     * @param data
     */
    function deleteThis(data){
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, elimínalo\n!'
        }).then((result) => {
            if (result.value) {
                $("#delete-form"+id).submit();
            }
        });
    }

    $('.multiselect-two-sides').multiselect({
        search: {
            left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
        },
        fireSearch: function(value) {
            return value.length > 3;
        }
    });

</script>

<!-- Scripts inyectados-->
@stack('scripts')
@yield('scripts')