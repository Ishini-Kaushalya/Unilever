<x-guest-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-semibold text-gray-800">WELCOME BACK!</h1>
        <p class="text-sm text-gray-600 mt-1">Login to access your account</p>
    </x-slot>

    <!-- Login Form -->
    <!-- Removed extra white card div -->
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" 
                          class="block mt-1 w-full bg-[#ebe6f9] border-gray-300 rounded-full focus:border-purple-600 focus:ring-purple-600" 
                          type="email" 
                          placeholder="Value"
                          name="email" 
                          :value="old('email')" 
                          required 
                          autofocus 
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" 
                          class="mt-1 block w-full rounded-full border-gray-300 bg-[#ebe6f9] focus:border-purple-600 focus:ring-purple-600"
                          type="password"
                          placeholder="Value"
                          name="password"
                          required 
                          autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        

        <div class="flex items-center justify-center mt-6">
            <button type="submit" 
                class="px-6 py-2  text-white bg-purple-700 rounded-full hover:bg-purple-800 transition">
                Sign In
            </button>
        </div>
    </form>
    </form>
</x-guest-layout>
