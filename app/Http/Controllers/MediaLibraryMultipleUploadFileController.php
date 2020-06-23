<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MediaLibrary;

class MediaLibraryMultipleUploadFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = MediaLibrary::all();
        return view('media_library.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('media_library.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $project = MediaLibrary::create($request->all());

    foreach ($request->input('document', []) as $file) {
        $project->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
    }

    return redirect()->route('projects.index');
}

    public function storeMedia(Request $request)
{
    $path = storage_path('tmp/uploads');

    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }

    $file = $request->file('file');

    $name = uniqid() . '_' . trim($file->getClientOriginalName());

    $file->move($path, $name);

    return response()->json([
        'name'          => $name,
        'original_name' => $file->getClientOriginalName(),
    ]);
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
        $project_edit = MediaLibrary::where('id',$id)->first();
        //$categories = Category::where('id', $id)->first();
        //$categories = Category::all();
        return view('media_library.edit', compact('project_edit'));

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
        $project = MediaLibrary::find($id);
        
        $project->update($request->all());

    if (count($project->document) > 0) {
        foreach ($project->document as $media) {
            if (!in_array($media->file_name, $request->input('document', []))) {
                $media->delete();
            }
        }
    }

    $media = $project->document->pluck('file_name')->toArray();

    foreach ($request->input('document', []) as $file) {
        if (count($media) === 0 || !in_array($file, $media)) {
            $project->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
        }
    }

    return redirect()->route('projects.index');

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
