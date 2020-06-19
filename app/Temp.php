<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Temp extends Model
{
    //
    protected $fillable = ['token', 'email'];

    /**
     * Create (func)
     * @param $request, Email, random String
     * @return Temp
     */
    public static function _create($request) {
        return Temp::create([
            'token' => Str::random(60),
            'email' => $request['email']
        ]);
    }
}
