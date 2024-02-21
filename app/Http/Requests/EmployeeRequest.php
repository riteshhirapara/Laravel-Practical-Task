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

    public function attributes()
    {
        return [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'company_id' => 'Company',
            'employee_email' => 'Email',
            'phone' => 'Phone',
            'image' => 'Image'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'employee_email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'status' => 'required',
            'image' => 'image',
        ];
    }
}
