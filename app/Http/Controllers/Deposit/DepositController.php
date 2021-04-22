<?php

namespace App\Http\Controllers\Deposit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        return view('frontend.pages.deposit.index');
    }


    public function store(Request $request)
    {
        //
    }
}
