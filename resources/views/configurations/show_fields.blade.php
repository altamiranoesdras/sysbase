<!-- Id Field -->
{!! Form::label('id', 'Id:') !!}
{!! $configuration->id !!}<br>


<!-- Key Field -->
{!! Form::label('key', 'Key:') !!}
{!! $configuration->key !!}<br>


<!-- Value Field -->
{!! Form::label('value', 'Value:') !!}
{!! $configuration->value !!}<br>


<!-- Descripcion Field -->
{!! Form::label('descripcion', 'Descripcion:') !!}
{!! $configuration->descripcion !!}<br>


<!-- Created At Field -->
{!! Form::label('created_at', 'Created At:') !!}
{!! $configuration->created_at !!}<br>


<!-- Updated At Field -->
{!! Form::label('updated_at', 'Updated At:') !!}
{!! $configuration->updated_at !!}<br>

@if($configuration->deleted_at)
<!-- Deleted At Field -->
{!! Form::label('deleted_at', 'Deleted At:') !!}
{!! $configuration->deleted_at !!}<br>
@endif

