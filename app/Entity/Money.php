<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Money extends Model
{
    use SoftDeletes;

    protected $table = 'money';

    protected $dates = ['deleted'];

    public $timestamps = false;    

    protected $fillable = [
        'currency_id', 'wallet_id', 'amount',
    ];

    public function currency() {
        return $this->belongsTo('App\Entity\Currency');
    }

    public function wallet() {
        return $this->belongsTo('App\Entity\Wallets');
    }
}
