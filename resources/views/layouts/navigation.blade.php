<div class="flex h-screen bg-gray-100">

    <!-- Sidebar -->
    <aside class="w-20 bg-purple-800 text-white flex flex-col items-center py-6 space-y-8">
        <!-- Dashboard Icon -->
        <a href="{{ route('dashboard') }}" 
           class="p-3 rounded-lg hover:bg-purple-700 {{ request()->routeIs('dashboard') ? 'bg-purple-700' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5-8h-3m-6 0H4"/>
            </svg>
        </a>

        <!-- Add User Icon -->
        <a href="{{ route('users.create') }}" 
           class="p-3 rounded-lg hover:bg-purple-700 {{ request()->routeIs('users.create') ? 'bg-purple-700' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4"/>
            </svg>
        </a>

        <!-- Departments Icon -->
        <a href="{{ url('departments') }}" 
           class="p-3 rounded-lg hover:bg-purple-700 {{ request()->is('departments*') ? 'bg-purple-700' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 17v-6h6v6m2 4H7a2 2 0 01-2-2V7a2 2 0 012-2h2l2-2h2l2 2h2a2 2 0 012 2v12a2 2 0 01-2 2z"/>
            </svg>
        </a>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        
        <!-- Top Navbar -->
        <header class="bg-purple-800 text-white flex justify-between items-center px-6 py-4 shadow">
            <!-- Left: Logo -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/unileverLogo.png') }}" alt="Unilever Logo" class="h-10 w-10">
                <span class="font-bold text-lg">BD Automation</span>
            </div>

            <!-- Right: Bell + Profile -->
            <div class="flex items-center space-x-6">
                <!-- Bell Icon -->
                <button class="hover:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11c0-3.07-1.63-5.64-4.5-6.32V4a1.5 1.5 0 00-3 0v.68C7.63 5.36 6 7.92 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </button>

                <!-- Profile Dropdown -->
                <div class="relative">
                    <button onclick="document.getElementById('dropdown').classList.toggle('hidden')" 
                            class="flex items-center space-x-2 hover:text-gray-300 focus:outline-none">
                        <img class="h-8 w-8 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}" alt="Profile">
                        <span>{{ Auth::user()->name ?? 'Guest' }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="dropdown" class="hidden absolute right-0 mt-2 w-40 bg-white text-black rounded shadow-lg">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</div>

<script>
    // Dropdown toggle
    function toggleDropdown() {
        document.getElementById('dropdown').classList.toggle('hidden');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('dropdown');
        const profileButton = document.querySelector('.relative button');
        if (!dropdown.classList.contains('hidden') && !dropdown.contains(event.target) && !profileButton.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
