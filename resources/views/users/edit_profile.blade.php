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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                {!! Form::model($user, ['route' => ['user.update.profile', $user->id], 'method' => 'patch','enctype' => "multipart/form-data"]) !!}

                                @include('users.fields_profile')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection