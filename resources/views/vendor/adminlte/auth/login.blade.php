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

            <div class="card card-info card-outline">
                <div class="card-header">
                    <a href="{{ url('/home') }}"><b>{{config('app.name')}}</b></a>
                </div>
                <div class="card-body">
                    <p class="text-info text-center"> {{ trans('adminlte_lang::message.siginsession') }} </p>

                    <login-form name="username"
                                domain="{{ config('auth.defaults.domain','') }}"></login-form>
                </div>
            </div>
            {{--@include('adminlte::auth.partials.social_login')--}}
            {{--<a href="{{ url('/password/reset') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>--}}
            {{--<a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a>--}}

        </div>


    </div>
    @include('adminlte::layouts.partials.scripts_auth')

    </body>

@endsection

