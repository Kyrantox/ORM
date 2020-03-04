<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'birth_date' => 'date_format:d/m/Y',
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'gender' => 'string|max:1|in:M,F',
            'hire_date' => 'date_format:d/m/Y|after:birth_date'

        ];

        if($this->isMethod('POST')){
            foreach($rules as $rule){
                $rules[$rule] .= '|required';
            }
            $rules["emp_no"] = 'integer|required|unique:employees,emp_no';
        }

        return $rules;
    }
}
