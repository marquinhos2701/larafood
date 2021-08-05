@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>        
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}" class="active">Planos</a></li>        
    </ol>
    <h1>Planos: <a href="{{ route('plans.create') }}" class="btn btn-dark">Adicionar<i class="fas fa-user-plus"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome do plano a ser pesquisado:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Pesquisar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Preço</td>
                        <td width="50">Ações</td>
                    </tr>
                    <tbody>
                        @foreach ($plans as $plan)
                            <tr>
                                <td>
                                    {{ $plan->name }}
                                </td>
                                <td>
                                    R${{ number_format($plan->price, 2, ',', '.') }}
                                </td>
                                <td style="width: 250px">
                                    <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-primary">Detalhes</a>
                                    <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info">Editar</a>
                                    <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">Ver</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links("pagination::bootstrap-4") !!}
            @else
                {!! $plans->links("pagination::bootstrap-4") !!}
            @endif
            
        </div>
    </div>
@stop