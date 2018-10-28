<?php

namespace App\Http\Controllers;

use View;
use App\Models;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request $request
     * @return \HttpResponse
     */
    public function index(Request $request)
    {
        $users = Models\User::orderBy('created_at', 'DESC')->paginate(15);

        return View::make('user.index', ['users' => $users]);
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \HttpResponse
     */
    public function show(Request $request, int $id)
    {
        $user = Models\User::findOrFail($id);

        $availablePermissionList = Models\Permission::all();

        return View::make('user.show', ['user' => $user, 'availablePermissionList' => $availablePermissionList]);
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \HttpResponse
     */
    public function updatePermissions(Request $request, int $id)
    {
        $user = Models\User::findOrFail($id);

        $user->permissions()->sync($request->get('permissions'));

        return $this->show($request, $id);        
    }
}
