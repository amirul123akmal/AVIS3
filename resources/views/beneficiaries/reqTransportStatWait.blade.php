<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Application</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        body {
            background-color: #ebeff4;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            max-width: 800px;
            margin: 2rem auto;
        }

        .tabs {
            display: flex;
            justify-content: space-evenly;
            background-color: rgba(31, 109, 132, 0.33); /* #1f6d84 with 33% transparency */
            border-radius: 8px;
            padding: 1rem;
        }

        .tab {
            text-align: center;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: bold;
            color: #1f6d84;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .tab.active {
            background-color: #1f6d84;
            color: white;
        }

        .tab:hover {
            background-color: #155266;
            color: white;
        }

        .text-field {
            background-color: rgba(233, 214, 241, 0.63); /* #e9d6f1 with 63% transparency */
            border: 1px solid #d1c4e9; /* Add subtle border for a refined look */
            border-radius: 8px; /* Rounded corners */
            padding: 12px;
            font-weight: bold;
            font-size: 0.9rem;
            color: #1f1f1f;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Light shadow for depth */
            transition: all 0.3s ease; /* Smooth transitions */
        }

        .text-field:hover {
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.15); /* Enhanced shadow on hover */
        }

        .text-field:focus {
            outline: none; /* Remove default outline */
            border-color: #b39ddb; /* Highlight border on focus */
            background-color: rgba(233, 214, 241, 0.8); /* Slightly darker background */
            box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.2); /* Stronger shadow */
        }

        .status-card {
            text-align: center;
            background: #e0f7fa;
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 2rem;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .status-card h2 {
            font-size: 1.5rem;
            color: #00695c;
            margin-bottom: 1rem;
        }

        .status {
            font-size: 1.2rem;
            font-weight: bold;
            color: white;
            padding: 0.75rem;
            border-radius: 8px;
        }

        .status.review {
            background-color: #f9c74f;
        }

        .status.approved {
            background-color: #52b788;
        }

        .status.rejected {
            background-color: #d62828;
        }

    </style>
</head>
<body>
    <x-ben-sidebar>
        <x-ben-navbar />
        <!-- Main Content -->
        <main class="card">
            <!-- Page Header -->
            <h1 class="text-center text-2xl font-bold text-[#1f6d84]">Request Transport Application</h1>

            <!-- Tabs -->
            <div class="tabs mt-4">
                <div class="tab">
                    <i class="bi bi-person-circle"></i> Personal Details
                </div>
                <div class="tab active">
                    <i class="bi bi-clipboard-check-fill"></i> Status Application
                </div>
            </div>

            <!-- Status Application Details -->
            <div class="mt-6">
                <h2 class="font-bold text-xl text-black mb-4">Status Application</h2>
                <div class="grid grid-cols-2 gap-4">
                    <!-- Dynamic fields from database -->
                    <div class="text-field">NAME: {{ $actor->fullname }}</div>
                    <div class="text-field">STATUS INCOME: {{ $actor->beneficiary->incomeGroup->groupType }}</div>
                    <div class="text-field">IC NUM: {{ $actor->ic }}</div>
                    <div class="text-field">PHONE NUMBER: {{ $actor->phoneNumber }}</div>
                </div>
            </div>

            <!-- Status -->
            <div class="status-card">
                <h2>Application Status</h2>
                @if($pendingRequest->status === 'Approved')
                    <div class="status approved">Approved</div>
                    <div class="mt-4 p-4 bg-white rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-gray-800">Notes:</h3>
                        <p class="text-gray-600">{{ $notes }}</p>
                    </div>
                    <div class="mt-4 p-4 bg-white rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-gray-800">Price:</h3>
                        <p class="text-gray-600">RM {{ number_format($price, 2) }}</p>
                        <div class="text-left">
                            <p class="text-red-500 text-sm">*Make the payment later at the site</p>
                            <p class="text-red-500 text-sm">**If the payment is 0, you do not need to pay anything</p>
                        </div>
                    </div>
                @elseif($pendingRequest->status === 'Rejected')
                    <div class="status rejected">Rejected</div>
                    <div class="mt-4 p-4 bg-white rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-gray-800">Notes:</h3>
                        <p class="text-gray-600">{{ $notes }}</p>
                    </div>
                    <div class="mt-4 p-4 bg-white rounded-lg shadow-md">
                        <div class="text-left">
                            <p class="text-red-500 text-sm">*You can request again starts tomorrow</p>
                        </div>
                    </div>
                @else
                    <div class="status bg-black">Waiting for approval</div>
                <form action="{{ route('ben.cancelReqTransport') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="request_id" value="{{ $pendingRequest->reqID }}">
                    <button type="submit" class="btn-cancel bg-red-500 text-white py-2 px-4 rounded">Cancel Request</button>
                </form>
                @endif
            </div>
        </main>
    </x-ben-sidebar>
</body>
</html>
