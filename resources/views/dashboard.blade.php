<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <nav class="glass-effect w-full z-50 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo - Links to Home -->
                <a href="/" class="flex items-center space-x-2 hover:opacity-80 transition">
                    <div class="w-8 h-8 gradient-bg rounded-lg flex items-center justify-center">
                        <i data-lucide="home" class="w-5 h-5 text-white"></i>
                    </div>
                    <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">EasyColoc</span>
                </a>

                <!-- Right Side -->
                <div class="flex items-center space-x-4">


                    <div class="relative inline-block">

                        <!-- Button -->
                        <button id="notifBtn"
                            class="relative p-2 text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition">

                            <!-- Bell SVG (no lucide needed) -->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405C18.21 15.21 18 14.7 18 14.172V11a6 6 0 10-12 0v3.172c0 .528-.21 1.038-.595 1.423L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>

                            <!-- Red Dot -->
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                        </button>

                        <!-- Dropdown -->
                        <div id="notifDropdown"
                            class="absolute right-0 mt-3 w-72 bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden
                transform scale-y-0 origin-top transition-transform duration-300 ease-out">

                            <div class="p-4 font-semibold border-b">
                                Notifications
                            </div>

                            <ul class="divide-y">
                                <li class="p-4 hover:bg-slate-50 cursor-pointer">
                                    New user registered
                                </li>
                                <li class="p-4 hover:bg-slate-50 cursor-pointer">
                                    Payment received
                                </li>
                                <li class="p-4 hover:bg-slate-50 cursor-pointer">
                                    Reputation updated
                                </li>
                            </ul>

                        </div>
                    </div>

                    <!-- User Profile Dropdown -->
                    <div class="relative" id="userDropdown">
                        <button
                            onclick="toggleDropdown()"
                            class="flex items-center gap-3 pl-4 pr-3 py-2 
               border-l border-slate-200
               hover:bg-slate-100 
               rounded-xl 
               transition-all duration-200
               group">

                            <!-- Avatar Circle -->
                            <div class="w-9 h-9 rounded-full bg-indigo-500 text-white 
                    flex items-center justify-center 
                    font-semibold text-sm shadow-sm">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>

                            <!-- Name -->
                            <div class="hidden sm:flex flex-col text-left">
                                <p class="text-sm font-semibold text-slate-700 group-hover:text-indigo-600 transition">
                                    {{ auth()->user()->name }}
                                </p>
                                <p class="text-xs text-slate-400">
                                    Account
                                </p>
                            </div>

                            <i data-lucide="chevron-down"
                                class="w-4 h-4 text-slate-400 transition-transform duration-200 group-hover:rotate-180">
                            </i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div id="dropdownMenu"
                            class="hidden absolute right-0 mt-3 w-56 
                bg-white rounded-2xl 
                shadow-xl border border-slate-100 
                py-2 z-50
                backdrop-blur-sm">

                            <!-- User Info -->
                            <div class="px-4 py-3 border-b border-slate-100">
                                <p class="text-sm font-semibold text-slate-700">
                                    {{ auth()->user()->name }}
                                </p>
                                <p class="text-xs text-slate-500 truncate">
                                    {{ auth()->user()->email }}
                                </p>
                            </div>

                            <!-- Profile -->
                            <a href="/user/profile"
                                class="flex items-center px-4 py-2.5 text-sm 
                  text-slate-700 hover:bg-slate-100 
                  transition-all duration-200 rounded-lg mx-2">
                                <i data-lucide="user" class="w-4 h-4 mr-3 text-slate-400"></i>
                                Profile
                            </a>

                            <!-- Logout -->
                            <div class="mt-1 pt-1 border-t border-slate-100">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex items-center px-4 py-2.5 text-sm 
                               text-red-600 hover:bg-red-50 
                               transition-all duration-200 rounded-lg mx-2">
                                        <i data-lucide="log-out" class="w-4 h-4 mr-3 text-red-500"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Gradient Header -->
    <div class="bg-gradient-to-r from-indigo-500 to-purple-500 py-10 px-8 text-white">
        <h1 class="text-3xl font-bold">Admin Dashboard</h1>
        <p class="text-indigo-100 mt-2">Manage all platform users</p>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-6 py-10">

        <!-- Success Message -->
        <div class="mb-6 bg-green-500 text-white px-6 py-3 rounded-xl shadow-lg">
            User status updated successfully.
        </div>

        <!-- Users Table Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">

            <div class="px-6 py-5 border-b bg-gray-50">
                <h2 class="text-xl font-bold text-gray-800">
                    All Users (5)
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-100 text-gray-600 text-sm uppercase">
                        <tr>
                            <th class="px-6 py-4 text-left">User</th>
                            <th class="px-6 py-4 text-left">Email</th>
                            <th class="px-6 py-4 text-left">Status</th>
                            <th class="px-6 py-4 text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @foreach($users as $userz)
                        <!-- User Row Example 1 -->
                        <tr class="hover:bg-gray-50 transition">

                            <!-- User Info -->
                            <td class="px-6 py-4 flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-full bg-indigo-500 text-white flex items-center justify-center font-semibold">
                                    {{ strtoupper(substr($userz->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">{{$userz->name}}</p>
                                    <p class="text-xs text-gray-500">ID: {{$userz->id}}</p>
                                </div>
                            </td>

                            <!-- Email -->
                            <td class="px-6 py-4 text-gray-700">{{$userz->email}}</td>

                            <!-- Status -->
                            @if(!$userz->is_banned)
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-sm bg-green-100 text-green-600 rounded-full font-medium">
                                    Active
                                </span>
                            </td>
                            @else
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-sm bg-red-100 text-red-600 rounded-full font-medium">
                                    Banned
                                </span>
                            </td>
                            @endif
                            <!-- Action -->
                            <td class="px-6 py-4 text-center">
                                @if(!$userz->is_banned)

                                <!-- BAN FORM -->
                                <form action="{{ Route('ban.user') }}" method="POST">
                                    @csrf

                                    <input name="user_id" hidden value="{{$userz->id}}" type="text">
                                    
                                    <button
                                        type="submit"
                                        class="px-4 py-2 bg-red-500 text-white rounded-xl 
                                        hover:bg-red-600 transition shadow-md">
                                        Ban
                                    </button>
                                </form>

                                @else

                                <!-- UNBAN FORM -->
                                <form action="{{ Route('unban.user') }}" method="POST">
                                    @csrf

                                     <input name="user_id" hidden value="{{$userz->id}}" type="text">
                                    
                                    <button
                                        type="submit"
                                        class="px-4 py-2 bg-green-500 text-white rounded-xl 
                                        hover:bg-green-600 transition shadow-md">
                                        Unban
                                    </button>
                                </form>

                                @endif
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>

    @if(session('success'))
  <div id="success-popup" class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 opacity-0 transition-opacity duration-500">
    ✅  {{session('success')}}
  </div>
  @endif

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Dropdown toggle function
        function toggleDropdown() {
            const menu = document.getElementById('dropdownMenu');
            menu.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('userDropdown');
            const menu = document.getElementById('dropdownMenu');

            if (!dropdown.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });

        // Modal functions
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Toast notification
        function showToast(message) {
            const toast = document.getElementById('toast');
            document.getElementById('toastMessage').textContent = message;
            toast.classList.remove('translate-y-20', 'opacity-0');
            setTimeout(() => {
                toast.classList.add('translate-y-20', 'opacity-0');
            }, 3000);
        }

        // Close modals on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeModal('createColocModal');
                closeModal('joinModal');
                closeModal('expenseModal');
                document.getElementById('dropdownMenu').classList.add('hidden');
            }
        });

        window.addEventListener('DOMContentLoaded', () => {
            const popup = document.getElementById('success-popup');

            // Show the popup
            popup.classList.remove('opacity-0');
            popup.classList.add('opacity-100');

            // Hide after 10 seconds
            setTimeout(() => {
                popup.classList.remove('opacity-100');
                popup.classList.add('opacity-0');
            }, 10000);
        });


 window.addEventListener('DOMContentLoaded', () => {
      const popup = document.getElementById('success-popup');

      // Show the popup
      popup.classList.remove('opacity-0');
      popup.classList.add('opacity-100');

      // Hide after 10 seconds
      setTimeout(() => {
        popup.classList.remove('opacity-100');
        popup.classList.add('opacity-0');
      }, 10000);
    });
    </script>
</body>

</html>