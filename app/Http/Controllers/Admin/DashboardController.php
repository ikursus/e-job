<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
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
