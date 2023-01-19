<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class APIController extends Controller
{

    //employee api
    public function showAllEmployees()
    {
        $employeeData = Employee::all();

        if (!$employeeData) {
            return response([
                'message' => 'No Employees Listed'
            ], 404);
        } else {
            return response([
                'message' => 'Found',
                'requestInfo' => $employeeData
            ], 200);
        }
    }

    public function showOneEmployee($id)
    {
        $employeeData = Employee::where('employees.id', $id)->get()->first();

        if (!$employeeData) {
            return response([
                'message' => 'Not Found'
            ], 404);
        } else {
            return response([
                'message' => 'Found',
                'requestInfo' => $employeeData
            ], 200);
        }
    }

    public function createEmployee(Request $request)
    {
        $rules = [
            'gender_id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'birthdate' => 'required',
        ];

        $messages = [
            'gender_id.required' => 'Please supply gender.',
            'fname.required' => 'The First Name should not be empty.',
            'lname.required' => 'The Last Name should not be empty.',
            'address.required' => 'The Address should not be empty.',
            'birthdate.required' => 'The Birthdate should not be empty.',
        ];

        $validation = Validator::make($request->input(), $rules, $messages);

        if ($validation->fails()) {    //$validation->passes()
            return response()->json([
                'message' => 'Failed Creation of Employee', 'errors' => $validation->errors()
            ], 400);
        } else {

            $employeeData = Employee::create($request->all());

            return response()->json($employeeData, 201);
        }
    }

    public function updateEmployee(Request $request, $id)
    {
        $rules = [
            'gender_id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'birthdate' => 'required',
        ];

        $messages = [
            'gender_id.required' => 'Please supply gender.',
            'fname.required' => 'The First Name should not be empty.',
            'lname.required' => 'The Last Name should not be empty.',
            'address.required' => 'The Address should not be empty.',
            'birthdate.required' => 'The Birthdate should not be empty.',
        ];

        $validation = Validator::make($request->input(), $rules, $messages);

        if ($validation->fails()) {    //$validation->passes()
            return response()->json([
                'message' => 'Failed Update of Employee', 'errors' => $validation->errors()
            ], 400);
        } else {
            $employeeData = Employee::findOrFail($id);
            $employeeData->update($request->all());

            return response()->json($employeeData, 200);
        }
    }

    public function deleteEmployee($id)
    {

        $employeeData = Employee::findOrFail($id);

        $employeeData->delete();

        return response($id . ' has been Deleted Successfully', 200);
    }
}
