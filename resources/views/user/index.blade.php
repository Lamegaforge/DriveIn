@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Users</li>
              </ol>
            </nav>
            <div class="card">
                <div class="card-header">Gestion des utilisateurs</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">permissions</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    {{$user->id}}
                                </td>
                                <td>
                                    @if ($user->token()->count()) 
                                        <span class="badge badge-success">actif</span>
                                    @else
                                        <span class="badge badge-secondary">inactif</span>
                                    @endif                                    
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    @if ($user->isAdmin())
                                        <span class="badge badge-warning">admin</span>
                                    @endif 
                                    @if ($user->permissions()->count()) 
                                        @foreach($user->permissions as $permission)
                                            <span class="badge badge-info">{{$permission->name}}</span>
                                        @endforeach
                                    @endif
                                </td>                                
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('user.show', [$user->id]) }}">
                                        Éditer
                                    </a>
                                </td>
                            </tr>                                                        
                        @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
