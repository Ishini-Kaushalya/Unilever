@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Departments</h1>

    <div class="space-y-4">
        @foreach($departments as $dept)
            <a href="{{ route('departments.show', $dept->id) }}" 
               class="block w-full bg-white hover:bg-gray-100 border border-gray-300 text-gray-800 p-4 rounded-xl shadow font-medium text-left">
                {{ $dept->name }}
            </a>
        @endforeach
    </div>
</div>
@endsection
