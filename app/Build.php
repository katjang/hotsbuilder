<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    function user()
    {
        $this->belongsTo(User::class);
    }
}
