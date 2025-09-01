<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-unilever-light">
        <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-md">
            
            <!-- Logo -->
            <div class="flex flex-col items-center mb-6">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/0c/Unilever.svg" 
                     class="w-16 h-16 mb-2" 
                     alt="Unilever Logo">
                <h1 class="text-xl font-brand font-semibold text-gray-800 text-center">
                    CREATE AN ACCOUNT
                </h1>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                        class="mt-1 block w-full rounded-full border-gray-300 focus:border-unilever-purple focus:ring-unilever-purple" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required
                        class="mt-1 block w-full rounded-full border-gray-300 focus:border-unilever-purple focus:ring-unilever-purple" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" name="role" required
                        class="mt-1 block w-full rounded-full border-gray-300 focus:border-unilever-purple focus:ring-unilever-purple">
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
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full rounded-full border-gray-300 focus:border-unilever-purple focus:ring-unilever-purple" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="mt-1 block w-full rounded-full border-gray-300 focus:border-unilever-purple focus:ring-unilever-purple" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Submit -->
                <div class="flex items-center justify-center mt-6">
                    <button type="submit" 
                        class="px-6 py-2 w-full text-white bg-unilever-button rounded-full hover:bg-unilever-buttonHover transition">
                        Sign Up
                    </button>
                </div>
            </form>

            <!-- Sign In Link -->
            <p class="mt-6 text-center text-sm text-gray-600">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-unilever-purple hover:underline">Sign In</a>
            </p>
        </div>
    </div>
</x-guest-layout>
