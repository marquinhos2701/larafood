@extends('adminlte::page')

@section('title', " Perfis da Permissão {$permission->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>        
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}" class="active">Permissão</a></li>        
    </ol>
    <h1>Perfis da Permissão <strong> {{$permission->name}} </strong>
        <a href="{{ route('permissions.profiles.available', $permission->id) }}" class="btn btn-dark">ADD NOVO PERFIL <i class="fas fa-user-plus"></i></a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <td>Nome</td>
                       <td width="50">Ações</td>
                    </tr>
                    <tbody>
                        @foreach ($profiles as $profile)
                            <tr>
                                <td>
                                    {{ $profile->name }}
                                </td>
                                <td style="width: 250px">
                                   {{-- <a href="{{ route('details.profile.index', $profile->url) }}" class="btn btn-primary">Detalhes</a> --}}
                                    <a href="{{ route('permission.profiles.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger"><i class="fas fa-trash-restore-alt"></i>Remover</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links("pagination::bootstrap-4") !!}
            @else
                {!! $profiles->links("pagination::bootstrap-4") !!}
            @endif
            
        </div>
    </div>
@stop