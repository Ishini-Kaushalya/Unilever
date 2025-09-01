<x-guest-layout>
    <x-slot name="heading">
        <h1 class="text-xl font-semibold font-brand text-gray-800 uppercase">
            Create an Account
        </h1>
    </x-slot>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input id="name" name="name" placeholder="Value" type="text" value="{{ old('name') }}" required autofocus
                class="mt-1 block w-full rounded-full border-gray-300 bg-[#ebe6f9] focus:border-purple-600 focus:ring-purple-600" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" placeholder="Value" type="email" value="{{ old('email') }}" required
                class="mt-1 block w-full rounded-full border-gray-300 bg-[#ebe6f9] focus:border-purple-600 focus:ring-purple-600" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select id="role" name="role" required
                class="mt-1 block w-full rounded-full border-gray-300 bg-[#ebe6f9] focus:border-purple-600 focus:ring-purple-600">
                <option value="">Select a Role</option>
                <option value="user">User</option>
                <option value="manager">Manager</option>
                <option value="admin">Admin</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" placeholder="Value" name="password" type="password" required
                class="mt-1 block w-full rounded-full border-gray-300 bg-[#ebe6f9] focus:border-purple-600 focus:ring-purple-600" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" placeholder="Value" type="password" required
                class="mt-1 block w-full rounded-full border-gray-300 bg-[#ebe6f9] focus:border-purple-600 focus:ring-purple-600" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-center mt-6">
            <button type="submit" 
                class="px-6 py-2  text-white bg-purple-700 rounded-full hover:bg-purple-800 transition">
                Sign Up
            </button>
        </div>
    </form>

    <!-- Sign In Link -->
    <p class="mt-6 text-center text-sm text-gray-600">
        Already have an account? 
        <a href="{{ route('login') }}" class="text-purple-700 hover:underline">Sign In</a>
    </p>
</x-guest-layout>
