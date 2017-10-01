@extends('adminlte::layouts.app')

@section('content')

    <div class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><strong>Editar opción: {{$opcion->nombre}}</strong></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <!--Contenido-->
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/option',["id" => $opcion->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group {{ $errors->has('padre') ? ' has-error ': '' }}">
                                <label for="padre" class="col-sm-2 control-label">Opción superior</label>
                                <div class="col-sm-6">
                                    {{$padre->nombre or "Ninguna"}}
                                    <input type="hidden" name="padre" value="{{$padre->id or ""}}">
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('nombre') ? ' has-error ': '' }}">
                                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-6">
                                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="{{$opcion->nombre}}">
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('descripcion') ? ' has-error ': '' }}">
                                <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" value="{{$opcion->descripcion}}">
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('ruta') ? ' has-error ': '' }}">
                                <label for="ruta" class="col-sm-2 control-label">Ruta</label>
                                <div class="col-sm-6">
                                    <input name="ruta" type="text" class="form-control" id="ruta" placeholder="Ruta" value="{{$opcion->ruta}}">
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('icono_l') ? ' has-error ': '' }}">
                                <label for="icono_l" class="col-sm-2 control-label">Icono isquierdo</label>
                                <div class="col-sm-10">

                                    @foreach($iconos as $icono)
                                        <label class="radio-inline">
                                            <input type="radio" name="icono_l" id="inputID" value="{{$icono}}" {{$icono==$opcion->icono_l ? "checked" : ''}}>
                                            <i class="fa {{$icono}}"></i>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('icono_r') ? ' has-error ': '' }}">
                                <label for="icono_r" class="col-sm-2 control-label">Icono derecho </label>
                                <div class="col-sm-10">
                                    <label class="radio-inline">
                                        <input type="radio" name="icono_r" id="inputID" value="" {{$opcion->icono_r=="" ? "checked" : ''}}>
                                        ninguno
                                    </label>
                                    @foreach($iconos as $icono)
                                        <label class="radio-inline">
                                            <input type="radio" name="icono_r" id="inputID" value="{{$icono}}" {{$icono==$opcion->icono_r ? "checked" : ''}}>
                                            <i class="fa {{$icono}}"></i>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Editar
                                    </button>

                                    <a href="{{ URL::previous() }}">

                                        <button type="button" class="btn btn-danger">
                                            Cancelar
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    <!--Fin Contenido-->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
