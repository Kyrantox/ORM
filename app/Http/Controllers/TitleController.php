<?php

namespace App\Http\Controllers;

use App\Title;
//use Illuminate\Http\Request;
use App\Http\Requests\TitleRequest as Request;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Title::paginate(5)->ToJson();
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
        Title::create($request->toArray());
        $e = Title::where('dept_no', $request->dept_no)->where('title', $request->title)->where('from_date', $request->from_date)->first();
        return $e->ToJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Title $title)
    {
        //
        return $title;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Title $title)
    {
        //
        $title->update($request->toArray());
        return $title;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        //
        $e = $title;
        $title->delete();
        return $e->toJson();
    }
}
