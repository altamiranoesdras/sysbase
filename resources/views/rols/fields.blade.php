
<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-12">
    {!! Form::label('permisos_id','Permisos: ') !!}
    <a class="success" data-toggle="modal" href="#modal-form-permissions" tabindex="1000">nuevo</a>
    {!!
        Form::select(
            'permisos[]',
            slc(\App\Models\Permission::class,'name','name',null)
            , isset($rol) ? $rol->getAllPermissions()->pluck('name','name') : null
            , ['id'=>'permisos','multiple' => 'multiple','class' => 'form-control','style'=>'width: 100%']
        )
    !!}
</div>

@push('scripts')

    <script>
        $(function () {
            $("#permisos").select2();
        })
    </script>
@endpush