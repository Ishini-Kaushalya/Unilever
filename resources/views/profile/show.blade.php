<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Profile Details</h3>

                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Tel. No:</strong> {{ $user->tel_no ?? '-' }}</p>
                <p><strong>Department:</strong> {{ $user->department ?? '-' }}</p>
                <p><strong>Role:</strong> {{ $user->role ?? '-' }}</p>

                <div class="mt-6">
                    <a href="{{ route('profile.edit') }}"
                       class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
