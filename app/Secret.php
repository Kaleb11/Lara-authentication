<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secret extends Model
{
    protected $guard = [];
    public function user()
    {
        return $this->belongsTo(related:'App\User');
    }
}
