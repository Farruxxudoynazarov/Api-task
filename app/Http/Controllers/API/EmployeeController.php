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
        $this->authorizeResource(Employee::class, 'employee');
    }



     public function index()
     {
        if (auth()->user()->role === 'admin') {
            $employees = Employee::all();
        } else {
            $employees = Employee::where('company_id', auth()->user()->company_id)->get();
    //    @dd($employees);
        }

        return response()->json($employees);
     }

    

       

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request, Employee $employee )
    {
       
        $this->authorize('create', Employee::class);

         $company = Company::create($request->validated());

         return response()->json($employee, 201);

    }    


    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $this->authorize('view', $employee);

    return response()->json($employee);

    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        
            $this->authorize('update', $employee);

            $employee->update($request->all());
            return response()->json($employee);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy(Employee $employee)
{
    $this->authorize('delete', $employee);

    $employee->delete();

    return response()->json(null, 204);
    
    }

}