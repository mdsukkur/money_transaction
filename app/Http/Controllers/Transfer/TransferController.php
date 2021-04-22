<?php

namespace App\Http\Controllers\Transfer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        return view('frontend.pages.transfer.index');
    }


    public function store(Request $request)
    {
        //
    }
}
