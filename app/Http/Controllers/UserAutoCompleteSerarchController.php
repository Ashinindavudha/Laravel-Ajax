<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserAutoCompleteSerarchController extends Controller
{
    public function index()
    {
    	return view('auto_search.index');
    }

    public function search(Request $request)
    {
    	$search = $request->get('term');
      
          $result = User::where('name', 'LIKE', '%'. $search. '%')->get();
 
          return response()->json($result);
 
    }
}
