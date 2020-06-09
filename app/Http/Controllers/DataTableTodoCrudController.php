<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use DataTable;
use Validator;
use Redirect;
use Response;



class DataTableTodoCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // display todo list function
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Todo::select([
                'id', 'name', 'email', 'message', 'created_at' 
            ]))->addIndexColumn()->addColumn('action', function($data){
                $editUrl = url('edit-todo/'.$data->id);
                $btn = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTodo">Delete</a>';
                return $btn;
            })->rawColumns(['action'])->make(true);
        }
        return view('todo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('todo.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        $check = Todo::create($data);
        return Redirect::to("list")->withSuccess('Grate! Todo has been inserted');
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
    public function edit(Request $request, $id)
    {
       $data['todo'] = Todo::where('id', $id)->first();
       if (!$data['todo']) {
            return redirect('/list');
        } 
        return view('todo.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = request()->validate([
        'name' => 'required',
        'email' => 'required',
        'message' => 'required',
        ]);
       
        if(!$request->id){
           return redirect('/list');
        }

        $check = Todo::where('id', $request->id)->update($data);
        return Redirect::to("list")->withSuccess('Great! Todo has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Todo::where('id', $id)->delete();
 
        return Response::json($check);
    }
}
