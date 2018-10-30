<div class="form-group">
    <label for="padre" class="col-sm-2 control-label">Opción superior</label>
    <div class="col-sm-6">
        {{$padre->nombre ?? "Ninguna"}}

        <input type="hidden" name="padre" value="{{$padre->id ?? ''}}">
    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('ruta', 'Ruta:') !!}
    {!! Form::text('ruta', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="icono_l" class="col-sm-2 control-label">Icono izquierdo</label>
    <div class="col-sm-10">
        {!! Form::text('icono_l', null, ['class' => 'form-control input-icon']) !!}
        @foreach($iconos as $icono)
            <label class="radio-inline">
                @isset($opcion)
                    <input type="radio" name="x" id="inputID" value="{{$icono}}" class="radio-iconos" {{$icono==$opcion->icono_l ? "checked" : ''}}>
                    @else
                        <input type="radio" name="x" id="inputID" value="{{$icono}}" class="radio-iconos">
                        @endisset
                        <i class="fa {{$icono}}"></i>
            </label>
        @endforeach

    </div>
</div>

<div class="form-group">
    <label for="icono_r" class="col-sm-2 control-label">Icono derecho</label>
    <div class="col-sm-10">
        {!! Form::text('icono_r', null, ['class' => 'form-control input-icon']) !!}
        <label class="radio-inline">
            <input type="radio" name="y" id="inputID" value="" checked>
            ninguno
        </label>
        @foreach($iconos as $icono)
            <label class="radio-inline">
                @isset($opcion)
                    <input type="radio" name="y" id="inputID" value="{{$icono}}" class="radio-iconos" {{$icono==$opcion->icono_r ? "checked" : ''}}>
                    @else
                        <input type="radio" name="y" id="inputID" value="{{$icono}}" class="radio-iconos" >
                        @endisset
                        <i class="fa {{$icono}}"></i>
            </label>
        @endforeach
    </div>
</div>
@push('scripts')
<script>
    $(function () {
        $(".radio-iconos").click(function (e) {
//            e.preventDefault();
            var opcion = $(this).val();
            var input = $(this).parent().parent().find('.input-icon');
            console.log('Cambio icono',opcion,input);

            input.val(opcion)
        });
    })
</script>
@endpush