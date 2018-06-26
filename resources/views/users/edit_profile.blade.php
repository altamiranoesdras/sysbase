@extends('layouts.app')
@include('layouts.plugins.select2')
@include('layouts.plugins.bootstrap_fileinput')

@section('htmlheader_title')
	Editar perfil
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Editar perfil</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            @include('flash::message')
            @include('adminlte-templates::common.errors')

            {!! Form::model($user, ['route' => ['user.update.profile', $user->id], 'method' => 'patch','enctype' => "multipart/form-data"]) !!}
            <div class="row">
                <div class="col-lg-5">
                    <div class="card" >
                        <img class="card-img-top" src="{{Auth::user()->imagen()}}" alt="Card image cap" id="img-user">
                        <div class="card-body" style="padding: 0px">
                            <!-- Imagen Field -->

                            <div class="form-row " id="field-img" style="display: none">
                                <div class="form-group col-sm-12">
                                <input id="files" name="imagen" type="file">
                                </div>
                            </div>
                            <a class="btn btn-outline-info btn-sm btn-block" id="etidarImagen">Editar</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-row">
                                <!-- Name Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('name', 'Name:') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>

                                <!-- Email Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('email', 'Email:') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card card-default collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Editar contraseña</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-edit"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
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
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    <button type="submit" onClick="this.form.submit(); this.disabled=true;" class="btn btn-outline-success">Guardar</button>
                    <a href="{{URL::previous()}}" class="btn btn-default">Cancelar</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
@push('scripts')
<script>
    $(function () {
        $("#etidarImagen").click(function () {
           console.log('editar imagen');
            $('#field-img').show();
            $('#img-user').hide();

        });

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