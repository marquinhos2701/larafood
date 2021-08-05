@extends('adminlte::page')

@section('title', 'Permissão')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>        
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}" class="active">Permissão</a></li>        
    </ol>
    <h1>Permissões: <a href="{{ route('permissions.create') }}" class="btn btn-dark">Adicionar<i class="fas fa-user-plus"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Pesquisar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <td>Nome</td>
                       <td width="50">Ações</td>
                    </tr>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>
                                    {{ $permission->name }}
                                </td>
                                <td style="width: 250px">
                                   {{-- <a href="{{ route('details.permission.index', $permission->url) }}" class="btn btn-primary">Detalhes</a> --}}
                                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info">Editar</a>
                                    <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning">Ver</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links("pagination::bootstrap-4") !!}
            @else
                {!! $permissions->links("pagination::bootstrap-4") !!}
            @endif
            
        </div>
    </div>
@stop