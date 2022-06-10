<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-6">
                <a class='btn btn-primary' href="{{route('admin.products.create')}}">Add Product</a>
            </div>
            <div class="col-sm-6">
                <input wire:model="search" class="form-control " placeholder="Buscar">
            </div>
        </div>
    </div>

    @if($products->count())

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->type->name}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.products.edit',$product)}}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.products.destroy',$product)}}" method="post">
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
        {{$products->links()}}
    </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro . . .</strong>
        </div>
    @endif
</div>
