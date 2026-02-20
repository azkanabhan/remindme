<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard
     */
    public function index(): View
    {
        return view('dashboard');
    }
}
