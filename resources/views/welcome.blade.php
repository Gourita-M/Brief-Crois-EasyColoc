<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ColocManager - Manage Your Shared Housing Easily</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .slide-up {
            animation: slideUp 0.8s ease-out;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-white text-gray-900 overflow-x-hidden">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-2 cursor-pointer" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
                    <div class="w-8 h-8 gradient-bg rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold gradient-text">ColocManager</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="text-gray-600 hover:text-indigo-600 font-medium transition-colors">Features</a>
                    <a href="#how-it-works" class="text-gray-600 hover:text-indigo-600 font-medium transition-colors">How It Works</a>
                    <a href="#pricing" class="text-gray-600 hover:text-indigo-600 font-medium transition-colors">Pricing</a>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Log In</a>
                    <a href="#" class="px-5 py-2.5 gradient-bg text-white rounded-full font-medium hover:opacity-90 transition-all transform hover:scale-105 shadow-lg shadow-indigo-500/30">
                        Get Started Free
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button onclick="toggleMobileMenu()" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-100">
            <div class="px-4 pt-2 pb-6 space-y-1">
                <a href="#features" class="block px-3 py-2 text-gray-600 hover:text-indigo-600 font-medium">Features</a>
                <a href="#how-it-works" class="block px-3 py-2 text-gray-600 hover:text-indigo-600 font-medium">How It Works</a>
                <a href="#pricing" class="block px-3 py-2 text-gray-600 hover:text-indigo-600 font-medium">Pricing</a>
                <div class="pt-4 space-y-2">
                    <a href="#" class="block w-full text-center px-3 py-2 text-gray-600 font-medium">Log In</a>
                    <a href="#" class="block w-full text-center px-3 py-2 gradient-bg text-white rounded-lg font-medium">Get Started Free</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-40 lg:pb-32 overflow-hidden">
        <div class="absolute inset-0 gradient-bg hero-pattern"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-white/10"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Hero Content -->
                <div class="text-center lg:text-left slide-up">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white text-sm font-medium mb-6">
                        <span class="flex h-2 w-2 rounded-full bg-green-400 mr-2"></span>
                        New: Reputation system now available
                    </div>
                    <h1 class="text-4xl lg:text-6xl font-bold text-white leading-tight mb-6">
                        Shared housing without the 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-pink-300">stress</span>
                    </h1>
                    <p class="text-lg lg:text-xl text-indigo-100 mb-8 max-w-2xl mx-auto lg:mx-0">
                        Manage shared expenses, automatically calculate balances, and keep harmony in your shared home. Simple, fast, and free.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="Accommodation" class="px-8 py-4 bg-white text-indigo-600 rounded-full font-bold text-lg hover:bg-gray-50 transition-all transform hover:scale-105 shadow-xl">
                            Create My Shared Home
                        </a>
                        <a href="Accommodation" class="px-8 py-4 bg-white text-indigo-600 rounded-full font-bold text-lg hover:bg-gray-50 transition-all transform hover:scale-105 shadow-xl">
                            Join A Shared Home
                        </a>
                    </div>
                    
                    <!-- Social Proof -->
                    <div class="mt-10 flex items-center justify-center lg:justify-start space-x-4 text-indigo-100 text-sm">
                        <div class="flex -space-x-2">
                            <img class="w-8 h-8 rounded-full border-2 border-indigo-600" src="https://ui-avatars.com/api/?name=Alice&background=random" alt="">
                            <img class="w-8 h-8 rounded-full border-2 border-indigo-600" src="https://ui-avatars.com/api/?name=Bob&background=random" alt="">
                            <img class="w-8 h-8 rounded-full border-2 border-indigo-600" src="https://ui-avatars.com/api/?name=Charlie&background=random" alt="">
                            <img class="w-8 h-8 rounded-full border-2 border-indigo-600" src="https://ui-avatars.com/api/?name=David&background=random" alt="">
                        </div>
                        <p>Joined by <strong class="text-white">10,000+</strong> roommates</p>
                    </div>
                </div>

                <!-- Hero Illustration/App Preview -->
                <div class="relative float-animation hidden lg:block">
                    <div class="relative bg-white rounded-2xl shadow-2xl p-6 transform rotate-2 hover:rotate-0 transition-transform duration-500">
                        <div class="flex items-center justify-between mb-6 border-b border-gray-100 pb-4">
                            <div>
                                <h3 class="font-bold text-gray-900">Downtown Apartment</h3>
                                <p class="text-sm text-gray-500">4 members</p>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span>
                        </div>
                        
                        <!-- Mock Expense Item -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">February Rent</p>
                                        <p class="text-xs text-gray-500">Paid by Thomas</p>
                                    </div>
                                </div>
                                <span class="font-bold text-gray-900">$1,200</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Grocery Shopping</p>
                                        <p class="text-xs text-gray-500">Paid by Marie</p>
                                    </div>
                                </div>
                                <span class="font-bold text-gray-900">$85</span>
                            </div>

                            <!-- Balance Summary -->
                            <div class="mt-6 p-4 gradient-bg rounded-xl text-white">
                                <p class="text-sm opacity-90 mb-2">Your balance</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-2xl font-bold">+$45</span>
                                    <span class="text-sm opacity-90">You're owed money</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating elements -->
                    <div class="absolute -top-6 -right-6 bg-white p-4 rounded-xl shadow-lg transform rotate-12 animate-pulse">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            <span class="text-sm font-medium text-gray-700">Payment received</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-gray-50 border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-3xl font-bold gradient-text mb-1">50k+</div>
                    <div class="text-sm text-gray-600">Expenses managed</div>
                </div>
                <div>
                    <div class="text-3xl font-bold gradient-text mb-1">10k+</div>
                    <div class="text-sm text-gray-600">Active roommates</div>
                </div>
                <div>
                    <div class="text-3xl font-bold gradient-text mb-1">$2M+</div>
                    <div class="text-sm text-gray-600">Transactions processed</div>
                </div>
                <div>
                    <div class="text-3xl font-bold gradient-text mb-1">4.9/5</div>
                    <div class="text-sm text-gray-600">Average rating</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 lg:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Everything you need for peaceful shared housing</h2>
                <p class="text-lg text-gray-600">No more arguments about money. Manage your shared expenses with complete transparency.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card bg-white p-8 rounded-2xl border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Automatic Calculation</h3>
                    <p class="text-gray-600 leading-relaxed">Balances are calculated automatically. Instantly see who owes what to whom without any hassle.</p>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card bg-white p-8 rounded-2xl border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Simplified Payments</h3>
                    <p class="text-gray-600 leading-relaxed">Mark payments as completed with one click. Complete and transparent history for everyone.</p>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card bg-white p-8 rounded-2xl border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Smart Categories</h3>
                    <p class="text-gray-600 leading-relaxed">Organize expenses by categories (rent, groceries, bills...) and view your monthly statistics.</p>
                </div>

                <!-- Feature 4 -->
                <div class="feature-card bg-white p-8 rounded-2xl border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Reputation System</h3>
                    <p class="text-gray-600 leading-relaxed">Encourage good financial behavior with a reputation system based on timely payments.</p>
                </div>

                <!-- Feature 5 -->
                <div class="feature-card bg-white p-8 rounded-2xl border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-pink-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Secure & Private</h3>
                    <p class="text-gray-600 leading-relaxed">Your financial data is encrypted and secure. Only your roommates have access to it.</p>
                </div>

                <!-- Feature 6 -->
                <div class="feature-card bg-white p-8 rounded-2xl border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Email Invitations</h3>
                    <p class="text-gray-600 leading-relaxed">Invite your roommates easily by email. They join your shared space in just a few clicks.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How it Works -->
    <section id="how-it-works" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">How does it work?</h2>
                <p class="text-lg text-gray-600">Start managing your shared housing in 3 simple steps.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 relative">
                <!-- Connecting line -->
                <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-gray-200 -translate-y-1/2 z-0"></div>

                <!-- Step 1 -->
                <div class="relative z-10 bg-white p-8 rounded-2xl shadow-lg text-center">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6 shadow-lg">1</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Create Your Shared Home</h3>
                    <p class="text-gray-600">Sign up for free and create your shared housing in seconds. Set the name, address, and preferences.</p>
                </div>

                <!-- Step 2 -->
                <div class="relative z-10 bg-white p-8 rounded-2xl shadow-lg text-center">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6 shadow-lg">2</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Invite Your Roommates</h3>
                    <p class="text-gray-600">Send email invitations to your roommates. They automatically join the shared space.</p>
                </div>

                <!-- Step 3 -->
                <div class="relative z-10 bg-white p-8 rounded-2xl shadow-lg text-center">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6 shadow-lg">3</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Add Your Expenses</h3>
                    <p class="text-gray-600">Start adding expenses. Balance calculations are automatic so you know who owes what.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">They use ColocManager</h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <div class="flex items-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=Sarah+L&background=random" alt="" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Sarah L.</h4>
                            <p class="text-sm text-gray-500">Student in New York</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"No more arguments about who owes money to whom! The app is super intuitive and the automatic calculation saves us so much time."</p>
                    <div class="flex text-yellow-400 mt-4">★★★★★</div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <div class="flex items-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=Thomas+M&background=random" alt="" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Thomas M.</h4>
                            <p class="text-sm text-gray-500">Young professional in Austin</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"I've been managing a 4-person shared home for 6 months. The reputation system motivates everyone to pay on time. Excellent!"</p>
                    <div class="flex text-yellow-400 mt-4">★★★★★</div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <div class="flex items-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=Emma+R&background=random" alt="" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Emma R.</h4>
                            <p class="text-sm text-gray-500">Shared housing in Seattle</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Simple, effective, and free. I love being able to see monthly statistics and know exactly where our money is going."</p>
                    <div class="flex text-yellow-400 mt-4">★★★★★</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="gradient-bg rounded-3xl p-8 md:p-16 text-center text-white relative overflow-hidden">
                <div class="absolute inset-0 hero-pattern opacity-20"></div>
                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to simplify your shared housing?</h2>
                    <p class="text-xl text-indigo-100 mb-8 max-w-2xl mx-auto">Join thousands of roommates managing their expenses stress-free. It's free and takes 2 minutes.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#" class="px-8 py-4 bg-white text-indigo-600 rounded-full font-bold text-lg hover:bg-gray-50 transition-all transform hover:scale-105 shadow-xl">
                            Create My Free Shared Home
                        </a>
                        <a href="#" class="px-8 py-4 border-2 border-white text-white rounded-full font-bold text-lg hover:bg-white/10 transition-all">
                            Learn More
                        </a>
                    </div>
                    <p class="mt-6 text-sm text-indigo-200">No commitment • Free • Responsive support</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-12">
                <div class="col-span-2 md:col-span-1">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold">ColocManager</span>
                    </div>
                    <p class="text-gray-400 text-sm">The simple and free solution for managing shared housing expenses.</p>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Product</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Features</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Pricing</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Security</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Roadmap</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Resources</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Guides</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">API</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Privacy</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Terms</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Cookies</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Legal Notice</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">© 2024 ColocManager. All rights reserved.</p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 10) {
                navbar.classList.add('shadow-md');
            } else {
                navbar.classList.remove('shadow-md');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Close mobile menu if open
                    document.getElementById('mobileMenu').classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>