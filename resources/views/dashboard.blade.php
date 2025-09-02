@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-4 rounded shadow text-center">
                <h3 class="font-semibold">Total Downtime</h3>
                <p class="text-lg font-bold">{{ $data['totalDowntime'] }} min</p>
            </div>

            <div class="bg-white p-4 rounded shadow text-center">
                <h3 class="font-semibold">Mechanical</h3>
                <p class="text-lg font-bold">{{ $data['mechanical']['total'] }} ({{ $data['mechanical']['percent'] }}%)</p>
                <small>BD: {{ $data['mechanical']['BD'] }} | M&A: {{ $data['mechanical']['MA'] }}</small>
            </div>

            <div class="bg-white p-4 rounded shadow text-center">
                <h3 class="font-semibold">Electrical</h3>
                <p class="text-lg font-bold">{{ $data['electrical']['total'] }} ({{ $data['electrical']['percent'] }}%)</p>
                <small>BD: {{ $data['electrical']['BD'] }} | M&A: {{ $data['electrical']['MA'] }}</small>
            </div>

            <div class="bg-white p-4 rounded shadow text-center">
                <h3 class="font-semibold">No Spares</h3>
                <p class="text-lg font-bold">{{ $data['noSpares']['total'] }} ({{ $data['noSpares']['percent'] }}%)</p>
            </div>
        </div>

        <!-- Charts -->
        <div class="grid grid-cols-2 gap-6 mb-6 bg-white p-4 rounded shadow">
            <!-- Breakdown Chart -->
            <div class="h-64 w-full">
                <canvas id="breakdownChart"></canvas>
            </div>

            <!-- Shift Chart -->
            <div class="h-64 w-full">
                <canvas id="shiftChart"></canvas>
            </div>
        </div>

        <!-- Major Downtimes -->
        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold mb-2">Major Downtimes (09 BDs exceeding 60 min)</h3>
            <ol class="list-decimal pl-5">
                @foreach($data['majorDowntimes'] as $downtime)
                    <li>{{ $downtime }}</li>
                @endforeach
            </ol>
        </div>

    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const breakdownCtx = document.getElementById('breakdownChart').getContext('2d');
    const breakdownChart = new Chart(breakdownCtx, {
        type: 'bar',
        data: {
            labels: @json($data['breakdownDistribution']['labels']),
            datasets: [
                {
                    label: 'Mechanical',
                    data: @json($data['breakdownDistribution']['mechanical']),
                    backgroundColor: '#4f46e5'
                },
                {
                    label: 'Electrical',
                    data: @json($data['breakdownDistribution']['electrical']),
                    backgroundColor: '#22c55e'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    const shiftCtx = document.getElementById('shiftChart').getContext('2d');
    const shiftChart = new Chart(shiftCtx, {
        type: 'bar',
        data: {
            labels: @json($data['shiftDistribution']['labels']),
            datasets: [
                {
                    label: 'Shift 1',
                    data: @json($data['shiftDistribution']['shift1']),
                    backgroundColor: '#2563eb'
                },
                {
                    label: 'Shift 2',
                    data: @json($data['shiftDistribution']['shift2']),
                    backgroundColor: '#16a34a'
                },
                {
                    label: 'Shift 3',
                    data: @json($data['shiftDistribution']['shift3']),
                    backgroundColor: '#f59e0b'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
@endsection
