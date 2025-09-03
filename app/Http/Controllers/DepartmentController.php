<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function show(Department $department)
    {
        // later you can fetch counts from DB
        $data = [
            'new' => 2,
            'active' => 5,
            'rectified' => 20,
        ];

        return view('departments.show', compact('department', 'data'));
    }
}
