<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HookahRequest extends FormRequest
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
            'name' => 'required|unique:smoking_bars|min:5|max:255',
            'tubes_count' => 'required|digits_between:1,10'
        ];
    }
}
