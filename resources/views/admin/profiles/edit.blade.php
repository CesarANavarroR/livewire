@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')
    <h1>Edit Profile</h1>
@stop

@section('content')
    <div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.profiles.update',$profile) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="form-control" type="text" name="name" value="{{$profile->name}}" required autofocus autocomplete="name" />
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                        @error('password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="form-control" type="email" name="email" value="{{$profile->email}}" required />
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                        @error('password_confirmation')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <x-jet-label for="Type" value="{{ __('Type') }}" />
                <select class="form-control" name="type" id="type">
                    <option disabled selected value="">Selecciona una opcion</option>
                    @if($categorys->count()>0)
                        @foreach ($categorys as $category)
                            @if($profile->roles[0]->name==$category->name)
                                <option selected value="{{$category->id}}">{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    @else
                        <option disabled selected>Create a type to continue</option>
                    @endif
                </select>
                @error('type')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <x-jet-button class="btn btn-success">
                    {{ __('Edit') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="shortcut icon" type="image/ico" href="/../favicon.ico"/>
    <link rel="stylesheet" href="/css/admin.css">
@stop

@section('name')
    <script>console.log('Hi!');</script>
@stop