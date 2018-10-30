<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Build extends Model
{
    protected $guarded = ['user_id', 'hero_id'];
    protected $with = ['talents'];
    protected $appends = ['is_favorite'];

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
        return $this->belongsToMany(Talent::class)->orderBy('level');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function maps()
    {
        return $this->belongsToMany(Map::class);
    }

    public function getIsFavoriteAttribute()
    {
        return (Auth::check() && in_array($this->id, Auth::user()->favorites->pluck('id')->toArray()));
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function($query, $search){
            return $query->where('builds.title', 'LIKE', "%{$search}%")
                ->orWhere('heroes.name', 'LIKE', "%{$search}%")
                ->orWhere('users.name', 'LIKE', "%{$search}%");
        });
    }

    public function scopeFilterRole($query, $roles)
    {
        return $query->when($roles, function($query, $roles){
            $roles = array_map('ucwords', $roles);
            return $query->whereIn('heroes.role', $roles);
        });
    }

    public function scopeFilterHero($query, $hero)
    {
        return $query->when($hero, function($query, $hero){
            return $query->where('builds.hero_id', $hero);
        });
    }

    public function scopePopular($query)
    {
        return $query;
    }
}
