@extends('adminlte::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Configuration
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($configuration, ['route' => ['configurations.update', $configuration->id], 'method' => 'patch']) !!}

                        @include('configurations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection