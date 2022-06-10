@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')
    <h1>Edit Role</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.roles.update',$role) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="form-control" type="text" name="name" value="{{$role->name}}" required autofocus autocomplete="name" />
                    @error('name')
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