<div class="card col-sm-10 m-auto">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-6">
                <a class='btn btn-primary' href="{{route('admin.roles.create')}}">Add Role</a>
            </div>
            <div class="col-sm-6">
                <input wire:model="search" class="form-control " placeholder="Buscar">
            </div>
        </div>
    </div>

    @if($roles->count())

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.roles.edit',$role)}}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.roles.destroy',$role)}}" method="post">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{$roles->links()}}
    </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro . . .</strong>
        </div>
    @endif
</div>
