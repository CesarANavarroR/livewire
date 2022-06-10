@extends('adminlte::page')

@section('title','Dashboard')

@section('content_header')

@stop

@section('content')
    @livewire('admin.q-r-index')
@stop

@section('css')
    <link rel="stylesheet" href="/../css/admin.css">
@stop
