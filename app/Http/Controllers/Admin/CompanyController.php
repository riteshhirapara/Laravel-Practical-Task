<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\company;
use App\CPU\ImageManager;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    public function company_list(Request $request)
    {
            $company = company::orderBy('company_id', 'desc')->paginate(config('default_pagination'));

        return view('Admin.company', compact('company'));
    }

    public function insert_company(CompanyRequest $request)
    {
            $data = new company();
            $data->company_name = $request->company_name;
            $data->company_email = $request->company_email;
            $data->company_website = $request->company_website;
            $data->save();

            return redirect()->back();
    }

    public function update_company(CompanyRequest $request)
    {
            $data = company::find($request->company_id);
            $data->company_name = $request->company_name;
            $data->company_email = $request->company_email;
            $data->company_website = $request->company_website;
            $data->company_status = $request->company_status;
            $data->save();

            return redirect()->back();
    }

}
