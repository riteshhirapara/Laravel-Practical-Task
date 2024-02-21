<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'company_name' => 'Company Name',
            'company_website' => 'Company Website',
            'company_email' => 'Company Email',
            'company_status' => 'Company Status',
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
            'company_name' => 'required',
            'company_website' => 'required',
            'company_email' => 'required|email',
            'company_status' => 'required',
        ];
    }
}
