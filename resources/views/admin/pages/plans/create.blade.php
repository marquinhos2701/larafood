@extends('adminlte::page')

@section('title', 'Cadastrar novo Plano')

@section('content_header')
    <h1>Cadastrar Planos:</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('plans.store') }}" class="form" method="POST">
            @csrf

            @include('admin.pages.plans._partials.form')
            
        </form>
    </div>
@endsection