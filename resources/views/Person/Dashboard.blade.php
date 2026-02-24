<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoomMate - Shared Accommodation & Expense Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        },
                        success: {
                            500: '#10b981',
                            600: '#059669',
                        },
                        danger: {
                            500: '#ef4444',
                            600: '#dc2626',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <!-- Navigation -->
    <nav class="glass-effect fixed w-full z-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="#" class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-primary-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <i data-lucide="home" class="w-5 h-5 text-white"></i>
                        </div>
                        <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary-600 to-purple-600">RoomMate</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#dashboard" class="text-gray-600 hover:text-primary-600 font-medium transition">Dashboard</a>
                    <a href="#expenses" class="text-gray-600 hover:text-primary-600 font-medium transition">Expenses</a>
                    <a href="#balances" class="text-gray-600 hover:text-primary-600 font-medium transition">Balances</a>
                    <a href="#members" class="text-gray-600 hover:text-primary-600 font-medium transition">Members</a>
                </div>

                <div class="flex items-center space-x-4">
                    <button class="relative p-2 text-gray-600 hover:text-primary-600 transition">
                        <i data-lucide="bell" class="w-5 h-5"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <div class="relative group">
                        <button class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100 transition">
                            <img src="https://i.pravatar.cc/150?img=11" alt="User" class="w-8 h-8 rounded-full border-2 border-primary-500">
                            <span class="hidden md:block font-medium text-sm">John Doe</span>
                            <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-right">
                            <a href="#profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 first:rounded-t-xl">Profile</a>
                            <a href="#settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings</a>
                            <hr class="border-gray-100">
                            <a href="#logout" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-b-xl">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20 pb-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Sunset Apartment</h1>
                    <p class="text-gray-500 mt-1">Active since January 2024 • 4 members</p>
                </div>
                <div class="flex gap-3">
                    <button onclick="openModal('inviteModal')" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition shadow-lg shadow-primary-500/30">
                        <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i>
                        Invite Member
                    </button>
                    <button onclick="openModal('expenseModal')" class="inline-flex items-center px-4 py-2 bg-success-600 text-white rounded-lg hover:bg-success-700 transition shadow-lg shadow-success-500/30">
                        <i data-lucide="plus-circle" class="w-4 h-4 mr-2"></i>
                        Add Expense
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 card-hover">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-primary-100 rounded-xl">
                        <i data-lucide="wallet" class="w-6 h-6 text-primary-600"></i>
                    </div>
                    <span class="text-xs font-medium text-success-600 bg-success-50 px-2 py-1 rounded-full">+12%</span>
                </div>
                <p class="text-sm text-gray-500 mb-1">Total Expenses</p>
                <p class="text-2xl font-bold text-gray-900">$2,450.00</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 card-hover">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-purple-100 rounded-xl">
                        <i data-lucide="scale" class="w-6 h-6 text-purple-600"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-600 bg-gray-100 px-2 py-1 rounded-full">This Month</span>
                </div>
                <p class="text-sm text-gray-500 mb-1">Your Balance</p>
                <p class="text-2xl font-bold text-success-600">+$125.50</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 card-hover">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-orange-100 rounded-xl">
                        <i data-lucide="clock" class="w-6 h-6 text-orange-600"></i>
                    </div>
                    <span class="text-xs font-medium text-danger-600 bg-danger-50 px-2 py-1 rounded-full">3 pending</span>
                </div>
                <p class="text-sm text-gray-500 mb-1">Pending Payments</p>
                <p class="text-2xl font-bold text-gray-900">$340.00</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 card-hover">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-green-100 rounded-xl">
                        <i data-lucide="star" class="w-6 h-6 text-green-600"></i>
                    </div>
                    <span class="text-xs font-medium text-success-600 bg-success-50 px-2 py-1 rounded-full">Good</span>
                </div>
                <p class="text-sm text-gray-500 mb-1">Reputation Score</p>
                <p class="text-2xl font-bold text-gray-900">+24</p>
            </div>
        </div>

        <!-- Main Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Column: Expenses -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Filters -->
                <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex-1 min-w-[200px]">
                            <div class="relative">
                                <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4"></i>
                                <input type="text" placeholder="Search expenses..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition">
                            </div>
                        </div>
                        <select class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none bg-white">
                            <option>All Categories</option>
                            <option>Rent & Utilities</option>
                            <option>Groceries</option>
                            <option>Household</option>
                            <option>Entertainment</option>
                        </select>
                        <select class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none bg-white">
                            <option>February 2024</option>
                            <option>January 2024</option>
                            <option>December 2023</option>
                        </select>
                    </div>
                </div>

                <!-- Expenses List -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h2 class="text-lg font-bold text-gray-900">Recent Expenses</h2>
                        <button class="text-primary-600 hover:text-primary-700 text-sm font-medium">View All</button>
                    </div>
                    
                    <div class="divide-y divide-gray-100">
                        <!-- Expense Item 1 -->
                        <div class="p-6 hover:bg-gray-50 transition group">
                            <div class="flex items-start justify-between">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="home" class="w-6 h-6 text-blue-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 group-hover:text-primary-600 transition">Monthly Rent</h3>
                                        <p class="text-sm text-gray-500 mt-1">Paid by <span class="font-medium text-gray-700">You</span> • Feb 1, 2024</p>
                                        <div class="flex items-center mt-2 space-x-2">
                                            <span class="px-2 py-1 bg-blue-50 text-blue-700 text-xs rounded-md font-medium">Rent & Utilities</span>
                                            <span class="text-xs text-gray-400">Split equally</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-bold text-gray-900">$1,200.00</p>
                                    <p class="text-sm text-success-600 font-medium mt-1">You lent $900.00</p>
                                </div>
                            </div>
                        </div>

                        <!-- Expense Item 2 -->
                        <div class="p-6 hover:bg-gray-50 transition group">
                            <div class="flex items-start justify-between">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="shopping-cart" class="w-6 h-6 text-green-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 group-hover:text-primary-600 transition">Grocery Shopping</h3>
                                        <p class="text-sm text-gray-500 mt-1">Paid by <span class="font-medium text-gray-700">Sarah Miller</span> • Feb 15, 2024</p>
                                        <div class="flex items-center mt-2 space-x-2">
                                            <span class="px-2 py-1 bg-green-50 text-green-700 text-xs rounded-md font-medium">Groceries</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-bold text-gray-900">$156.40</p>
                                    <p class="text-sm text-danger-600 font-medium mt-1">You owe $39.10</p>
                                </div>
                            </div>
                        </div>

                        <!-- Expense Item 3 -->
                        <div class="p-6 hover:bg-gray-50 transition group">
                            <div class="flex items-start justify-between">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="zap" class="w-6 h-6 text-purple-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 group-hover:text-primary-600 transition">Electricity Bill</h3>
                                        <p class="text-sm text-gray-500 mt-1">Paid by <span class="font-medium text-gray-700">Mike Johnson</span> • Feb 10, 2024</p>
                                        <div class="flex items-center mt-2 space-x-2">
                                            <span class="px-2 py-1 bg-purple-50 text-purple-700 text-xs rounded-md font-medium">Utilities</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-bold text-gray-900">$89.50</p>
                                    <p class="text-sm text-danger-600 font-medium mt-1">You owe $22.38</p>
                                </div>
                            </div>
                        </div>

                        <!-- Expense Item 4 -->
                        <div class="p-6 hover:bg-gray-50 transition group">
                            <div class="flex items-start justify-between">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="tv" class="w-6 h-6 text-orange-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 group-hover:text-primary-600 transition">Netflix Subscription</h3>
                                        <p class="text-sm text-gray-500 mt-1">Paid by <span class="font-medium text-gray-700">Emma Wilson</span> • Feb 5, 2024</p>
                                        <div class="flex items-center mt-2 space-x-2">
                                            <span class="px-2 py-1 bg-orange-50 text-orange-700 text-xs rounded-md font-medium">Entertainment</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-bold text-gray-900">$15.99</p>
                                    <p class="text-sm text-success-600 font-medium mt-1">Settled</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Chart Placeholder -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Spending Overview</h2>
                    <div class="h-64 bg-gray-50 rounded-xl flex items-center justify-center border-2 border-dashed border-gray-200">
                        <div class="text-center">
                            <i data-lucide="bar-chart-3" class="w-12 h-12 text-gray-300 mx-auto mb-2"></i>
                            <p class="text-gray-400">Chart Component Placeholder</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Balances & Members -->
            <div class="space-y-6">
                
                <!-- Simplified Debts -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-lg font-bold text-gray-900">Settle Up</h2>
                        <p class="text-sm text-gray-500 mt-1">Simplified debts</p>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <!-- You are owed -->
                        <div class="bg-success-50 rounded-xl p-4 border border-success-100">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-success-800">You are owed</span>
                                <span class="text-lg font-bold text-success-700">$180.00</span>
                            </div>
                            <div class="space-y-2">
                                <div class="flex justify-between items-center text-sm">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://i.pravatar.cc/150?img=5" class="w-6 h-6 rounded-full">
                                        <span class="text-gray-700">Sarah Miller</span>
                                    </div>
                                    <span class="font-medium text-success-700">$39.10</span>
                                </div>
                                <div class="flex justify-between items-center text-sm">
                                    <div class="flex items-center space-x-2">
                                        <img src="https://i.pravatar.cc/150?img=3" class="w-6 h-6 rounded-full">
                                        <span class="text-gray-700">Mike Johnson</span>
                                    </div>
                                    <span class="font-medium text-success-700">$22.38</span>
                                </div>
                            </div>
                        </div>

                        <!-- You owe -->
                        <div class="bg-danger-50 rounded-xl p-4 border border-danger-100">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-danger-800">You owe</span>
                                <span class="text-lg font-bold text-danger-700">$0.00</span>
                            </div>
                            <p class="text-sm text-danger-600">All caught up! 🎉</p>
                        </div>

                        <button class="w-full py-2 border-2 border-gray-200 rounded-lg text-gray-600 font-medium hover:border-primary-500 hover:text-primary-600 transition">
                            View Detailed Breakdown
                        </button>
                    </div>
                </div>

                <!-- Members List -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h2 class="text-lg font-bold text-gray-900">Members</h2>
                        <span class="text-xs bg-primary-100 text-primary-700 px-2 py-1 rounded-full">4 Active</span>
                    </div>
                    
                    <div class="divide-y divide-gray-100">
                        <!-- Member 1 -->
                        <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition">
                            <div class="flex items-center space-x-3">
                                <div class="relative">
                                    <img src="https://i.pravatar.cc/150?img=11" class="w-10 h-10 rounded-full border-2 border-primary-500">
                                    <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-primary-500 rounded-full flex items-center justify-center border-2 border-white">
                                        <i data-lucide="crown" class="w-2.5 h-2.5 text-white fill-current"></i>
                                    </div>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">You</p>
                                    <p class="text-xs text-primary-600 font-medium">Owner</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="flex items-center text-success-600 text-sm font-medium">
                                    <i data-lucide="trending-up" class="w-3 h-3 mr-1"></i>
                                    +24
                                </div>
                            </div>
                        </div>

                        <!-- Member 2 -->
                        <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition">
                            <div class="flex items-center space-x-3">
                                <img src="https://i.pravatar.cc/150?img=5" class="w-10 h-10 rounded-full border-2 border-green-400">
                                <div>
                                    <p class="font-medium text-gray-900">Sarah Miller</p>
                                    <p class="text-xs text-gray-500">Member</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="flex items-center text-success-600 text-sm font-medium">
                                    <i data-lucide="trending-up" class="w-3 h-3 mr-1"></i>
                                    +18
                                </div>
                            </div>
                        </div>

                        <!-- Member 3 -->
                        <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition">
                            <div class="flex items-center space-x-3">
                                <img src="https://i.pravatar.cc/150?img=3" class="w-10 h-10 rounded-full border-2 border-yellow-400">
                                <div>
                                    <p class="font-medium text-gray-900">Mike Johnson</p>
                                    <p class="text-xs text-gray-500">Member</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="flex items-center text-success-600 text-sm font-medium">
                                    <i data-lucide="trending-up" class="w-3 h-3 mr-1"></i>
                                    +12
                                </div>
                            </div>
                        </div>

                        <!-- Member 4 -->
                        <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition">
                            <div class="flex items-center space-x-3">
                                <img src="https://i.pravatar.cc/150?img=9" class="w-10 h-10 rounded-full border-2 border-gray-300">
                                <div>
                                    <p class="font-medium text-gray-900">Emma Wilson</p>
                                    <p class="text-xs text-gray-500">Member</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="flex items-center text-gray-600 text-sm font-medium">
                                    <i data-lucide="minus" class="w-3 h-3 mr-1"></i>
                                    0
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-gradient-to-br from-primary-500 to-purple-600 rounded-2xl p-6 text-white">
                    <h3 class="font-bold text-lg mb-2">Need to leave?</h3>
                    <p class="text-primary-100 text-sm mb-4">Settle all your debts before leaving the shared accommodation.</p>
                    <button class="w-full py-2 bg-white/20 hover:bg-white/30 rounded-lg text-sm font-medium transition backdrop-blur-sm">
                        Leave Colocation
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- Add Expense Modal -->
    <div id="expenseModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeModal('expenseModal')"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto transform transition-all scale-100">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center sticky top-0 bg-white">
                    <h2 class="text-xl font-bold text-gray-900">Add New Expense</h2>
                    <button onclick="closeModal('expenseModal')" class="p-2 hover:bg-gray-100 rounded-lg transition">
                        <i data-lucide="x" class="w-5 h-5 text-gray-500"></i>
                    </button>
                </div>
                
                <form class="p-6 space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <input type="text" placeholder="e.g., Grocery shopping" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Amount</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">$</span>
                                <input type="number" step="0.01" placeholder="0.00" class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                            <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <div class="grid grid-cols-3 gap-2">
                            <label class="cursor-pointer">
                                <input type="radio" name="category" class="peer sr-only" checked>
                                <div class="p-3 rounded-lg border-2 border-gray-200 peer-checked:border-primary-500 peer-checked:bg-primary-50 text-center transition hover:border-primary-300">
                                    <i data-lucide="home" class="w-5 h-5 mx-auto mb-1 text-gray-600 peer-checked:text-primary-600"></i>
                                    <span class="text-xs font-medium text-gray-700">Rent</span>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="category" class="peer sr-only">
                                <div class="p-3 rounded-lg border-2 border-gray-200 peer-checked:border-primary-500 peer-checked:bg-primary-50 text-center transition hover:border-primary-300">
                                    <i data-lucide="shopping-cart" class="w-5 h-5 mx-auto mb-1 text-gray-600 peer-checked:text-primary-600"></i>
                                    <span class="text-xs font-medium text-gray-700">Grocery</span>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="category" class="peer sr-only">
                                <div class="p-3 rounded-lg border-2 border-gray-200 peer-checked:border-primary-500 peer-checked:bg-primary-50 text-center transition hover:border-primary-300">
                                    <i data-lucide="zap" class="w-5 h-5 mx-auto mb-1 text-gray-600 peer-checked:text-primary-600"></i>
                                    <span class="text-xs font-medium text-gray-700">Utilities</span>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="category" class="peer sr-only">
                                <div class="p-3 rounded-lg border-2 border-gray-200 peer-checked:border-primary-500 peer-checked:bg-primary-50 text-center transition hover:border-primary-300">
                                    <i data-lucide="tv" class="w-5 h-5 mx-auto mb-1 text-gray-600 peer-checked:text-primary-600"></i>
                                    <span class="text-xs font-medium text-gray-700">Entertainment</span>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="category" class="peer sr-only">
                                <div class="p-3 rounded-lg border-2 border-gray-200 peer-checked:border-primary-500 peer-checked:bg-primary-50 text-center transition hover:border-primary-300">
                                    <i data-lucide="more-horizontal" class="w-5 h-5 mx-auto mb-1 text-gray-600 peer-checked:text-primary-600"></i>
                                    <span class="text-xs font-medium text-gray-700">Other</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Paid by</label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition">
                            <option>You</option>
                            <option>Sarah Miller</option>
                            <option>Mike Johnson</option>
                            <option>Emma Wilson</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Split Method</label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition">
                            <option>Equally among all members</option>
                            <option>By percentage</option>
                            <option>By exact amount</option>
                            <option>Custom split</option>
                        </select>
                    </div>

                    <div class="pt-4 flex space-x-3">
                        <button type="button" onclick="closeModal('expenseModal')" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition">Cancel</button>
                        <button type="submit" class="flex-1 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 font-medium transition shadow-lg shadow-primary-500/30">Add Expense</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Invite Modal -->
    <div id="inviteModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeModal('inviteModal')"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md transform transition-all scale-100">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-gray-900">Invite Member</h2>
                    <p class="text-sm text-gray-500 mt-1">Send an invitation link via email</p>
                </div>
                
                <form class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" placeholder="friend@example.com" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition">
                    </div>
                    
                    <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
                        <div class="flex items-start space-x-3">
                            <i data-lucide="info" class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5"></i>
                            <p class="text-sm text-blue-800">An invitation token will be generated and sent to this email. The recipient must use this email to register.</p>
                        </div>
                    </div>

                    <div class="pt-4 flex space-x-3">
                        <button type="button" onclick="closeModal('inviteModal')" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition">Cancel</button>
                        <button type="submit" class="flex-1 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 font-medium transition shadow-lg shadow-primary-500/30">Send Invite</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-4 right-4 transform translate-y-20 opacity-0 transition-all duration-300 z-50">
        <div class="bg-gray-900 text-white px-6 py-3 rounded-lg shadow-lg flex items-center space-x-3">
            <i data-lucide="check-circle" class="w-5 h-5 text-green-400"></i>
            <span id="toastMessage">Operation successful</span>
        </div>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

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
                closeModal('expenseModal');
                closeModal('inviteModal');
            }
        });
    </script>
</body>
</html>