@extends('adminlte::page')

@section('title', "Editar novo Perfil {$profile->name}")

@section('content_header')
    <h1>Editar novo Perfil {{$profile->name}}</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('profiles.update', $profile->id) }}" class="form" method="POST">
            @method('PUT')

            @include('admin.pages.profiles._partials.form')

        </form>
    </div>
@endsection