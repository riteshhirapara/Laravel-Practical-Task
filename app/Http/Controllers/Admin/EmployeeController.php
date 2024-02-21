<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\company;
use App\Models\employee;
use App\CPU\ImageManager;
use App\Http\Requests\EmployeeRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class EmployeeController extends Controller
{
    public function employee_list(Request $request)
    {
        $employee = employee::leftjoin('companies', 'companies.company_id', 'employees.company_id')->orderBy('companies.company_id', 'desc')->paginate(5);
        $company = company::where('company_status', 1)->orderBy('company_id', 'desc')->get();

        return view('Admin.employee', compact('employee', 'company'));
    }

    public function insert_employee(EmployeeRequest $request)
    {
        if (employee::where('employee_email', $request->employee_email)->exists()) {
            return back()->with('error', 'Email address already exists.');
        } else {
            $data = new employee();
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->company_id = $request->company_id;
            $data->employee_email = $request->employee_email;
            $data->phone = $request->phone;
            $data->employee_status = $request->status;

            if ($request->file('image')) {
                $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . 'png';
                $originalImage = $request->file('image');
                $originalPath = 'image/' . $imageName;
                Storage::put($originalPath, file_get_contents($originalImage));
                $thumbnailPath = 'public/' . $imageName;
                $img = Image::make($originalImage);
                $img->fit(100, 100);
                Storage::put($thumbnailPath, $img->encode('png'));
            } else {
                $imageName = 'default.jpg';
            }
            $data->image = $imageName;
            // $data->image = ImageManager::upload('modal/', 'png', $request->file('image'));
            $data->save();

            return redirect()->back();
        }
    }

    public function update_employee(EmployeeRequest $request)
    {
        if (employee::where('employee_email', $request->employee_email)->where('employee_id', '!=', $request->employee_id)->exists()) {
            return back()->with('error', 'Email address already exists for another employee.');
        } else {
            $data = employee::find($request->employee_id);
            if ($request->has('image')) {
                if (File::exists(public_path('storage/' . $data['image']))) {
                    File::delete(public_path('storage/' . $data['image']));
                }

                $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . 'png';
                $originalImage = $request->file('image');
                $originalPath = 'image/' . $imageName;
                Storage::put($originalPath, file_get_contents($originalImage));
                $thumbnailPath = 'public/' . $imageName;
                $img = Image::make($originalImage);
                $img->fit(100, 100);
                Storage::put($thumbnailPath, $img->encode('png'));
                $data->image = $imageName;
            }
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->company_id = $request->company_id;
            $data->employee_email = $request->employee_email;
            $data->phone = $request->phone;
            $data->employee_status = $request->status;
            $data->save();

            return redirect()->back();
        }
    }

    public function delete_employee($employee_id)
    {
        $employee = employee::find($employee_id);
        $employee->delete();
        return redirect()->back();
    }
}
