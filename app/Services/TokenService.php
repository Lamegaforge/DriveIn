<?php

namespace App\Services;

use Illuminate\Support\Str;

class TokenService
{
	/**
	 * @return string
	 */
    public function generate() :string
    {
        return Str::random(20);
    }   
}
