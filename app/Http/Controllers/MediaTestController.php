<?php

namespace App\Http\Controllers;

use App\MediaTest;
use Illuminate\Http\Request;

class MediaTestController extends Controller
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
        return view('media_test.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Populate model
        $product = new MediaTest($request->except(['image']));
        
        $product->save();

        //Store Image
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $product->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect("/mediatest/{$product->id}")->with('success', 'New Gift Added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MediaTest  $mediaTest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mediaTest = MediaTest::find($id);
        
        return view('media_test.show', compact('mediaTest'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MediaTest  $mediaTest
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaTest $mediaTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MediaTest  $mediaTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaTest $mediaTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MediaTest  $mediaTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaTest $mediaTest)
    {
        //
    }
}
