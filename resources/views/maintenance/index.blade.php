@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">
        {{ $department->name }} - {{ $status }} Maintenance
    </h1>

    <div class="bg-white shadow rounded-lg p-6">
        <p class="text-gray-600">Here you can show the list of {{ strtolower($status) }} maintenance records for {{ $department->name }}.</p>
    </div>
</div>
@endsection
