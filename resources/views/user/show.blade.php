@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('user.index')}}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$user->name}}</li>
              </ol>
            </nav>
            @if ($user->actif())
            <div class="alert alert-success" role="alert">
                Ce compte est actif
            </div>
            @else
            <div class="alert alert-warning" role="alert">
                Ce compte n'est pas actif
            </div>
            @endif
            <div class="card">
                <div class="card-header">Informations générales</div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    identifiant
                                </td>
                                <td>
                                    {{$user->id}}
                                </td>
                            </tr>      
                            <tr>
                                <td>
                                    name
                                </td>
                                <td>
                                    {{$user->name}}
                                </td>
                            </tr>           
                            <tr>
                                <td>
                                    email
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                            </tr>     
                            <tr>
                                <td>
                                    created_at
                                </td>
                                <td>
                                    {{$user->created_at}}
                                </td>
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($user->token()->count()) 
            <br>
            <div class="card">
                <div class="card-header">Token</div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    id
                                </td>
                                <td>
                                    {{$user->token->id}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    maked_by
                                </td>
                                <td>
                                    @if ($user->token->maker)
                                        <a href="{{route('user.show', $user->token->maker)}}">
                                            {{$user->token->maker->name}}
                                        </a>
                                    @else
                                        God
                                    @endif
                                </td>
                            </tr>
                            <tr>                                
                                <td>
                                    assigned_to
                                </td>
                                <td>
                                    {{$user->token->assigned_to}}
                                </td>
                            </tr>
                            <tr>                                
                                <td>
                                    value
                                </td>
                                <td>
                                    {{$user->token->value}}
                                </td>
                            </tr>
                            <tr>                                
                                <td>
                                    owned_at
                                </td>
                                <td>
                                    {{$user->token->owned_at}}
                                </td>
                            </tr>
                            <tr>                                
                                <td>
                                    created_at
                                </td>
                                <td>
                                    {{$user->token->created_at}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>    
            @endif
            <br>
            <div class="card">
                <div class="card-header">Permissions</div>
                <div class="card-body">
                    @if ($user->permissions->count())
                        @foreach($user->permissions as $permission)
                            <span class="badge badge-info">{{$permission->name}}</span>
                        @endforeach
                    @else
                        Ce compte ne possede pas de permission
                    @endif
                </div>
                <div class='card-footer'>
                    @if(Gate::denies('manage-own-user', [$user]))
                        Tu n'as pas le droit de modifer les permissions de ton propre compte mon galopin
                    @else
                        <form class="form-inline" action="{{ route('user.update_permissions', [$user]) }}" method="POST">
                        @csrf
                        @foreach($availablePermissionList as $availablePermission)
                        <div class="form-check form-check-inline">
                            <input 
                                <?php echo $user->permissions->where('id', $availablePermission->id)->count() ? 'checked' : '' ?>
                                name='permissions[]' 
                                class="form-check-input" 
                                type="checkbox" 
                                id="{{$availablePermission->name}}" 
                                value="{{$availablePermission->id}}"
                            >
                            <label class="form-check-label" for="{{$availablePermission->name}}">{{$availablePermission->name}}</label>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary mb-2">Modifier</button>
                    </form>
                    @endif
                </div>
            </div>   
        </div>
    </div>
</div>
@endsection
