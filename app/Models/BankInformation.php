<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_type',
        'bank_name',
        'account_name',
        'account_number',
        'routing_number',
    ];
}
