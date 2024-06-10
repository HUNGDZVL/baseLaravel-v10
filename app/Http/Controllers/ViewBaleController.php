<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewBaleController extends Controller
{
    //
    public function __construct()
    {
    }
    public function index()
    {
        $dataarr = [
            0 => 1,
            1 => 2,
            2 => 3,
        ];
        $data = [
            't1' => "xin chao",
            "htmlContent" => "<h2>OK</2>",
            'arr' => $dataarr,
        ];
        return view("frontend/homeblade/index", !empty($data) ? $data : null);
    }
}
