<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    <input type="hidden" name="guard_name" value="web">
</div>

{{--<!-- Guard Name Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--{!! Form::label('guard_name', 'Guard Name:') !!}--}}
{{--{!! Form::text('guard_name', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}