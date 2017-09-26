@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')

    <body class="hold-transition login-page">
    <div id="app">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/home') }}"><b>{{config('app.name')}}</b></a>
            </div><!-- /.login-logo -->

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

            <div class="login-box-body">
                <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p>
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
                    </div>
                </form>

                {{--        @include('adminlte::auth.partials.social_login')--}}

                {{--<a href="{{ url('/password/reset') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>--}}
                {{--<a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a>--}}

            </div><!-- /.login-box-body -->

        </div><!-- /.login-box -->
    </div>
    @include('adminlte::layouts.partials.scripts_auth')
    </body>

@endsection
