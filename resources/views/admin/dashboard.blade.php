<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard Activity</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-admin-sidebar>
        <x-admin-navbar />
        <div class="container mx-auto mt-3">
            <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-3">
                <div class="card transition-transform transform hover:scale-105 bg-gradient-to-r from-purple-400 to-purple-200 shadow-lg rounded-lg p-4">
                    <div class="card-body text-center">
                        <h1 class="text-3xl font-bold text-gray-800"> <span class="text-4xl text-red-600">{{ $volunteersCount }}</span></h1>
                        <p class="text-gray-600">Total Volunteers</p>
                    </div>
                </div>
                <div class="card transition-transform transform hover:scale-105 bg-gradient-to-r from-purple-400 to-purple-200 shadow-lg rounded-lg p-4">
                    <div class="card-body text-center">
                        <h1 class="text-3xl font-bold text-gray-800"> <span class="text-4xl text-red-600">{{ $beneficiariesCount }}</span></h1>
                        <p class="text-gray-600">Total Beneficiaries</p>
                    </div>
                </div>
                <div class="card transition-transform transform hover:scale-105 bg-gradient-to-r from-purple-400 to-purple-200 shadow-lg rounded-lg p-4">
                    <div class="card-body text-center">
                        <h1 class="text-3xl font-bold text-gray-800"> <span class="text-4xl text-red-600">{{ $awaitingResponse }}</span></h1>
                        <p class="text-gray-600">Beneficiaries to evaluate</p>
                    </div>
                </div>
            </section>
        <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div class="card bg-white shadow-lg rounded-lg p-4">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Top 5 Highest Volunteer in Activity </h2>
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b-2 border-gray-300 px-4 py-2 text-left">Activity Name</th>
                            <th class="border-b-2 border-gray-300 px-4 py-2 text-left">Volunteer Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topVolunteers as $volunteer)
                        <tr>
                            <td class="border-b border-gray-200 px-4 py-2">{{ $volunteer->activityName }}</td>
                            <td class="border-b border-gray-200 px-4 py-2">{{ $volunteer->volunteerCount }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card bg-white shadow-lg rounded-lg p-4">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Top 5 Highest Beneficiaries in Activity</h2>
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b-2 border-gray-300 px-4 py-2 text-left">Activity Name</th>
                            <th class="border-b-2 border-gray-300 px-4 py-2 text-left">Beneficiary Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topBeneficiaries as $beneficiary)
                        <tr>
                            <td class="border-b border-gray-200 px-4 py-2">{{ $beneficiary->activityName }}</td>
                            <td class="border-b border-gray-200 px-4 py-2">{{ $beneficiary->beneficiaryCount }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        </div>
    </x-admin-sidebar>
</body>

</html>
