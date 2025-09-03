<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class MaintenanceController extends Controller
{
    public function index(Department $department, $status)
{
    // Decide the maintenance type based on the status or any logic you want
    $maintenanceType = match(strtolower($status)) {
        'new' => 'New',
        'active' => 'Active',
        'rectified' => 'Rectified',
        default => 'Unknown',
    };

    return view('maintenance.index', [
        'department' => $department,
        'status' => ucfirst($status),
        'maintenanceType' => $maintenanceType, // ✅ Now defined
    ]);
}

}
