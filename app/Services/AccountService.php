<?php
// app/Services/AccountService.php

namespace App\Services;

use App\Models\AccountModel;
use Illuminate\Http\JsonResponse;

class AccountService
{
    private $accountModel;
    function __construct(AccountModel $accountModel)

    {
        $this->accountModel = $accountModel;
    }

    public function getAllUsers()
    {
        $data = $this->accountModel->select_array('tbl_Account', ['*']);
        return $data;
    }
}