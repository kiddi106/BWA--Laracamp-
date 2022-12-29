<?php

namespace App\Http\Controllers;

use App\Models\Camps;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Str;

class ContentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $camp_id = $request->camp_id;
        $content = new Content();
        $content->camp_id = $camp_id;
        $content->name = $request->title;
        $content->link = $request->link;
        $content->duration = $request->duration;
        $content->created_at = now();
        $content->save();

        $camp = Camps::whereId($camp_id)->first();


        $request->session()->flash('success', 'A new class content has been created');
        return redirect()->route('admin.class.show', $camp->slug)->with('alert.success', 'Success added Content into Class');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::whereId($id)->first();
        return view('admin.contentClass.edit',[
            'content'=>$content
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
        $content = Content::whereId($id)->first();
       
        $data['name'] = $request->name;
        $data['link'] = $request->link;
        $data['duration'] = $request->duration;

        $content->update($data);
        $camp_id = $content->camp_id;
        $camp = Camps::whereId($camp_id)->first();

        $request->session()->flash('success', "Content {$content->name } has been updated");
        return redirect(route('admin.class.show', $camp->slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $content = Content::whereId($id)->first();
        $content->delete();
        $request->session()->flash('error', 'A content has been deleted');
        $camp_id = $content->camp_id;
        $camp = Camps::whereId($camp_id)->first();
        return redirect(route('admin.class.show', $camp->slug));
    }

    public function createNew($slug)
    {
        $camp = Camps::whereSlug($slug)->first();
        return view('admin.contentClass.create', 
        ['camp' => $camp]);
        
    }
}
