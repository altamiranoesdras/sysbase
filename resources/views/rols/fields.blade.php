
<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('guard_name', 'web') !!}
</div>


<div class="form-group col-sm-12">
    {!! Form::label('permisos_id','Permisos: ') !!}
    <a class="success" data-toggle="modal" href="#modal-form-permissions" tabindex="1000">nuevo</a>
    <div class="row">
        <div class="col-5">
            <select name="permission_from[]" id="multiselect" class="form-control multiselect-two-sides" size="8" multiple="multiple">
                @foreach(App\Models\Permission::all() as $permission)
                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-2">
            <button type="button" id="multiselect_rightAll" class="btn btn-block btn-outline-default btn-multiselect"><i class="fa fa-forward"></i></button>
            <button type="button" id="multiselect_rightSelected" class="btn btn-block btn-outline-default btn-multiselect"><i class="fa fa-chevron-right"></i></button>
            <button type="button" id="multiselect_leftSelected" class="btn btn-block btn-outline-default btn-multiselect"><i class="fa fa-chevron-left"></i></button>
            <button type="button" id="multiselect_leftAll" class="btn btn-block btn-outline-default btn-multiselect"><i class="fa fa-backward"></i></button>
        </div>
        <div class="col-5">
            <select name="permission_to[]" id="multiselect_to" class="form-control" size="8" multiple="multiple">
                @isset($rol)
                @foreach($rol->permissions as $permission)
                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                @endforeach
                @endisset
            </select>
        </div>
    </div>
</div>