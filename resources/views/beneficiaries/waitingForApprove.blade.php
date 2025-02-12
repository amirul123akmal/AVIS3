<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Waiting Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex items-center justify-center min-h-screen bg-radial-erin">

    <div class="bg-white shadow-md rounded-lg p-12 max-w-md w-full ">
        <h1 class="text-2xl font-semibold text-center mb-4">Waiting for Approval</h1>
        <p class="text-gray-600 text-center mb-6">
            Thank you for your submission. Your request is currently under review.
            Please check back later for updates.
        </p>
        {{-- <div class="flex justify-center mb-4">
            <div class="w-16 h-16 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
        </div> --}}

        <div class="text-center">
            <a class="btn bg-purple-300 text-white" href="{{ url()->current() }}">Refresh Status</a>
        </div>
    </div>

</body>

</html>
