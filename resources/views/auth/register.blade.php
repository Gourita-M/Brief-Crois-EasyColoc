<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ColocManager</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>

<body class="min-h-screen gradient-bg hero-pattern flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-10">

        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Create Account 🚀
            </h1>
            <p class="text-gray-500 mt-2">
                Start managing your shared home today
            </p>
        </div>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg p-3">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Name
                </label>
                <input 
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    placeholder="Your full name"
                >
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>
                <input 
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="username"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    placeholder="you@example.com"
                >
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Password
                </label>
                <input 
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    placeholder="••••••••"
                >
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Confirm Password
                </label>
                <input 
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    placeholder="••••••••"
                >
            </div>

            <!-- Terms & Privacy -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="flex items-start space-x-2 text-sm">
                    <input 
                        type="checkbox"
                        name="terms"
                        id="terms"
                        required
                        class="mt-1 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                    >

                    <label for="terms" class="text-gray-600">
                        I agree to the
                        <a target="_blank" href="{{ route('terms.show') }}" class="text-indigo-600 font-medium hover:text-indigo-800">
                            Terms of Service
                        </a>
                        and
                        <a target="_blank" href="{{ route('policy.show') }}" class="text-indigo-600 font-medium hover:text-indigo-800">
                            Privacy Policy
                        </a>
                    </label>
                </div>
            @endif

            <!-- Submit -->
            <button 
                type="submit"
                class="w-full py-3 gradient-bg text-white rounded-xl font-semibold text-lg hover:opacity-90 transition-all transform hover:scale-[1.02] shadow-lg"
            >
                Register
            </button>
        </form>

        <!-- Login Link -->
        <div class="mt-6 text-center text-sm text-gray-500">
            Already registered?
            <a href="{{ route('login') }}" class="text-indigo-600 font-medium hover:text-indigo-800">
                Log in
            </a>
        </div>

    </div>

</body>
</html>