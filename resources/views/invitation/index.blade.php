<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invitation Response</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-50 flex items-center justify-center px-4">

    <div class="w-full max-w-lg bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">

        <!-- Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6 text-white text-center">
            <h1 class="text-2xl font-bold">You're Invited 🎉</h1>
            <p class="text-indigo-100 mt-1">Join a shared home on EasyColoc</p>
        </div>

        <!-- Content -->
        <div class="p-8 space-y-6">

            <!-- Home Info -->
            <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 text-center">
                <p class="text-sm text-gray-500">Home Name</p>
                <p class="text-lg font-semibold text-gray-900">{{$accommodationinfo->accomm}}</p>

                <p class="text-sm text-gray-500 mt-3">Invited by</p>
                <p class="font-medium text-gray-800">{{$accommodationinfo->name}}</p>
            </div>

            <!-- Message -->
            <div class="text-center">
                <p class="text-gray-600">
                    You have been invited to join this shared home.
                    Do you want to accept this invitation?
                </p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ Route('aprove.invite') }}" class="space-y-4">
            @csrf

                <input name="accommo_id" type="text" value="{{$accommodationinfo->id}}" hidden>
                <!-- Buttons -->
                <div class="flex gap-4">

                    <button type="submit" name="response" value="accept"
                        class="flex-1 py-3 bg-green-600 text-white rounded-xl font-semibold hover:bg-green-700 transition shadow-md">
                        Accept
                    </button>

                </div>

            </form>
             <form method="POST" action="{{ Route('decline.invite') }}" class="space-y-4">
            @csrf
                <!-- Buttons -->
                <div class="flex gap-4">

                    <button type="submit" name="response" value="decline"
                        class="flex-1 py-3 bg-red-600 text-white rounded-xl font-semibold hover:bg-red-700 transition shadow-md">
                        Decline
                    </button>

                </div>

            </form>

        </div>

        <!-- Footer -->
        <div class="bg-gray-50 text-center py-4 border-t text-sm text-gray-500">
            EasyColoc • Manage shared living easily
        </div>

    </div>

</body>
</html>