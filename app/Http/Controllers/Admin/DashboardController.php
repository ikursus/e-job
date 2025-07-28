<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $totalUsers = '0';
        $totalJawatan = '0';
        $latestUsers = [];
        $latestJawatan = [];

        return view('admin.dashboard', compact(
            'totalUsers', 
            'totalJawatan', 
            'latestUsers', 
            'latestJawatan'
        ));
    }
}
