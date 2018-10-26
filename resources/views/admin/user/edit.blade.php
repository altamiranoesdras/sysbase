@component('adminlte::layouts.app')

    @include('layouts.plugins.select2')

    <div class="content">
        @include('flash::message')
        @component('components.box')
            @slot('boxTitle')
            Editar {{ isset($editProfile) ? "Perfil":"Usuario"}}
            @endslot

            {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'patch',"class" => 'form-horizontal']) !!}
                @include('admin.user.campos')
            {!! Form::close() !!}
        @endcomponent
    </div>
@endcomponent