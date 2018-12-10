<!-- Logout Modal-->
<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">¿Listo para salir?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                Seleccione "Salir" a continuación si está listo para finalizar su sesión actual.
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a href="{{ url('/logout') }}" class="btn btn-warning" id="logout"
                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                    {{ trans('adminlte_lang::message.signout') }}
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <input type="submit" value="logout" style="display: none;">
                </form>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
