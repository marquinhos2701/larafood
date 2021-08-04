@extends('adminlte::page')

@section('title', "Editar novo Plano {$plan->name}")

@section('content_header')
    <h1>Editar novo Plano {{$plan->name}}</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('plans.update', $plan->url) }}" class="form" method="POST">
            @csrf
            @method('PUT')

            @include('admin.pages.plans._partials.form')

        </form>
    </div>
@endsection