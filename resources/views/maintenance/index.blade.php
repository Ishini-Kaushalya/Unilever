@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">
         {{ $status }} Maintenance
    </h1>

    <!-- Boxed Form -->
    <div class="border rounded-xl bg-[#d2c7f0] p-6 shadow-md">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <!-- Downtime Type -->
            <div class="grid grid-cols-2 gap-4 items-center mb-4">
                <label class="text-gray-700"><b>Downtime Type</b></label>
                <input type="text" name="downtime_type" class="w-full border rounded p-2" required>
            </div>

            <!-- Machine Name/ID -->
            <div class="grid grid-cols-2 gap-4 items-center mb-4">
                <label class="text-gray-700"><b>Machine Name/ID</b></label>
                <input type="text" name="machine_name" class="w-full border rounded p-2" required>
            </div>

            <!-- Tally No. -->
            <div class="grid grid-cols-2 gap-4 items-center mb-4">
                <label class="text-gray-700"><b>Tally No.</b></label>
                <input type="text" name="tally_no" class="w-full border rounded p-2">
            </div>

            <!-- Shift -->
            <div class="grid grid-cols-2 gap-4 items-center mb-4">
                <label class="text-gray-700"><b>Shift</b></label>
                <input type="text" name="shift" class="w-full border rounded p-2">
            </div>

            <!-- Failure Time -->
            <div class="grid grid-cols-2 gap-4 items-center mb-4">
                <label class="text-gray-700"><b>Failure Time</b></label>
                <input type="text" name="failure_time" class="w-full border rounded p-2">
            </div>

            <!-- Description -->
            <div class="grid grid-cols-2 gap-4 items-center mb-4">
                <label class="text-gray-700"><b>Description</b></label>
                <textarea name="description" class="w-full border rounded p-2"></textarea>
            </div>

            <!-- Maintenance Type -->
            <div class="grid grid-cols-2 gap-4 items-center mb-4">
                <label class="text-gray-700"><b>Maintenance Type</b></label>
                <input type="text" name="maintenance_type" class="w-full border rounded p-2">
            </div>

            <!-- Technician -->
            @if($maintenanceType == 'Active' || $maintenanceType == 'Rectified')
                <div class="grid grid-cols-2 gap-4 items-center mb-4">
                    <label class="text-gray-700"><b>Technician</b></label>
                    <input type="text" name="technician_active" class="w-full border rounded p-2">
                </div>

                <!-- Rectification Start Time -->
                <div class="grid grid-cols-2 gap-4 items-center mb-4">
                    <label class="text-gray-700"><b>Rectification Start Time</b></label>
                    <input type="text" name="rectification_start" class="w-full border rounded p-2">
                </div>
            @else
                <div class="grid grid-cols-2 gap-4 items-center mb-4">
                    <label class="text-gray-700"><b>Technician</b></label>
                    <div class="flex gap-2">
                        <select name="tech" class="w-full border rounded p-2" required>
                            <option value="">Select Name</option>
                            <!-- Add your technician options here -->
                        </select>
                        <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                            Assign
                        </button>
                    </div>
                </div>
            @endif

            <!-- Fields specific to Rectified -->
            @if($maintenanceType == 'Rectified')
                <div class="grid grid-cols-2 gap-4 items-center mb-4">
                    <label class="text-gray-700"><b>Handover Time</b></label>
                    <input type="text" name="handover_time" class="w-full border rounded p-2">
                </div>

                <div class="grid grid-cols-2 gap-4 items-center mb-4">
                    <label class="text-gray-700"><b>DT Code</b></label>
                    <input type="text" name="dt_code" class="w-full border rounded p-2">
                </div>

                <div class="grid grid-cols-2 gap-4 items-center mb-4">
                    <label class="text-gray-700"><b>Amendment Description</b></label>
                    <textarea name="amendment_description" class="w-full border rounded p-2"></textarea>
                </div>
            @endif

           

        </form>
    </div>
</div>
@endsection
