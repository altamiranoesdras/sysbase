<table class="table table-striped table-bordered table-hover table-sm id="configurations-table">
    <thead>
        <tr>
            <th>Key</th>
        <th>Value</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($configurations as $configuration)
        <tr>
            <td>{!! $configuration->key !!}</td>
            <td>{!! $configuration->value !!}</td>
            <td>
                {!! Form::open(['route' => ['configurations.destroy', $configuration->id], 'method' => 'delete']) !!}
                    <a href="{!! route('configurations.show', [$configuration->id]) !!}" class='btn btn-default btn-sm'>
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a href="{!! route('configurations.edit', [$configuration->id]) !!}" class='btn btn-info btn-sm'>
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>

                    {!! Form::button('<i class="fa fa-remove" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>