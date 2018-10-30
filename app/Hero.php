<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $guarded = [];

    function abilities()
    {
        return $this->hasMany(Ability::class);
    }

    function talents()
    {
        return $this->hasMany(Talent::class);
    }

    public function builds()
    {
        return $this->hasMany(Build::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function($query, $search){
            return $query->where('name', 'LIKE', "%{$search}%");
        });
    }

    public function scopeFilterRole($query, $roles)
    {
        return $query->when($roles, function($query, $roles){
            $roles = array_map('ucwords', $roles);
            return $query->whereIn('role', $roles);
        });
    }

    public function scopeFilter($query, $request)
    {
        $roles = array_keys($request->only('assassin', 'specialist', 'warrior', 'support'));

        return $query->search($request->get('search'))->filterRole($roles);
    }

    static function selectArray()
    {
        $heroArray = Hero::orderBy('name')->get()->pluck('name', 'id');
        $heroArray->prepend('Any', 0);

        return $heroArray;
    }
}
