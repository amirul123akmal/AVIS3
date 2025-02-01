<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport Request Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
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
            background-color: rgba(31, 109, 132, 0.33);
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
        }
        .tab.active {
            background-color: #1f6d84;
            color: white;
        }
        .text-field {
            background-color: rgba(233, 214, 241, 0.63);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: bold;
            font-size: 0.9rem;
            color: #1f1f1f;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
    </style>
</head>
<body>
    <x-admin-sidebar>
        <x-admin-navbar />
        <!-- Main Content -->
        <main class="card">
            <!-- Page Header -->
            <h1 class="text-center text-2xl font-bold text-[#1f6d84]">Transport Request Details</h1>

            <!-- Tabs -->
            <div class="tabs mt-4">
                <div class="tab active" onclick="switchTab('personal')">Personal Details</div>
                <div class="tab" onclick="switchTab('transport')">Transport Details</div>
                <div class="tab" onclick="switchTab('status')">Status Application</div>
            </div>

            <!-- Personal Info Section -->
            <div id="personal" class="tab-content active">
                <h2 class="font-bold text-xl text-black mb-4">Personal Information</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-field">NAME: </div>
                    <div class="text-field">STATUS INCOME: </div>
                    <div class="text-field">IC NUM: </div>
                    <div class="text-field">PHONE NUMBER: </div>
                </div>
            </div>

            <!-- Transport Details Section -->
            <div id="transport" class="tab-content">
                <h2 class="font-bold text-xl text-black mb-4">Transport Details</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-field">Transport Type: </div>
                    <div class="text-field">Date: </div>
                    <div class="text-field">Address From: </div>
                    <div class="text-field">Address To: </div>
                </div>
            </div>

            <!-- Status Application Section -->
            <div id="status" class="tab-content">
                <h2 class="font-bold text-xl text-black mb-4">Status Application</h2>
                <div class="text-field">Status: </div>
                <div class="text-field">Notes: </div>
            </div>
        </main>
    </x-admin-sidebar>

    <script>
        // Function to switch tabs
        function switchTab(tabName) {
            // Hide all tab content
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });

            // Show the selected tab content
            document.getElementById(tabName).classList.add('active');

            // Update active tab
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelector(`.tab[onclick="switchTab('${tabName}')"]`).classList.add('active');
        }
    </script>
</body>
</html>