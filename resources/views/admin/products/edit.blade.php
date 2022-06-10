@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')
    <h1>Edit Product</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.update',$product)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <x-jet-label for="name" value="Name" />
                            <x-jet-input id="name" class="form-control" type="text" name="name" value="{{$product->name}}" required autofocus />
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group d-flex justify-content-center align-items-center">
                            @if($product->image_url)
                                <img id="picture" src="{{Storage::url($product->image_url)}}">
                            @else
                                <img id="picture" src="/../default.png">
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <x-jet-label for="price" value="Price" />
                            <x-jet-input id="price" class="form-control" type="price" name="price" value="{{$product->price}}" required />
                            @error('price')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file">Image file</label>
                            <div class="input-group">
                                <input type="file" class="custom-file-input" name='image' accept="image/png,image/jpeg" id="file">
                                <label class="custom-file-label" for="file" id="labelImage">{{$product->image_name?$product->image_name:'Chose a Image'}}</label>
                            </div>
                            @error('image')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <x-jet-label for="description" value="Description"/>
                    <textarea id="description1" class="form-control" type="description" name="description" required >{{$product->description}}</textarea>
                    @error('description')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="categoryInput">Category</label>
                    <select name="saucer_type_id" class="form-control" id="categoryInput" required>
                        <option disabled selected value="">Selecciona una opcion</option>
                        @foreach ($categorys as $category)
                            @if($product->type->name==$category->name)
                                <option selected value="{{$category->id}}">{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('saucer_type_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <x-jet-button class="btn btn-success">
                        {{ __('Update') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById("file").addEventListener('change',cambiarImagen);
        function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute("src",event.target.result);
                var label = document.getElementById('labelImage');
                label.textContent = document.getElementById("file").files[0].name;
            };
            reader.readAsDataURL(file);
        }
    </script>
@stop

@section('css')
    {{-- <link rel="shortcut icon" type="image/ico" href="/../favicon.ico"/> --}}
    <link rel="stylesheet" href="/css/admin.css">
@stop

@section('name')
    {{-- <script>console.log('Hi!');</script> --}}
@stop