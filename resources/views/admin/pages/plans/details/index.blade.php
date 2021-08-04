@extends('adminlte::page')

@section('title', "Detalhes dos Planos { $plan->name }")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>        
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>        
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>        
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.index', $plan->url) }}" class="active">Detalhes</a></li>        
    </ol>
    <h1>Detalhes do plano: {{ $plan->name }} <a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-dark">Adicionar<i class="fal fa-user-plus"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td width="150">Ações</td>
                    </tr>
                    <tbody>
                        @foreach ($details as $detail)
                            <tr>
                                <td>
                                    {{ $detail->name }}
                                </td>
                                <td style="width: 10px">
                                    <a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="btn btn-info">Editar</a>
                                    <a href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}" class="btn btn-warning">Ver</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links("pagination::bootstrap-4") !!}
            @else
                {!! $details->links("pagination::bootstrap-4") !!}
            @endif
            
        </div>
    </div>
@stop