<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MySubscriptionController extends Controller
{
    public function index()
    {
        return view('users.my-subscription.index');
    }
}
