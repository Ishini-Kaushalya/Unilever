<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Sample data for the dashboard
        $data = [
            'totalDowntime' => 3658,
            'mechanical' => ['total' => 3150, 'percent' => 87, 'BD' => 643, 'MA' => 2509],
            'electrical' => ['total' => 416, 'percent' => 12, 'BD' => 100, 'MA' => 316],
            'noSpares' => ['total' => 0, 'percent' => 0],
            'breakdownDistribution' => [
                'labels' => ['TLO', 'SL1', 'DLO', 'DLO', 'SL3', 'SL4'],
                'mechanical' => [700, 300, 650, 1200, 650, 900],
                'electrical' => [100, 50, 100, 0, 150, 50],
            ],
            'shiftDistribution' => [
                'labels' => ['TLO 123', 'SL 01', 'DLO 12', 'SUNLIGHT 1', 'SUNLIGHT 2,3,4', 'TALC POWDER'],
                'shift1' => [800, 600, 900, 700, 650, 550],
                'shift2' => [500, 400, 700, 500, 450, 500],
                'shift3' => [400, 300, 600, 450, 400, 450],
            ],
            'majorDowntimes' => [
                "DLO7 PnP stuck issue (electrical)",
                "DLO6 skew wrapping correction (two times in the shift)",
                "DLO7 PnP stuck issue (electrical)",
                "DLO7 PnP stuck issue (electrical)",
            ],
        ];

        return view('dashboard', compact('data'));
    }
}