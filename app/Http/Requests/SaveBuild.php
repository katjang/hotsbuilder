<?php

namespace App\Http\Requests;

use App\Hero;
use Illuminate\Foundation\Http\FormRequest;

class SaveBuild extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $hero = $this->route('build')!= null? $this->route('build')->hero : Hero::findOrFail($this->request->get('hero_id'));
        $talents = $hero->talents()->orderBy('id')->get()->groupBy('level')->values();

        return [
            'title' => 'required',
            'maps' => 'sometimes|array',
            'maps.*' => 'integer|exists:maps,id',
            'hero_id' => 'required|integer|exists:heroes,id',
            'talent_1' => 'required|integer|exists:talents,id|in:'.$talents[0]->pluck('id')->implode(','),
            'talent_2' => 'required|integer|exists:talents,id|in:'.$talents[1]->pluck('id')->implode(','),
            'talent_3' => 'required|integer|exists:talents,id|in:'.$talents[2]->pluck('id')->implode(','),
            'talent_4' => 'required|integer|exists:talents,id|in:'.$talents[3]->pluck('id')->implode(','),
            'talent_5' => 'required|integer|exists:talents,id|in:'.$talents[4]->pluck('id')->implode(','),
            'talent_6' => 'required|integer|exists:talents,id|in:'.$talents[5]->pluck('id')->implode(','),
            'talent_7' => 'required|integer|exists:talents,id|in:'.$talents[6]->pluck('id')->implode(',')
        ];
    }
}
