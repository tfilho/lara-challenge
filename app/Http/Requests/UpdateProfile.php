<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UpdateProfile extends FormRequest
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
        $rules = [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'birthday' => 'required',
            'gender_id' => 'required|exists:genders,id'
        ];
        return $this->getOnlyFilledFields($rules);
    }
    /**
     * @param $rules
     * @return array
     */
    private function getOnlyFilledFields($rules){
        return Arr::only($rules, array_keys($this->all()));
    }
}
