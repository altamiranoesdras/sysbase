
<a href="{{ route('rols.show', $id) }}" class='btn btn-default btn-xs' data-toggle="tooltip" title="Ver">
    <i class="fa fa-eye"></i>
</a>

<a href="{{ route('rols.edit', $id) }}" class='btn btn-info btn-xs' data-toggle="tooltip" title="Editar">
    <i class="fa fa-edit"></i>
</a>

<span data-toggle="tooltip" title="Eliminar">
    <a href="#modal-delete-{{$id}}" data-toggle="modal" data-keyboard="true" class='btn btn-danger btn-xs'>
        <i class="fa fa-trash-alt"></i>
    </a>
</span>

<!-- Modal-->
<div class="modal fade" id="modal-delete-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="modalLogoutLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" >
                    <i class="fa fa-warning text-warning fa-2x" aria-hidden="true"></i> &nbsp;¿Eliminar?
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccione "SI" a continuación si está seguro de eliminar el registro.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                {!! Form::open(['route' => ['rols.destroy', $id], 'method' => 'delete']) !!}
                    <button type="submit" class="btn btn-danger">SI</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
