<!-- Username Field -->
<div class="form-group col-sm-3">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-3">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Rols Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rols', 'Roles:') !!}

    @can('Crear Rol')
        <a class="success" data-toggle="modal" href="#modal-form-roles" tabindex="1000">nuevo</a>
    @endcan
    {!!
        Form::select(
            'rols[]',
            slc(\App\Models\Role::class,'name','name',null),
            isset($userEdit) ? $userEdit->getRoleNames() : null,
            ['id'=>'rols','class' => 'form-control', 'multiple' => 'multiple','style'=>'width: 100%']
        )
    !!}
</div>

<!-- Permisos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permisos', 'Permisos Directos:') !!}

    @can('crear permiso')
        <a class="success" data-toggle="modal" href="#modal-form-permissions" tabindex="1000">nuevo</a>
    @endcan

    {!!
        Form::select(
            'permisos[]',
            slc(\App\Models\Permission::class,'name','name',null),
            isset($userEdit) ? $userEdit->getDirectPermissions()->pluck('name','name') : null,
            ['id'=>'permisos','class' => 'form-control', 'multiple' => 'multiple','style'=>'width: 100%']
        )
    !!}
</div>

<div class="form-group col-sm-12" style="padding: 0px; margin: 0px">
</div>
@if(!isset($create))
    <div class="form-group col-sm-12">
        <a class="" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <span class=" btn btn-outline-primary">Editar también contraseña</span>
        </a>
    </div>
@endif


<div class="col-sm-12 {{ !isset($create) ? "collapse" : '' }}" id="collapseExample">
    <div class="form-row">

    <!-- Password Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password', 'password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <!-- Password Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password_confirmation', 'Confirmar password:') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
    </div>
</div>

@if(!isset($create))
<!-- Imagen Field -->
<div class="form-group col-sm-4">
    <div class="card" >
        <img class="card-img-top" src="{{$userEdit->imagen()}}" alt="Card image cap" id="img-user">
        <div class="card-body" style="padding: 0px">
            <!-- Imagen Field -->

            <div class="form-row " id="field-img" style="display: none">
                <div class="form-group col-sm-12">
                    <input id="files" name="imagen" type="file">
                </div>
            </div>
            <a  href="#" class="btn btn-outline-info btn-sm btn-block" id="etidarImagen">Editar</a>
        </div>
    </div>
</div>
@else
    <!-- Imagen Field -->
    <div class="form-group col-sm-4">
        <input id="files" name="imagen" type="file">
    </div>
@endif

@push('scripts')
<script>
    $(function () {
        $("#etidarImagen").click(function (e) {
            e.preventDefault();
            console.log('editar imagen');
            $('#field-img').show();
            $('#img-user').hide();

        });
        $("#rols,#permisos").select2();

        var $input = $("#files");
        $input.fileinput({
            {{--uploadUrl: "{{route('api.temp_files.multi_store',Auth::user()->id)}}", // server upload action--}}
//            uploadAsync: false,
            showUpload: false, // hide upload button
            showRemove: false, // hide remove button
//            minFileCount: 1,
//            maxFileCount: 5,
            allowedFileExtensions: ["png","bmp","gif","jpg","pdf"],
        });
    })
</script>
@endpush