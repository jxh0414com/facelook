<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;


    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'identifier', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  object $request
     * @return User
     */
    public static function _create($request) {
        return User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'identifier' => $request['first_name'] . '.' . $request['last_name'] . '.' . rand(1, 10),
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);
    }

    /**
     * Update a new user instance after a valid registration.
     *
     * @param  object $request
     * @param  object $user
     */
    public static function _update($user, $request) {
        $user->update([
            'password' => bcrypt($request['password'])
        ]);
    }
}
