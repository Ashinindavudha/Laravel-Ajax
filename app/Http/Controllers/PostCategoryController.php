<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostCategory;
use Redirect;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PostCategory::all();
        return view('post_blog.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post_blog.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new PostCategory;
        $category->name = $request->name;
        $category->save();
        return Redirect::to("postcategories")->withSuccess('Grate! Category Name has been inserted');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category_show = PostCategory::find($id);
        return view('post_blog.category.show', compact('category_show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = PostCategory::where('id',$id)->first();
        //$categories = Category::where('id', $id)->first();
        return view('post_blog.category.edit', compact('category'));
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
        $category = PostCategory::find($id);
        
        $category->update($request->all());
        return redirect(route('postcategories.index'))->with('success_message','Category Updated Successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostCategory::where('id', $id)->delete();
        return redirect()->back()->with('success_message', 'Category was Delete');
    }
}
