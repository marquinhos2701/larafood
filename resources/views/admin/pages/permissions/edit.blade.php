@extends('adminlte::page')

@section('title', "Editar nova Permissão {$permission->name}")

@section('content_header')
    <h1>Editar nova Permissão {{$permission->name}}</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="POST">
            @method('PUT')

            @include('admin.pages.permissions._partials.form')

        </form>
    </div>
@endsection