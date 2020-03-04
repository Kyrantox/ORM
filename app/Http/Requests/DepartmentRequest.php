<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'dept_name' => 'string|max:255'

        ];

        if($this->isMethod('POST')){
            foreach($rules as $rule =>$val){
                $rules[$rule] = $val .'|required';
            }
            $rules["dept_no"] = 'integer|required|unique:departments,dept_no';
        }

        return $rules;
    }
}
