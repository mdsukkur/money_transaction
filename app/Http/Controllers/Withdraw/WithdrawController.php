<?php

namespace App\Http\Controllers\Withdraw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index()
    {
        return view('frontend.pages.withdraw.index');
    }


    public function store(Request $request)
    {
        //
    }
}
