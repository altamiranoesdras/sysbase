@component('adminlte::layouts.app')

    @include('layouts.plugins.select2')

<div class="content">
    @component('components.box')
        @slot('boxTitle')
        Crear nuevo Usuario
        @endslot

        {!! Form::open(['route' => 'register',"class" => "form-horizontal"]) !!}

            @include('admin.user.campos')
        {!! Form::close() !!}
    @endcomponent
</div>
@endcomponent