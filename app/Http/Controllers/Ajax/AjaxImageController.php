<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Model\AjaxImage;

class AjaxImageController extends Controller
{
    public function ajaxImageUpload()
    {
    	return view('ajax_image_upload.ajaxImageUpload');
    }


    public function ajaxImageUploadPost(Request $request)
    {
    	$validator = Validator::make($request->all(), ['title' => 'required', 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    	if ($validator->passes()) {
    		
    		$input = $request->all();
    		$input['image'] = time().'.'.$request->image->extension();
    		$request->image->move(public_path('images'), $input['image']);

    		AjaxImage::create($input);
    		return response()->json(['success' => 'done']);
    	}

    	return response()->json(['error' => $validator->errors()->all()]);
    }
}
