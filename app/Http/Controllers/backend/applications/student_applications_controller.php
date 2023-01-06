<?php

namespace App\Http\Controllers\backend\applications;

use App\Http\Controllers\Controller;
use App\Models\student_applications;
use Illuminate\Http\Request;

class student_applications_controller extends Controller
{
    public function student_application_view()
    {
        return view('backend.applications.student_applications');
    }

    public function student_application_store(Request $request)
    {


        $data = new student_applications();
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        if ($request->file('result_slip')) {
            $file = $request->file('result_slip');
            $file_name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/result_slip_applications'), $file_name);
            $data['result_slip'] = $file_name;
        }
        $data->save();

        return view('backend.applications.student_application_feedback');
    }

    public function student_application_review()
    {
        $data['all_data'] = student_applications::all();


        return view('backend.applications.student_applications_review', $data);
    }

    public function applicant_details($applicant_id)
    {
        $applicant['applicant'] = student_applications::find($applicant_id);

        return view('backend.applications.applicant_details', $applicant);
    }
}
