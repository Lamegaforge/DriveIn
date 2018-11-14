<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Redirect;
use App\Models;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\TokenService;

class TokenController extends Controller
{
    /**
     * @var \App\Services\TokenService
     */
    protected $tokenService;

    /**
     * @param \App\Services\TokenService $tokenService
     */
    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @return HttpResponse
     */
    public function index(Request $request)
    {
        $tokens = Models\Token::orderBy('created_at', 'DESC')->free()->paginate(10);
        $latestTokensAssigned = Models\Token::orderBy('owned_at', 'DESC')->notFree()->paginate(10);

        return View::make('token.index', [
            'tokens' => $tokens,
            'latestTokensAssigned' => $latestTokensAssigned,
        ]);
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @return HttpResponse
     */
    public function create(Request $request)
    {
        Models\Token::create([
            'value' => $this->tokenService->generate(),
            'assigned_to' => $request->get('assigned_to'),
            'maked_by' => Auth::user()->id,
        ]);

        return Redirect::route('token.index');
    }    

    /**
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return HttpResponse
     */
    public function revoke(Request $request, int $id)
    {
        Models\Token::free()
            ->where('id', $id)
            ->delete();

        return Redirect::route('token.index');
    }     
}
