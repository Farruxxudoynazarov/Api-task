<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
// use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */





    public function __construct()
    {
        $this->middleware('can:viewAny,App\Models\Employee')->only('index');
        $this->middleware('can:view,employee')->only('show');
        $this->middleware('can:create,App\Models\Employee')->only('store');
        $this->middleware('can:update,employee')->only('update');
        $this->middleware('can:delete,employee')->only('destroy');
    }




    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin' || $user->role === 'company') {
            $employees = Employee::all();
        } else {
            $employees = Employee::where('company_id', $user->company_id)->get();
        }
        return response()->json($employees);
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request, Employee $employee)
    {


        $employee = Employee::create($request->validated());

        return response()->json($employee, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {

        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {


        $employee->update($request->validated());
        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['message' => 'Success'], 200);
    }
}
