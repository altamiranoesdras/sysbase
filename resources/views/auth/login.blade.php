@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@push('css')

<style>
    .background-image {
        position: absolute;
        left: 0;
        top: 0;
        background: url("{{asset('/img/fondo_login.png')}}") no-repeat;
        background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        -o-background-size: cover;
        width: 100%;
        height: 100%;
        -webkit-filter: blur(5px);
        -moz-filter: blur(5px);
        -o-filter: blur(5px);
        -ms-filter: blur(5px);
        filter: blur(5px);

    }
</style>
@endpush
@section('content')

    <body >
    <div class="background-image"></div>
    <div id="app" >

        <dvi class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-primary" style="margin-top: 100px">
                    <div class="panel-heading">
                        <h2 class="panel-title text-bold">
                            <a href="{{ url('/home') }}"><b>{{config('app.nombre_negocio')}}</b></a>
                        </h2>
                    </div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ url('/login') }}" method="post">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    {{--<login-input-field--}}
                                    {{--name="{{ config('auth.providers.users.field','email') }}"--}}
                                    {{--domain="{{ config('auth.defaults.domain','') }}"--}}
                                    {{--></login-input-field>--}}
                                    {{--<div class="form-group has-feedback">--}}
                                    {{--<input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>--}}
                                    {{--<span class="glyphicon glyphicon-user form-control-feedback"></span>--}}
                                    {{--</div>--}}
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control" placeholder="Nombre de usuario" name="username" autofocus/>
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{--<div class="col-xs-6">--}}
                                {{--<div class="checkbox icheck">--}}
                                {{--<label>--}}
                                {{--<input style="display:none;" type="checkbox" name="remember"> {{ trans('adminlte_lang::message.remember') }}--}}
                                {{--</label>--}}
                                {{--</div>--}}
                                {{--</div><!-- /.col -->--}}
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-success btn-block"><b>INGRESAR</b></button>
                                </div><!-- /.col -->

                                @if(config('app.demo'))
                                    <div class="col-xs-12 text-center" style="padding-top: 5px">
                                        Usuario: <b class="text-info">admin</b> Contraseña: <b class="text-info">123456</b>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </dvi>


    </div>
    @include('adminlte::layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    </body>

@endsection
