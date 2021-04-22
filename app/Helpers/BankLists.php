<?php

namespace App\Helpers;

class BankLists
{
    public static function getAllBanks($value = null)
    {
        $banks = [
            1 => 'Bank Name 1',
            2 => 'Bank Name 2',
            3 => 'Bank Name 3',
            4 => 'Bank Name 4',
            5 => 'Bank Name 5',
            6 => 'Bank Name 6',
        ];

        if (!is_null($value)) {
            return $banks[$value];
        } else {
            return $banks;
        }
    }

    public static function getAccountType($value = null)
    {
        $types = [
            1 => 'Personal',
            2 => 'Business'
        ];

        if (!is_null($value)) {
            return $types[$value];
        } else {
            return $types;
        }
    }
}
