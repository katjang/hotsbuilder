<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    protected $guarded = ['user_id', 'hero_id'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function users()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    function hero()
    {
        return $this->belongsTo(Hero::class);
    }

    function talents()
    {
        return $this->belongsToMany(Talent::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'LIKE', "%{$search}%")
            ->orWhere('build.hero', 'LIKE', "%{$search}%");
    }

    public function scopePopular($query)
    {
        return $query;
    }
}
