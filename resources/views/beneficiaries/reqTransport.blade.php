<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Transport Application</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        @font-face {
            font-family: 'CanvaSans-Bold';
            src: url('https://fonts.gstatic.com/s/canvasans-bold.woff2') format('woff2');
            font-weight: bold;
        }
        
        body {
            background-color: #ebeff4;
            font-family: Arial, sans-serif;
        }
        
        /* Main Container */
        .main-container {
            max-width: 900px; /* Set max width */
            margin: 2rem auto; /* Center horizontally with margins */
            background-color: white;
            border: 1px solid #ddd; /* Add a light border */
            border-radius: 12px; /* Rounded corners */
            padding: 2rem; /* Inner padding for content */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for neatness */
        }
        
        /* Tabs Section */
        .tabs {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            background-color: rgba(31, 109, 132, 0.33); /* #1f6d84 with 33% transparency */
            border-radius: 12px;
            padding: 1rem;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .tab {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: bold;
            color: #1f6d84;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }
        
        .tab.active {
            background-color: #1f6d84;
            color: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }
        
        .tab:hover {
            background-color: #155266; /* Darker teal on hover */
            color: white;
        }
        
        .tab i {
            font-size: 1.2rem;
        }
        
        /* Modern Text Field and Dropdown Styling */
        input[type="text"], textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1c4e9; /* Subtle border */
            background-color: rgba(233, 214, 241, 0.63); /* Same color */
            border-radius: 12px; /* Softer corners for a premium feel */
            font-size: 16px;
            font-weight: 500;
            color: #333;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Elegant shadow */
            transition: all 0.3s ease; /* Smooth interaction transitions */
        }
        
        input[type="text"]::placeholder, textarea::placeholder, select::placeholder {
            color: #7c6f92;
            font-style: italic; /* Slightly premium placeholder style */
        }
        
        input[type="text"]:focus, textarea:focus, select:focus {
            border-color: #b39ddb; /* Light purple border for focus */
            background-color: rgba(233, 214, 241, 0.8); /* Subtle background change */
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15); /* Enhanced shadow */
            outline: none;
        }
        
        select {
            appearance: none; /* Remove default dropdown arrow styling */
            background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"%3E%3Cpath fill="%237c6f92" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/%3E%3C/svg%3E');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 1rem;
        }
        
        /* Section Styling */
        .section-title {
            color: #1f6d84;
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        button {
            background-color: #1f6d84;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        button:hover {
            background-color: #155266;
        }
    </style>
</head>
<body>
    <x-ben-sidebar>
        <x-ben-navbar />
        
        <!-- Main Content -->
        <div class="main-container">
            <h1 class="text-center text-[#1f6d84] text-2xl font-bold">Request Transport Application</h1>
            <!-- Tabs -->
            <div class="tabs mt-4">
                <div class="tab active flex items-center gap-4 h-10">
                    <i class="bi bi-person-circle text-lg"></i>
                    <span>Personal Details</span>
                </div>
                
                <div class="tab flex items-center gap-4 h-10">
                    <i class="bi bi-clipboard-check-fill text-lg"></i>
                    <span>Status Application</span>
                </div>
            </div>
            <!-- Progress Info -->
            <section class="flex flex-col md:flex-row justify-between items-center gap-6 p-6 bg-[#f9fafb] rounded-lg shadow-md mt-6">
                <!-- Progress Card -->
                {{-- <div class="flex flex-col items-center bg-white p-4 rounded-lg shadow-md w-60">
                    <p class="font-bold text-5xl text-green-500 mb-2">90%</p>
                    <span class="text-base font-medium text-gray-600">Completed Details</span>
                </div> --}}
                
                
                <!-- Reminder Card -->
                <div class="flex items-center gap-4 bg-white p-4 rounded-lg shadow-md grow">
                    <i class="bi bi-exclamation-octagon-fill text-5xl text-blue-500"></i>
                    <div>
                        <span class="text-base font-semibold text-gray-700">Remember to check your details correctly before submission.</span>
                    </div>
                </div>
            </section>
            
            <!-- Form Section -->
            <div class="mt-6">
                <h2 class="section-title">Personal Info</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-black font-medium mb-1">Name</label>
                        <input type="text" value="{{ $actor->fullname }}" placeholder="Enter your name" readonly>
                    </div>
                    <div>
                        <label class="block text-black font-medium mb-1">Status Income</label>
                        <input type="text" value="{{ $actor->beneficiary->incomeGroup->groupType }}" placeholder="Enter your income status" readonly>
                    </div>
                    <div>
                        <label class="block text-black font-medium mb-1">IC Num</label>
                        <input type="text" value="{{ $actor->ic }}" placeholder="Enter your IC number" readonly>
                    </div>
                    <div>
                        <label class="block text-black font-medium mb-1">Phone Number</label>
                        <input type="text" value="{{ $actor->phoneNumber }}" placeholder="Enter your phone number" readonly>
                    </div>
                </div>
                <form action="{{route('ben.applyReqTransport')}}" method="POST">
                    @csrf
                    <div class="mt-6">
                        <h2 class="section-title">Transport Section</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-black font-medium mb-1">Address From</label>
                                <input type="text" name="address_from" placeholder="Address" required>
                            </div>
                            <div>
                                <label class="block text-black font-medium mb-1">State From</label>
                                <select name="state_from" required>
                                    <option value="" selected disabled>Select State</option>
                                    @foreach($states as $state)
                                    <option value="{{ $state->stateID }}">{{ $state->statename }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <input type="text" name="postcode_from" placeholder="Postcode" required>
                            </div>
                            <div>
                                <input type="text" name="city_from" placeholder="City" required>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="block text-black font-medium mb-1">Address To</label>
                                <input type="text" name="address_to" placeholder="Address" required>
                            </div>
                            <div>
                                <label class="block text-black font-medium mb-1">State To</label>
                                <select name="state_to" required>
                                    <option value="" selected disabled>Select State</option>
                                    @foreach($states as $state)
                                    <option value="{{ $state->stateID }}">{{ $state->statename }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <input type="text" name="postcode_to" placeholder="Postcode" required>
                            </div>
                            <div>
                                <input type="text" name="city_to" placeholder="City" required>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block text-black font-medium mb-1">Vehicle Type</label>
                            <select name="vehicle_type" required>
                                <option value="" selected disabled>Select Vehicle Type</option>
                                @foreach($vehicletype as $type)
                                    <option value="{{ $type->vehicleID }}">{{ $type->vehicleType }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <label class="block text-black font-medium mb-1">Notes</label>
                            <textarea rows="3" placeholder="Leave a Message Here" name="notes"></textarea>
                        </div>
                    </div>
                    
                    <div class="text-center mt-6 text-[#1f6d84] font-medium text-sm">
                        Ensure all information is filled correctly before submission.
                    </div>
                    
                    <button class="block mx-auto text-lg font-semibold py-2 px-6 rounded-md mt-6">
                        Submit
                    </button>
                </form>
            </div>
        </div>
        </x-ben-sidebar>
    </body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if(session('success'))
                alert("{{ session('success') }}");
            @endif
        });
    </script>
    </html>
    