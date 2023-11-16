<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\Section;

class CustomViewController extends Controller
{
    public function create()
    {
        return view('admin.provider.create');
    }
}
