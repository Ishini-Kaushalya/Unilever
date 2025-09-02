<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            'TLO 123',
            'SLO 01',
            'SLO 02',
            'DLO 1,2',
            'SUNLIGHT 1',
            'SUNLIGHT 2,3,4',
            'TALC POWDER',
        ];

        foreach ($departments as $dept) {
            Department::updateOrCreate(['name' => $dept]);
        }
    }
}
