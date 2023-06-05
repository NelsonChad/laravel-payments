<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PaymentsController extends Controller
{
   public function index(){

    $payments = ["M-Pesa","E-Mola","M-Pasa"];

    return Inertia::render('payments/Payments', compact('payments'));
   }

}
