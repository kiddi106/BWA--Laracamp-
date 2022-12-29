<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CampBenefit;
use App\Models\Camps;
use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;
use Str;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = Camps::all();
        return view('admin.class.dashboard', [
            'class' => $class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.class.create',
        [
            'category' => $category
        ]
    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['title'] = $request->title;
        $data['slug'] = Str::slug($request->title, '-');
        $data['price'] = $request->price;
        $data['category_id'] = $request->camp_id;
        $class = Camps::create($data);
        
        $request->session()->flash('success', 'A new class has been created');
        return redirect(route('admin.class.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = Camps::whereSlug($id, 'slug')->first();
        $content = Content::where('camp_id',$class->id)->get();
        
        return view('admin.contentClass.dashboard', [
            'class' => $class,
            'content' => $content
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camp = Camps::whereSlug($id)->first();
        return view('admin.class.edit',[
            'class'=>$camp
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $camp = Camps::whereSlug($id)->first();
       
        $data['title'] = $request->title;
        $data['slug'] = Str::slug($request->title, '-');
        $data['price'] = $request->price;

        $camp->update($data);

        $request->session()->flash('success', "class {$camp->title } has been updated");
        return redirect(route('admin.class.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $camp = Camps::whereSlug($id)->first();
        $camp->delete();
        $request->session()->flash('error', 'A new discount has been deleted');
        return redirect(route('admin.class.index'));
    }
}
