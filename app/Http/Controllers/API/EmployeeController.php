<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(){
        $this->middleware(['permission:manage employees', 'auth:sanctum']);
     }


    public function index()
    {
        $employe = Employee::all();
        return response()->json(['employe' => $employe], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request, Employee $employee )
    {
        $employee = Employee::create($request->validated());
        return response()->json(['employee' => $employee], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return response()->json(['employee' => $employee], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return response()->json(['employee' => $employee], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return 'success company delete';
    }
}
