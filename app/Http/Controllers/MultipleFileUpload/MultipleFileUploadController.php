<?php

namespace App\Http\Controllers\MultipleFileUpload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Model\MultipleFileUpload\File;

class MultipleFileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('multiple_file_upload.index');
    }

    public function fileStore(Request $request)
    {
        request()->validate([
            'fileName' => 'required',
            'fileName.*' => 'mimes:doc,docx,pdf,txt,jpeg,png,jpg,gif,svg'
        ]);

        if ($request->hasfile('fileName')) {
            foreach ($request->file('fileName') as $key => $value) {
                if ($files = $value) {
                    $destinationPath = 'public/files/'; //upload path
                    $fileName = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $fileName);
                    $save[]['file_name'] = "$fileName";
                }
            }
        }
        File::insert($save); // store file into mysql database
        return Redirect::to("multiple-file-upload")->withSuccess('File Successfuly Uploaded.');
    }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
