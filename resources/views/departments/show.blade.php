@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <!-- Title -->
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">{{ $department->name }}</h1>

    <!-- Maintenance Cards -->
    <div class="space-y-6">
        <!-- New Maintenance -->
        <div class="bg-white shadow rounded-lg p-6">
            <p class="text-gray-700 font-medium">New Maintenance</p>
            <p class="text-2xl font-bold mt-2">{{ $data['new'] }}</p>
        </div>

        <!-- Active Maintenance -->
        <div class="bg-white shadow rounded-lg p-6">
            <p class="text-gray-700 font-medium">Active Maintenance</p>
            <p class="text-2xl font-bold mt-2">{{ $data['active'] }}</p>
        </div>

        <!-- Rectified Maintenance -->
        <div class="bg-white shadow rounded-lg p-6">
            <p class="text-gray-700 font-medium">Rectified Maintenance</p>
            <p class="text-2xl font-bold mt-2">{{ $data['rectified'] }}</p>
        </div>
    </div>
</div>
@endsection
