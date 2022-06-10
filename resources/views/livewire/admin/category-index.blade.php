<div class="card col-sm-10 m-auto">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-6">
                <a class='btn btn-primary' href="{{route('admin.categorys.create')}}">Agregar Categoria</a>
            </div>
            <div class="col-sm-6">
                <input wire:model="search" class="form-control " placeholder="Buscar">
            </div>
        </div>
    </div>

    @if($categorys->count())

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
                @foreach ($categorys as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.categorys.edit',$category)}}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.categorys.destroy',$category)}}" method="post">
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
        {{$categorys->links()}}
    </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro . . .</strong>
        </div>
    @endif
</div>
