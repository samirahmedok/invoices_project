<?php

namespace App\Http\Controllers;

use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = sections::all();
        return view('sections.sections' , compact('sections'));
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
        $validated = $request->validate([
            'section_name' => 'required|unique:sections|max:255',
            ],
            [
                'section_name.required' => 'section_name is required',
                'section_name.unique' => 'section_name is already exist pls, enter new one',
                
                
            ]
        );

        
        // $input = $request->all();
        // $b_exists = sections::where("section_name", "=" ,$input['section_name'])->exists();

        // if ($b_exists) {
        //     session()->flash("error" , "this name is already exist");
        //     return redirect("/sections");
        // }else{
            sections::create([
                "section_name" => $request['section_name'],
                "description" => $request['description'],
                "created_by" => (auth::user()->name)
            ]);
            session()->flash("add" , "process succeded");
            return redirect("/sections");
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $this->validate($request,[
            'section_name' => 'required|unique:sections,section_name|max:255'.$id,
            'description' => 'required'
        ],[
                'section_name.required' => 'section_name is required',
                'section_name.unique' => 'section_name is already exist pls, enter new one',
                'description.required' => 'description is required'
            ]);
            $sections = sections::find($id);
            $sections->update([
                "section_name" => $request->section_name,
                "description" => $request->description
            ]);
            session()->flash("edit" , "process updated successfully");
            return redirect("/sections");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id = $request->id ;
        sections::find($id)->delete();
        session()->flash("delete" ,"deleted successfully");
        return redirect("/sections");
    }
}
