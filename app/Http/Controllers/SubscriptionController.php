<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MercadoPagoService;

class SubscriptionController extends Controller
{
    public function __construct(
        private MercadoPagoService $mercadoPagoService
    )
    {}
    
    public function index()
    {
        return view('users.subscription.index');
    }

    public function show($id)
    {
        $preference = $this->mercadoPagoService->createPreference();
        return view('users.subscription.show', compact('preference'));
    }
}
