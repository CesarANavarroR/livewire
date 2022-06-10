@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.categorys.update',$category) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="form-control" type="text" name="name" value="{{$category->name}}" required autofocus autocomplete="name" />
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group d-flex justify-content-center align-items-center">
                @if($category->image_url)
                    <img id="picture" src="{{Storage::url($category->image_url)}}">
                @else
                    <img id="picture" src="/public/default.png">
                @endif
            </div>
            <div class="form-group">
                <label for="file">Image file</label>
                <div class="input-group">
                    <input type="file" class="custom-file-input" name='image' accept="image/png,image/jpeg" id="file">
                    <label class="custom-file-label" for="file" id="labelImage">{{$category->image_name?$category->image_name:'Chose a Image'}}</label>
                </div>
                @error('image')
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
