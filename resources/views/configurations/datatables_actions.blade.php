
<span data-toggle="tooltip" title="Ver" >
    <button class='btn btn-default btn-xs' data-toggle="modal" data-target="#modalShowconfigurations{{$id}}">
        <i class="fa fa-eye"></i>
    </button>
</span>

<a href="{{ route('configurations.edit', $id) }}" class='btn btn-info btn-xs' data-toggle="tooltip" title="Editar">
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
                {!! Form::open(['route' => ['configurations.destroy', $id], 'method' => 'delete']) !!}
                    <button type="submit" class="btn btn-danger">SI</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->



<!-- Modal Show -->
<div class="modal fade" id="modalShowconfigurations{{$id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelTitleId">
                    Configuration
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('configurations.show_fields',['configuration' => \App\Models\Configuration::find($id)])
            </div>
        </div>
    </div>
</div>