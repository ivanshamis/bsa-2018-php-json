<?php

namespace App\Entity;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    public $timestamps = false;

    protected $fillable = [
        'name', 'email',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function wallet() {
        return $this->hasOne('App\Entity\Wallet');
    }
}
