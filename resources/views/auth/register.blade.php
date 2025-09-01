<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-purple-100">
        <div class="w-full max-w-md p-6 bg-white rounded-2xl shadow-lg">
            
            <!-- Logo -->
            <div class="flex flex-col items-center mb-6">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Unilever.svg/1200px-Unilever.svg.png" class="w-16 h-16 mb-2" alt="Unilever Logo">
                <h1 class="text-xl font-semibold text-center">CREATE AN ACCOUNT</h1>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <x-input-label for="role" :value="__('Role')" />
                    <select id="role" name="role" class="block mt-1 w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500">
                        <option value="">Select a Role</option>
                        <option value="user">User</option>
                        <option value="manager">Manager</option>
                        <option value="admin">Admin</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Submit -->
                <div class="flex items-center justify-center mt-6">
                    <button type="submit" class="px-6 py-2 text-white bg-purple-700 rounded-lg hover:bg-purple-800">
                        {{ __('Sign Up') }}
                    </button>
                </div>
            </form>

            <!-- Sign In Link -->
            <p class="mt-4 text-center text-sm">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-purple-600 hover:underline">Sign In</a>
            </p>
        </div>
    </div>
</x-guest-layout>
