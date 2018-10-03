<?php

namespace App\Http\Requests;

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
        return [
            'title' => 'required',
            'hero_id' => 'required|integer|exists:heroes,id',
            'talent_1' => 'required|integer|exists:talents,id',
            'talent_2' => 'required|integer|exists:talents,id',
            'talent_3' => 'required|integer|exists:talents,id',
            'talent_4' => 'required|integer|exists:talents,id',
            'talent_5' => 'required|integer|exists:talents,id',
            'talent_6' => 'required|integer|exists:talents,id',
            'talent_7' => 'required|integer|exists:talents,id'
        ];
    }
}
