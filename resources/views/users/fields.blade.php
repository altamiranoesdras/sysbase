<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Rols Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rols', 'Roles:') !!}
    <select name="rols[]" id="rols" class="form-control" multiple="multiple">
        <option value=""> -- Select One -- </option>
        @foreach($rols as $rol)
            <option value="{{$rol->id}}" {{ in_array($rol->id,$rolsUser) ? "selected" : ""}}>{{$rol->descripcion}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-12" style="padding: 0px; margin: 0px">
</div>

@if(!isset($create))
    <div class="form-group col-sm-12">
        <a class="" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Editar también contraseña
        </a>
    </div>
@endif


<div class="{{ !isset($create) ? "collapse" : '' }}" id="collapseExample">
    <!-- Password Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password', 'password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <!-- Password Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password_confirmation', 'Confirmar password:') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>

@push('scripts')
<script>
    $(function () {
        $("#rols").select2();
    })
</script>
@endpush