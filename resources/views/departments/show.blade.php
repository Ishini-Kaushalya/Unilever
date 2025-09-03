@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <!-- Title -->
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">{{ $department->name }}</h1>

    <!-- Maintenance Buttons -->
    <div class="grid grid-cols-3 sm:grid-cols-1 gap-6">
        <!-- New Maintenance -->
        <a href="{{ route('departments.maintenance.index', [$department->id, 'new']) }}"
           class="block w-96 bg-white shadow rounded-lg p-2 hover:bg-gray-100 text-center">
            <p class="text-gray-700 font-medium">New Maintenance</p>
            <p class="text-2xl font-bold mt-2">{{ $data['new'] }}</p>
        </a>

        <!-- Active Maintenance -->
        <a href="{{ route('departments.maintenance.index', [$department->id, 'active']) }}"
           class="block w-96 bg-white shadow rounded-lg p-2 hover:bg-gray-100 text-center">
            <p class="text-gray-700 font-medium">Active Maintenance</p>
            <p class="text-2xl font-bold mt-2">{{ $data['active'] }}</p>
        </a>

        <!-- Rectified Maintenance -->
        <a href="{{ route('departments.maintenance.index', [$department->id, 'rectified']) }}"
           class="block w-96 bg-white shadow rounded-lg p-2 hover:bg-gray-100 text-center">
            <p class="text-gray-700 font-medium">Rectified Maintenance</p>
            <p class="text-2xl font-bold mt-2">{{ $data['rectified'] }}</p>
        </a>
    </div>
</div>
@endsection
