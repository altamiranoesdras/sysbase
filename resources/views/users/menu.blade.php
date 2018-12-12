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

                var item_list = $(this).closest('li');

                var tienHijos = $(this).data('tiene-hijos');
                var tienPadre = $(this).data('tiene-padre');

                var checked = $(this).is(':checked');

                console.log('cambio en opcion: ');
                var i=0;


                if (tienHijos){

                    item_list.find('input:checkbox').prop("checked",checked);
                }
                if (tienPadre){

                    checkParent(item_list,checked)

                }
                //
            })


            function checkParent(elemento) {
                var padre= elemento.closest('ul').prev('div');

                while (padre.data('id') != null){

                    if(haveChildrenChecked(padre)){

                        padre.find('input.padre:first').prop("checked",true);
                    }else {
                        padre.find('input.padre:first').prop("checked",false);
                    }

                    padre= padre.closest('ul').prev('div');

                }
            }

            function haveChildrenChecked(padre) {

                console.log(padre.next('ul'));
                var i=0;

                padre.next('ul').find("li").each(function (index,element) {

                    if( $(this).find('input').is(':checked')  ){
                        i++;
                    }

                });

                return (i>0) ? true : false;
            }

        })
    </script>
@endpush
