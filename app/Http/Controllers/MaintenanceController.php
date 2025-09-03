<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class MaintenanceController extends Controller
{
    public function index(Department $department, $status)
    {
        // You can later fetch actual records by status
        return view('maintenance.index', [
            'department' => $department,
            'status' => ucfirst($status),
        ]);
    }
}
