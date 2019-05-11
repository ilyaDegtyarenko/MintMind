<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Returns app view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $authUser = Auth::user();

        return view('app', compact('authUser'));
    }
}