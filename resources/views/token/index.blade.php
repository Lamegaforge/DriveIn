@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Tokens</li>
              </ol>
            </nav>            
            <div class="card">
                <div class="card-header">Liste des tokens disponibles</div>
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
                                <th scope="col">token</th>
                                <th scope="col">maked_by</th>
                                <th scope="col">assigned to</th>
                                <th scope="col">owned_by</th>
                                <th scope="col">owned_at</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tokens as $token)
                            <tr>
                                <td>
                                    @if ($token->owner)
                                        <span class="badge badge-secondary">used</span>
                                    @else 
                                        <span class="badge badge-success">free</span>
                                    @endif
                                </td>                                
                                <td>{{$token->value}}</td>
                                <td>
                                    @if ($token->maker)
                                        {{$token->maker->name}}
                                    @else
                                        God
                                    @endif
                                </td>
                                <td>
                                    @if ($token->assigned_to)
                                        {{$token->assigned_to}}
                                    @endif
                                </td>                                
                                <td>
                                    @if ($token->owner)
                                        {{$token->owner->name}}
                                    @endif                                    
                                </td>
                                <td>{{$token->owned_at}}</td>
                                <td>
                                    @if (! $token->owner)
                                        <a class="btn btn-warning btn-sm" href="{{ route('token.revoke', [$token->id]) }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('revoke').submit();">
                                            Révoquer
                                        </a>
                                        <form id="revoke" action="{{ route('token.revoke', [$token->id]) }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>                                      
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $tokens->links() }}
                </div>
                <div class='card-footer'>
                <form class="form-inline" action="{{ route('token.create') }}" method="POST">
                 @csrf
                  <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Assigné à </div>
                    </div>
                    <input name='assigned_to' type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="optional">
                  </div>
                  <button type="submit" class="btn btn-primary mb-2">Créer token</button>
                </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">10 derniers tokens associés</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">token</th>
                                <th scope="col">maked_by</th>
                                <th scope="col">assigned to</th>
                                <th scope="col">owned_by</th>
                                <th scope="col">owned_at</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($latestTokensAssigned as $token)
                            <tr>
                                <td>
                                    @if ($token->owner)
                                        <span class="badge badge-secondary">used</span>
                                    @else 
                                        <span class="badge badge-success">free</span>
                                    @endif
                                </td>                                
                                <td>{{$token->value}}</td>
                                <td>
                                    @if ($token->maker)
                                        {{$token->maker->name}}
                                    @else
                                        God
                                    @endif
                                </td>
                                <td>
                                    @if ($token->assigned_to)
                                        {{$token->assigned_to}}
                                    @endif
                                </td>                                
                                <td>
                                    @if ($token->owner)
                                        {{$token->owner->name}}
                                    @endif                                    
                                </td>
                                <td>{{$token->owned_at}}</td>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $tokens->links() }}
                </div>
                <div class='card-footer'>

                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
