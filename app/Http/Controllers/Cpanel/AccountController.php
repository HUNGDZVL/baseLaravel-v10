<?php

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function __construct()
    {
        // check middleware
    }
    public function index()
    {
        print_r("oki success");
        return;
    }
}
