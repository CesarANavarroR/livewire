<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <input wire:model="search" class="form-control " placeholder="Buscar">
            </div>
        </div>
    </div>

    @if($tables->count())

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Qr</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tables as $table)
                    <tr class="centrar">
                        <td>{{$table->id}}</td>
                        <td>{{$table->name}}</td>
                        <td><img class="qr" src="{{Storage::url($table->image)}}" alt=""></td>
                        <td><a href="{{route('admin.qrs.show',$table)}}" target="_blank">Download</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="card-footer">
        {{$tables->links()}}
    </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro . . .</strong>
        </div>
    @endif
</div>
