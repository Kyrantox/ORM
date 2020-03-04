<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TitleRequest extends FormRequest
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
            'title' => 'string|max:255',
            'from_date' => 'date|before:to_date',
            'to_date' => 'date|'


        ];

        if($this->isMethod('POST')){
            foreach($rules as $rule =>$val){
                $rules[$rule] = $val .'|required';
            }
            $rules["emp_no"] = 'integer|required';
        }

        return $rules;
    }
}
