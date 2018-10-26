@component('adminlte::layouts.app')

<div class="content">
    @include('adminlte-templates::common.errors')
    @component('components.box')
        @slot('boxTitle')
            Crear nuevo rol
        @endslot

        {!! Form::open(['route' => 'rols.store']) !!}

            @include('admin.rols.campos')
        {!! Form::close() !!}
    @endcomponent
</div>

@endcomponent