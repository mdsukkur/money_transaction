<?php

namespace App\Http\Requests\User\Bank;

use Illuminate\Foundation\Http\FormRequest;

class BankInformationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'account_type' => 'required|string',
            'bank_name' => 'required|string',
            'account_name' => 'required|string',
            'account_number' => 'required|string|unique:bank_information',
            'routing_number' => 'required|string|unique:bank_information',
        ];
    }
}
