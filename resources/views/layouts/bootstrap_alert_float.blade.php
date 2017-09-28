@push('css')
<style>
    #floating_alert {
        position: fixed;
        top: 10px;
        right: 10px;
        /*left: 10px;*/
        z-index: 5000;
    }
</style>
@endpush
@push('scripts')
<script>
    $(function () {
        bootstrap_alert = function (message, alert, timeout) {
            var div = $(
                    '<div id="floating_alert" class="alert alert-' + alert + ' alert-dismissible">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        message + '&nbsp;&nbsp;' +
                    '</div>'
            ).appendTo('body');

            if(timeout!=0){
                setTimeout(function () {
                    $('div.alert').not('.alert-important').alert('close');
                }, timeout);
            }

        }
    })
</script>
@endpush