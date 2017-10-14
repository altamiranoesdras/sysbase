
<div class="form-group">
    <!-- Id Field -->
    {!! Form::label('id', 'Id:') !!}
    {!! $user->id !!}<br>

    <!-- Username Field -->
    {!! Form::label('username', 'Username:') !!}
    {!! $user->username !!}<br>

    <!-- Name Field -->
    {!! Form::label('name', 'Name:') !!}
    {!! $user->name !!}<br>

    <!-- Email Field -->
    {!! Form::label('email', 'Email:') !!}
    {!! $user->email !!}<br>

    <!-- Created At Field -->
    {!! Form::label('created_at', 'Created At:') !!}
    {!! $user->created_at !!}<br>

    <!-- Updated At Field -->
    {!! Form::label('updated_at', 'Updated At:') !!}
    {!! $user->updated_at !!}<br>

    {{--<!-- Deleted At Field -->--}}
    {{--{!! Form::label('deleted_at', 'Deleted At:') !!}--}}
    {{--{!! $user->deleted_at !!}<br>--}}
</div>

