<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::orderBy('id','desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validatedData = $request->validate([
        'category_name' => 'required|unique:categories|max:255',
        'publication_status' => 'required',
          ]);

        $data=new Category();
        $data->category_name=$request->category_name;
        $data->category_description=$request->category_description;
        $data->publication_status=$request->publication_status;
        $data->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Category::findOrFail($id);
        return response()->json($data);
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
            $validatedData = $request->validate([
        'category_name' => 'required|unique:categories|max:255',
        'publication_status' => 'required',
          ]);

        $data=Category::find($id);
        $data->category_name=$request->category_name;
        $data->category_description=$request->category_description;
        $data->publication_status=$request->publication_status;
        $data->update();
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            Category::where('id',$id)->delete();
            return response('Data Deleted Permanently');
    }
}
