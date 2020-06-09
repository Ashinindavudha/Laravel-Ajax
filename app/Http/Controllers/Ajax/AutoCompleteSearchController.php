<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class AutoCompleteSearchController extends Controller
{
    public function index()
    {
    	return view('search.search');
    }

    public function autocomplete(Request $request)
    {
    	$search = $request->get('term');
    	$request = User::where('name', 'LIKE', '%'. $search. '%')->get();
    	return response()->json($request);
    }
}
