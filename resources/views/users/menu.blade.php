@extends('layouts.app')

@section('htmlheader_title')
    Menu del usuario: {{$user->name}}
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="m-0 text-dark">Menu del usuario: {{$user->name}}</h1>
                </div><!-- /.col -->
                <div class="col">
                    <a class="btn btn-outline-info float-right" href="{!! route('users.index') !!}">
                        <i class="fa fa-list"></i>
                        <span class="d-none d-sm-inline">Listado</span>
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            @include('flash::message')

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    {!! Form::model($user, ['route' => ['users.menuStore', $user->id], 'method' => 'patch']) !!}

                                    {!! $menu !!}

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-2">
                                            <button type="submit" class="btn btn-primary">
                                                Guardar
                                            </button>

                                            <a href="{{ action("UserController@index") }}">

                                                <button type="button" class="btn btn-default">
                                                    Regresar
                                                </button>
                                            </a>

                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
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
@push('scripts')
    <script>
        $(function () {

            $("input:checkbox").change(function (data) {

                var ul = $(this).closest('ul');
                var i=0;

                ul.find("li").each(function (index,element) {

                    console.log($(this).text().trim())
                    if( $(this).find('input').is(':checked')  ){
                        i++;
                    }

                })

                var chkPadre= ul.prev('div').find("input");

                if(i>0){
                    chkPadre.prop("checked",true);
                }else{
                    chkPadre.prop("checked",false);
                }
            })
        })
    </script>
@endpush
