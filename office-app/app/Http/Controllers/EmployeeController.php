<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input("status");
        $perPage = $request->input("perPage");
        return Employee::orderBy('id', 'asc')
            ->paginate((int) $perPage);
    }
    public function store(Request $request)
    {
        $employees = new Employee([
            'name' => $request->input('name'),
            'address' =>$request->input('address'),
            'mobile' => $request->input('mobile')
        ]);
        $employees->save();
        return response()->json('Employee created!');
    }
    public function update(Request $request, $id)
    {
       $employees = Employee::find($id);
       $employees->update($request->all());
       return response()->json('Employee updated');
    }
    
    public function destroy($id)
    {
        $employees = Employee::find($id);
        $employees->delete();
        return response()->json(' deleted!');
    } 
}
