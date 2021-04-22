<?php

namespace App\Http\Controllers\User\BankInformation;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Bank\BankInformationRequest;
use App\Models\BankInformation;

class BankInformationController extends Controller
{
    public function store(BankInformationRequest $request)
    {
        auth()->user()->bankInformations()->create($request->validated());

        return redirect()->back()->with('success', trans('lang.bank_add_message'));
    }

    public function show($id)
    {
        $bank = BankInformation::query()->findorfail($id);

        return view('frontend.partial_views.user.bank.bank_details', compact('bank'));
    }

    public function destroy($id)
    {
        BankInformation::query()->findorfail($id)->delete();

        return redirect()->back()->with('success', trans('lang.bank_del_message'));
    }
}
