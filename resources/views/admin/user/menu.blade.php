@extends('adminlte::layouts.app')


@section('content')
    <div class="content">
        @include('flash::message')
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><strong>Menu del usuario: {{$user->name}}</strong></h3>
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/user/menu',["id" => $user->id]) }}">
                            {{ csrf_field() }}

                            {!! $menu !!}

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>

                                    <a href="{{ action("AdminUserControler@index") }}">

                                        <button type="button" class="btn btn-default">
                                            Regresar
                                        </button>
                                    </a>

                                </div>
                            </div>
                        </form>
                        <!--Fin Contenido-->
                    </div>
                </div>

            </div>
        </div><!-- /.row -->
    </div>

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