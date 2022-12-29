<?php

namespace App\Http\Controllers;

use App\Models\CampBenefit;
use App\Models\Camps;
use App\Models\Category ;
use App\Models\Program;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('program', [
            'category' =>$category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $camp = Camps::where('category_id', $id)->get();
        $program = Category::whereId($id)->first();
        
        
        return view('allclass', [
            'camps' => $camp,
            'programs' => $program
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $program)
    {
        //
    }
}
