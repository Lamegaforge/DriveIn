<?php

namespace App\Models;

use App\Models\Token;
use App\Models\Permission;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function token()
    {
        return $this->hasOne(Token::class, 'owned_by');
    }    

    public function permissions() 
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($name) 
    {
        return (bool) $this->permissions->where('name', $name)->count();
    }

    public function actif()
    {
        return $this->token()->count();
    }    

    public function isAdmin()
    {
        return (bool) $this->admin;
    }

    public function isNotAdmin()
    {
        return ! $this->isAdmin();
    }
}
