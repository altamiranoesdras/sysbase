@component('adminlte::layouts.app')

    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')

        @component('components.box')
            @slot('boxTitle')
            Editar Rol
            @endslot

            {!! Form::model($rol, ['route' => ['rols.update', $rol->id], 'method' => 'patch']) !!}
                @include('admin.rols.campos')
            {!! Form::close() !!}
        @endcomponent
    </div>

@endcomponent