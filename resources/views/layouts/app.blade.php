<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Unilever') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .sidebar-spacing {
            margin-top: 1.5rem;
            margin-left: 1rem;
        }
        
        .main-content {
            margin-left: 0.5rem;
        }
        
        /* Ensure navbar spans full width */
        .full-width-navbar {
            width: 100%;
            border-radius: 0;
        }
        
        /* Add spacing between navbar and sidebar */
        .navbar-container {
            padding-bottom: 1rem;
        }
        
        /* Sidebar positioning */
        .sidebar-container {
            position: relative;
            z-index: 10;
        }
        
        /* Icon styles */
        .sidebar-icon {
            color: #6b46c1; /* Purple color for icons */
        }
        
        .sidebar-icon-active {
            color: #8c7db0; /* Less bright color for active icon */
        }
        
        .sidebar-bg {
            background-color: #b59ef3; /* Normal background color for inactive icons */
        }
        
        .sidebar-bg-active {
            background-color: #d2c7f0; /* Less bright background for active icon */
        }

        /* Rounded input fields with light borders */
        input[type="text"],
        input[type="email"],
        select {
            border: 1px solid #dcdcdc; /* light gray border instead of black */
            border-radius: 12px;        /* more curved shape */
            padding: 0.5rem 0.75rem;    /* adjust padding for comfort */
            outline: none;              /* remove focus outline */
            transition: border 0.2s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        select:focus {
            border-color: #a78bfa;      /* subtle purple on focus */
            box-shadow: 0 0 5px rgba(167,139,250,0.3);
        }

        /* Center Add button */
        form .mt-6 {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body class="font-sans antialiased bg-[#f0ebf8]">
    <div class="min-h-screen flex flex-col">
        <!-- Top Navbar - Full width -->
        <header class="bg-[#d2c7f0] text-black full-width-navbar">
            <div class="flex justify-between items-center px-6 py-4 shadow navbar-container">
                <!-- Left: Logo -->
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/unileverLogo.png') }}" alt="Unilever Logo" class="h-11 w-10">
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
                        <button onclick="toggleDropdown()" 
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
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex flex-1">
            <!-- Sidebar -->
            <div class="sidebar-container">
                <aside class="w-20 bg-[#d2c7f0] text-white flex flex-col items-center py-6 space-y-8 sidebar-spacing rounded-lg h-[calc(100vh-7rem)] self-start sticky top-24">
                    
                    <!-- Dashboard Icon -->
                    <a href="{{ route('dashboard') }}" 
                       class="p-3 rounded-lg {{ request()->routeIs('dashboard') ? 'sidebar-bg-active' : 'sidebar-bg' }}"
                       id="dashboard-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-8 w-8 {{ request()->routeIs('dashboard') ? 'sidebar-icon-active' : 'sidebar-icon' }}" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"/>
                        </svg>
                    </a>

                    <!-- Reports Icon (Document) -->
                    <a href="{{ route('departments') }}" 
                       class="p-3 rounded-lg {{ request()->is('departments*') ? 'sidebar-bg-active' : 'sidebar-bg' }}"
                       id="departments-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-8 w-8 {{ request()->is('departments*') ? 'sidebar-icon-active' : 'sidebar-icon' }}" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 7h5l2 2h11v9a2 2 0 01-2 2H3V7z"/>
                        </svg>
                    </a>

                    <!-- Add User Icon -->
                    <a href="{{ route('users.create') }}" 
                       class="p-3 rounded-lg {{ request()->routeIs('users.create') ? 'sidebar-bg-active' : 'sidebar-bg' }}"
                       id="user-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="h-8 w-8 {{ request()->routeIs('users.create') ? 'sidebar-icon-active' : 'sidebar-icon' }}" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M19 8v6m3-3h-6"/>
                        </svg>
                    </a>

                </aside>
            </div>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col main-content">
                <main class="flex-1 p-8">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    }
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('dropdown');
        const profileButton = document.querySelector('.relative button');
        
        if (!dropdown.classList.contains('hidden') && 
            !dropdown.contains(event.target) && 
            !profileButton.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
    
    // Handle sidebar icon clicks
    document.addEventListener('DOMContentLoaded', function() {
        const dashboardIcon = document.getElementById('dashboard-icon');
        const userIcon = document.getElementById('user-icon');
        const departmentsIcon = document.getElementById('departments-icon'); // ✅ fixed name
        
        function setAllIconsInactive() {
            dashboardIcon.classList.remove('sidebar-bg-active');
            dashboardIcon.classList.add('sidebar-bg');
            userIcon.classList.remove('sidebar-bg-active');
            userIcon.classList.add('sidebar-bg');
            departmentsIcon.classList.remove('sidebar-bg-active');
            departmentsIcon.classList.add('sidebar-bg');
            
            dashboardIcon.querySelector('svg').classList.remove('sidebar-icon-active');
            dashboardIcon.querySelector('svg').classList.add('sidebar-icon');
            userIcon.querySelector('svg').classList.remove('sidebar-icon-active');
            userIcon.querySelector('svg').classList.add('sidebar-icon');
            departmentsIcon.querySelector('svg').classList.remove('sidebar-icon-active');
            departmentsIcon.querySelector('svg').classList.add('sidebar-icon');
        }
        
        function setIconActive(iconElement) {
            setAllIconsInactive();
            iconElement.classList.remove('sidebar-bg');
            iconElement.classList.add('sidebar-bg-active');
            iconElement.querySelector('svg').classList.remove('sidebar-icon');
            iconElement.querySelector('svg').classList.add('sidebar-icon-active');
        }
        
        const currentRoute = window.location.pathname;
        
        if (currentRoute.includes('dashboard')) {
            setIconActive(dashboardIcon);
        } else if (currentRoute.includes('users/create')) {
            setIconActive(userIcon);
        } else if (currentRoute.includes('departments')) {
            setIconActive(departmentsIcon);
        }
        
        dashboardIcon.addEventListener('click', function() {
            setIconActive(dashboardIcon);
        });
        
        userIcon.addEventListener('click', function() {
            setIconActive(userIcon);
        });
        
        departmentsIcon.addEventListener('click', function() {
            setIconActive(departmentsIcon);
        });
    });
</script>

</body>
</html>