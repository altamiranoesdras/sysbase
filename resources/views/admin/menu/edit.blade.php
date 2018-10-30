@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Editar opción: {{$opcion->nombre}}</h1>
                </div><!-- /.col -->

                <div class="col">
                    <a class="btn btn-outline-info float-right"
                       href="{{route('options.index')}}">
                        <i class="fa fa-list" aria-hidden="true"></i>&nbsp;<span class="d-none d-sm-inline">Listado</span>
                    </a>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">

            @include('flash::message')

            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-warning">
                        <!-- /.card-header -->
                        <div class="card-body">
                            {!! Form::model($opcion, ['route' => ['options.update', $opcion->id], 'method' => 'patch']) !!}
                                @include('admin.menu.fields')

                                <!-- Submit Field -->
                                <div class="form-group col-sm-12">
                                    <button type="submit" onClick="this.form.submit(); this.disabled=true;" class="btn btn-outline-success">Guardar</button>
                                    <a href="{!! route('options.index') !!}" class="btn btn-outline-default">Cancelar</a>
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

@endsection
