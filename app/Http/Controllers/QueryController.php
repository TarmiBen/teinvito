<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostalCode;

class QueryController extends Controller
{
    public function getCP($cp)
    {
        $cp = PostalCode::where('codigo', $cp)->first();
        return response()->json($cp);
    }
}
