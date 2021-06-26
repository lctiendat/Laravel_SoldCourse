<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if ($request->q) {
            $q = $request->q;
            $data = Course::where('name', 'like', '%' . $q . '%')->get();
            return response()->json($data);
        }
    }
}
