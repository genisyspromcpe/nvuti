<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'user_id', 'betType', 'win_number', 'bet', 'win', 'game', 'betPercent'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
