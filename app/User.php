<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The database table used by the model
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Add a mutator to ensure hashed passwords
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function setAllAttributes($attributes)
    {
        $this->attributes['id'] = 1;
        $this->attributes['name'] = $attributes['name'];
        $this->attributes['email_verified_at'] = null;
        $this->attributes['remember_token'] = null;
        $this->attributes['created_at'] = "2019-12-30 19:59:28";
        $this->attributes['updated_at'] = "2019-12-30 19:59:28";

        $this->original['id'] = 1;
        $this->original['name'] = $this->attributes['name'];
        $this->original['email'] = $this->attributes['email'];
        $this->original['password'] = $this->attributes['password'];
        $this->original['email_verified_at'] = null;
        $this->original['remember_token'] = null;
        $this->original['created_at'] = "2019-12-30 19:59:28";
        $this->original['updated_at'] = "2019-12-30 19:59:28";
        $this->connection= 'mysql';
        $this->exists = true;
    }
}
