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

        <div class="login-box">
            <div class="box box-info box-solid ">
                <div class="box-header with-border">
                    <h3 class="box-title"><a href="{{ url('/home') }}"><b>Admin</b>LTE</a></h3>
                </div>
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
            <!-- /.box-header -->
                <div class="box-body">
                    <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p>

                    <login-form></login-form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            {{--@include('adminlte::auth.partials.social_login')--}}
            {{--<a href="{{ url('/password/reset') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>--}}
            {{--<a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a>--}}

        </div>


    </div>
    @include('adminlte::layouts.partials.scripts_auth')

    </body>

@endsection

