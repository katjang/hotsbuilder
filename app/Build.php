<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function ratings()
    {
        return $this->belongsToMany(User::class, 'ratings')->withPivot('rating');
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
        return $query->when($search, function ($query, $search) {
            return $query->where('builds.title', 'LIKE', "%{$search}%")
                ->orWhere('heroes.name', 'LIKE', "%{$search}%")
                ->orWhere('users.name', 'LIKE', "%{$search}%");
        });
    }

    public function scopeFilterRole($query, $roles)
    {
        return $query->when($roles, function ($query, $roles) {
            $roles = array_map('ucwords', $roles);
            return $query->whereIn('heroes.role', $roles);
        });
    }

    public function scopeFilterHero($query, $hero)
    {
        return $query->when($hero, function ($query, $hero) {
            return $query->where('builds.hero_id', $hero);
        });
    }

    public function scopeFilterMap($query, $map)
    {
        return $query->when($map, function ($query, $map) {
            return $query->join('build_map', 'build_map.build_id', '=', 'builds.id')
                ->where('build_map.map_id', $map);
        });
    }

    public function scopeFilter($query, $request)
    {
        $roles = array_keys($request->only('assassin', 'specialist', 'warrior', 'support'));

        return $query->when($roles || $request->get('search'), function ($query) {
            return $query
                ->join('heroes', 'heroes.id', '=', 'builds.hero_id')
                ->join('users', 'users.id', '=', 'builds.user_id');
        })->search($request->get('search'))
            ->filterRole($roles)
            ->filterHero($request->get('hero'))
            ->filterMap($request->get('map'))
            ->select('builds.*');
    }

    public function scopeWithRating($query)
    {
        return $query->leftJoin('ratings', 'ratings.build_id', '=', 'builds.id')
            ->groupBy('builds.id')
            ->select(DB::raw('AVG(ratings.rating) AS avg_rating'),
                DB::raw('COUNT(ratings.user_id) AS rating_count'), 'builds.*');
    }

    public function scopePopular($query)
    {
        return $query;
    }
}
