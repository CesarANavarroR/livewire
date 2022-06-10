<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-6">
                <a class='btn btn-primary' href="{{route('admin.profiles.create')}}">Add Profile</a>
            </div>
            <div class="col-sm-6">
                <input wire:model="search" class="form-control " placeholder="Buscar">
            </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td width="20px">{{$user->id}}</td>
                        <td width="150px">{{$user->name}}</td>
                        <td width="300px">{{$user->email}}</td>
                        @if($user->roles->count()>0)
                            <td>{{$user->roles[0]->name}}</td>
                        @else
                        <td></td>
                        @endif
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.profiles.edit',$user)}}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.profiles.destroy',$user)}}" method="post">
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
        {{$users->links()}}
    </div>
</div>
