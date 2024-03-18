<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company;
// use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function __construct(){
        $this->middleware(['permission:manage companies', 'auth:sanctum']);
     }
     
    public function index()
    {
        $companies = Company::all();
        return response()->json(['companies' => $companies], 200);
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
    public function destroy(Company  $company)
    {
        $company->delete();

        return 'success company delete';
    }
}
