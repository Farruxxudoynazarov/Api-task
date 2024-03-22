<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company;
// use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     

     public function __construct()
     {
        $this->middleware('can:viewAny, App\Models\Company')->only('index');
        $this->middleware('can:create, App\Models\Company')->only('store');
        $this->middleware('can:view,company')->only('show');
        $this->middleware('can:update,company')->only('update');
        $this->middleware('can:delete,company')->only('destroy');
     }
     


  public function index()
    {
        

        $companies = Company::all();
        return response()->json($companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request, Company $company)
    {
       


        $company = Company::create($request->validated());

        return response()->json(['company'=> $company], 201);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {

        return response()->json(['company' => $company], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request,Company $company)
    {
       $company->update($request->validated());

       return response()->json(['company' => $company], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
{
    $company->delete();
    return response()->json(['message' => 'Success'], 200);
}

}