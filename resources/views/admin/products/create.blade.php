@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')
    <h1>Create Product</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <x-jet-label for="name" value="Name" />
                            <x-jet-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                        </div>
                        <div class="form-group d-flex justify-content-center align-items-center">
                            <img id="picture" src="/../default.png">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <x-jet-label for="price" value="Price" />
                            <x-jet-input id="price" class="form-control" type="price" name="price" :value="old('price')" required />
                        </div>
                        <div class="form-group">
                            <label for="file">Image file</label>
                            <div class="input-group">
                                <input type="file" class="custom-file-input" name='image' accept="image/png,image/jpeg" id="file" required>
                                <label class="custom-file-label" for="file" id="labelImage">Choose image</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <x-jet-label for="description" value="Description"/>
                    <textarea id="description1" class="form-control" type="description" name="description" required ></textarea>
                </div>
                
                <div class="form-group">
                    <label for="categoryInput">Category</label>
                    <select name="saucer_type_id" class="form-control" id="categoryInput" required>
                        <option disabled selected value="">Selecciona una opcion</option>
                        @foreach ($categorys as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <x-jet-button class="btn btn-success">
                        {{ __('Create') }}
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
    
@stop