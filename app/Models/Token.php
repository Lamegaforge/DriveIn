<?php

namespace App\Models;

use App\Models;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'maked_by', 'owned_by', 'assigned_to', 'value', 'owned_at'];	

    public function scopeFree($query)
    {
        return $query->whereNull('owned_by');
    }

    public function scopeNotFree($query)
    {
        return $query->whereNotNull('owned_by');
    }    

    public function owner()
    {
        return $this->belongsTo(Models\User::class, 'owned_by');
    }

    public function maker()
    {
        return $this->belongsTo(Models\User::class, 'maked_by');
    }
}
