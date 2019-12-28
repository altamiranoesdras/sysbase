
<a href="{{ route('users.show', $id) }}" class='btn btn-default btn-xs' data-toggle="tooltip" title="Ver">
    <i class="fa fa-eye"></i>
</a>

<a href="{{ route('users.edit', $id) }}" class='btn btn-info btn-xs' data-toggle="tooltip" title="Editar">
    <i class="fa fa-edit"></i>
</a>

<a href="{{ route('user.menu',$id) }}" class="btn btn-sm btn-default">
    <span class="fa fa-list-alt" data-toggle="tooltip" title="Menu"></span>
</a>

<a href="#" onclick="deleteThis(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-danger btn-xs'>
    <i class="fa fa-trash-alt"></i>
</a>
<form action="{{ route('users.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
    @method('DELETE')
    @csrf
</form>