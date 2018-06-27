@include('layouts.plugins.select2')
@include('layouts.plugins.bootstrap_fileinput')

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
<div class="form-group col-sm-3">
    {!! Form::label('rols', 'Roles:') !!}
    <select name="rols[]" id="rols" class="form-control" multiple="multiple">
        <option value=""> -- Select One -- </option>
        @foreach($rols as $rol)
            <option value="{{$rol->id}}" {{ in_array($rol->id,$rolsUser) ? "selected" : ""}}>{{$rol->descripcion}}</option>
        @endforeach
    </select>
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
        <img class="card-img-top" src="{{$user->imagen()}}" alt="Card image cap" id="img-user">
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
        $("#rols").select2();

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