<?php

namespace App\Http\Controllers;

use App\Salary;
//use Illuminate\Http\Request;
use App\Http\Requests\SalaryRequest as Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Salary::paginate(5)->ToJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Salary::create($request->toArray());
        $e = Salary::where('dept_no', $request->dept_no)->where('dept_no',$request->from_date)->first();
        return $e->ToJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        //
        return $salary;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        //
        $salary->update($request->toArray());
        return $salary;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        //
        $e = $salary;
        $salary->delete();
        return $e->toJson();
    }
}
