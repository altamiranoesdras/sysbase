@extends('adminlte::layouts.app')
@include('layouts.plugins.select2')
@include('layouts.plugins.bootstrap_fileinput')

@section('htmlheader_title')
	Editar perfil
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Editar perfil
        </h1>
   </section>
   <div class="content">
       @include('flash::message')
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['user.update.profile', $user->id], 'method' => 'patch','enctype' => "multipart/form-data"]) !!}

                        @include('users.fields_profile')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection