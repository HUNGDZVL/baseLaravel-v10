<?php

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // [get]
    public function index()
    {
        //
        print_r("test controller resource oki");
        die();
    }

    /**
     * Show the form for creating a new resource.
     */
    // [get]
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // [post]
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // [get]
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // [get]
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // [put,patch]
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // [delete]
    public function destroy(string $id)
    {
        //
    }
}
