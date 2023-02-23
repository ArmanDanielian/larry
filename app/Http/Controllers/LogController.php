<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = file(storage_path('logs/laravel.log'));

        return view('logs.index', compact('logs'));
    }
}
