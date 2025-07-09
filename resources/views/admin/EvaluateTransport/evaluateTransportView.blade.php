<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport Request Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            background-color: #ebeff4;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }
        .card {
            position: relative;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            max-width: 800px;
            margin: 2rem auto;
        }
        .back-arrow {
            position: absolute;
            top: 10px;
            left: 15px;
            font-size: 24px;
            color: #1f6d84;
            text-decoration: none;
            font-weight: bold;
        }
        .back-arrow:hover {
            color: #14565b;
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
        <x-admin-navbar/>
        
        <main class="card">
            <!-- Back Arrow -->
            <a href="{{ route('admin.evaluatePage') }}" class="back-arrow">←</a>

            <h1 class="text-center text-2xl font-bold text-[#1f6d84]">Transport Request Details</h1>

            <!-- Tabs -->
            <div class="tabs mt-4">
                <div class="tab active" onclick="switchTab('personal')">Personal Details</div>
                <div class="tab" onclick="switchTab('transport')">Transport Details</div>
                <div class="tab" onclick="switchTab('status')">Status & Approval</div>
            </div>

            <!-- Personal Details -->
            <div id="personal" class="tab-content active">
                <h2 class="font-bold text-xl text-black mb-4">Personal Information</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-field">NAME: {{ $transportRequest->beneficiary->actor->fullname ?? 'N/A' }}</div>
                    <div class="text-field">STATUS INCOME: {{ $transportRequest->beneficiary->incomeGroup->groupType ?? 'N/A' }}</div>
                    <div class="text-field">IC NUM: {{ $transportRequest->beneficiary->actor->ic ?? 'N/A' }}</div>
                    <div class="text-field">PHONE NUMBER: {{ $transportRequest->beneficiary->actor->phoneNumber ?? 'N/A' }}</div>
                </div>
            </div>

            <!-- Transport Details -->
            <div id="transport" class="tab-content">
                <h2 class="font-bold text-xl text-black mb-4">Transport Details</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-field">Transport Type: {{ $transportRequest->vehicleType->vehicleType ?? 'N/A' }}</div>
                    <div class="text-field">Date: {{ $transportRequest->dateReq }}</div>
                    <div class="text-field">Address From: {{ $addressFrom }}</div>
                    <div class="text-field">Address To: {{ $addressTo }}</div>
                </div>
            </div>

            <!-- Status and Approval -->
            <div id="status" class="tab-content">
                <h2 class="font-bold text-xl text-black mb-4">Status & Approval</h2>
                <form action="{{ route('evaluateTransportUpdate', ['id' => $transportRequest->reqID]) }}" method="POST">
                    @csrf
                    <label class="text-field">Current Status: {{ ucfirst($transportRequest->status) }}</label>

                    <label class="text-field">Update Status:</label>
                    <select name="status" class="w-full p-2 border rounded-md mb-5" id="statusSelect">
                        <option value="Pending" {{ $transportRequest->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Approved" {{ $transportRequest->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                        <option value="Rejected" {{ $transportRequest->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>

                    <!-- Show price input ONLY when approved -->
                    <div id="priceInput" style="display: none;" class="mb-5">
                        <label class="text-field">Set Transport Price:</label>
                        <input type="text" name="transport_price" class="w-full p-2 border rounded-md" placeholder="Enter price" min="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>

                    <label class="text-field">Notes:</label>
                    <textarea name="notes" class="w-full p-2 border rounded-md">{{ $transportRequest->notes }}</textarea>

                    <button type="submit" class="bg-[#1f6d84] text-white px-4 py-2 rounded-md mt-3">Update Status</button>
                </form>
            </div>
        </main>
    </x-admin-sidebar>

    <script>
        function switchTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
            document.getElementById(tabName).classList.add('active');

            document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
            document.querySelector(`.tab[onclick="switchTab('${tabName}')"]`).classList.add('active');
        }

        // Show or hide transport price input when approving
        document.getElementById("statusSelect").addEventListener("change", function() {
            let priceInput = document.getElementById("priceInput");
            if (this.value === "Approved") {
                priceInput.style.display = "block";
            } else {
                priceInput.style.display = "none";
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if(session('success'))
                alertify.success("{{ session('success') }}");
            @endif

            @if ($errors->any())
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ implode(', ', $errors->all()) }}',
                });
            @endif
        });
    </script>
</body>
</html>
