@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>        
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" class="active">Perfis</a></li>        
    </ol>
    <h1>Permissões do Perfil <strong> {{$profile->name}} </strong>
        <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-dark">ADD NOVA PERMISSÃO <i class="fas fa-user-plus"></i></a>
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
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>
                                    {{ $permission->name }}
                                </td>
                                <td style="width: 250px">
                                   {{-- <a href="{{ route('details.profile.index', $profile->url) }}" class="btn btn-primary">Detalhes</a> --}}
                                    <a href="{{ route('profiles.permission.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger"><i class="fas fa-trash-restore-alt"></i>Remover</a>
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