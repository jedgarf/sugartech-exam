<?php

namespace App\Http\Controllers;

// Models
use App\Models\Employees;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Add/Edit employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|string',
            'birthdate' => 'required|date',
            'monthly_salary' => 'required|numeric'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->with('message', 'Please complete all required fields.')->withErrors($validator)->withInput();
        } else {

            $user = Employees::create(['first_name' => $request->post('first_name'),
                                       'last_name' => $request->post('last_name'),
                                       'gender' => $request->post('gender'),
                                       'birthdate' => $request->post('birthdate'),
                                       'monthly_salary' => $request->post('monthly_salary')]);

            $message = 'Unable to add.';
            if ($user) {
                $message = 'Employee created successfully.';
            }

            return redirect()->back()->with('message', $message);
        }

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // prevent id parameter from xss attack
        $id = $request->route('id');

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|string',
            'birthdate' => 'required|date',
            'monthly_salary' => 'required|numeric'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->with('message', 'Please complete all required fields.')->withErrors($validator)->withInput();
        } else {

            $user = Employees::where('id', $id)->update(['first_name' => $request->post('first_name'),
                                                         'last_name' => $request->post('last_name'),
                                                         'gender' => $request->post('gender'),
                                                         'birthdate' => $request->post('birthdate'),
                                                         'monthly_salary' => $request->post('monthly_salary')]);

            $message = 'Unable to update.';
            if ($user) {
                $message = 'Employee updated successfully.';
            }

            return redirect()->back()->with('message', $message);
        }
    }
    /**
     * Delete employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // prevent id parameter from xss attack
        $id = $request->route('id');

        $user = Employees::where('id', $id)->delete();

        $message = 'Unable to delete.';
        if ($user) {
            $message = 'Employee deleted successfully.';
        }

        return redirect()->back()->with('message', $message);
        
    }
}
