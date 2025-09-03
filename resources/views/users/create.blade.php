@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-8">
    <h2 class="text-2xl font-bold mb-6">Add Users</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" class="w-full max-w-md">
        @csrf

        <div class="mb-4">
            <label class="block mb-2">Name</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2">Email</label>
            <input type="email" name="email" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2">Tel. No</label>
            <input type="text" name="tel_no" class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block mb-2">Department</label>
            <select name="department" class="w-full border rounded p-2" required>
                <option value="">Select Department</option>
                <option value="HR">HR</option>
                <option value="Finance">Finance</option>
                <option value="IT">IT</option>
                <option value="Sales">Sales</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-2">Role</label>
            <select name="role" class="w-full border rounded p-2" required>
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
                <option value="staff">Staff</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="px-6 py-2  text-white bg-purple-700 rounded-full hover:bg-purple-800 transition">
                Add
            </button>
        </div>
    </form>
</div>
@endsection
