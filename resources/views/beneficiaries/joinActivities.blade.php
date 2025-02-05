<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amal Valley Organization</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        body {
            background-color: #ebeff4;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        main {
            max-width: 900px;
            margin: 2rem auto;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .flex-wrapper {
            display: flex;
            justify-content: center;
            align-items: stretch; /* Ensure elements stretch to the same height */
            gap: 16px;
        }
        .image-section {
            flex: 1; /* Flex to match sibling height */
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .image-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .activity-card {
            flex: 1;
            background-color: rgba(31, 109, 132, 0.33);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-submit {
            background-color: #1f6d84;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #155266;
        }
        .search-bar {
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 24px;
            padding: 0.5rem 1rem;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .search-bar input {
            border: none;
            outline: none;
            width: 200px;
            margin-left: 0.5rem;
        }
        .search-bar input::placeholder {
            color: #888;
        }
        .search-bar svg {
            color: #888;
        }
    </style>
</head>
<body>

<x-ben-sidebar>
    <x-ben-navbar />

    <!-- Main Content -->
    <main>
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Hi, Erin</h2>
                <p class="text-lg text-gray-600">Join Hands to Help Those in Need</p>
            </div>
            <!-- Search Bar -->
            <div class="search-bar">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <circle cx="11" cy="11" r="8" stroke-width="2" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" stroke-width="2" />
                </svg>
                <input type="text" placeholder="Search Activities">
            </div>
        </div>

        <!-- Content Section -->
        <div class="flex-wrapper">
            <!-- Image Section -->
            <div class="image-section">
            <img src="{{ Vite::asset('resources/images/activities/volunteer2.jpg') }}" alt="Volunteer Image" class="rounded-lg shadow-md w-80 h-60 object-cover">
            </div>

            <!-- Details Section -->
            <div class="activity-card">
                <h3 class="text-2xl font-bold text-[#1f6d84] mb-4">Flood Relief Distribution</h3>
                <p class="text-gray-600 text-base leading-relaxed mb-6">
                    The level of sustainability of a modern society is associated with the ability to manage unwanted stressors from the environment, regardless of origin. Torrential floods represent a hydrological hazard whose frequency and intensity have increased in recent years, mainly due to climate changes.
                </p>
                <div class="flex items-center text-sm text-gray-600 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#1f6d84] mr-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18l-4.95-4.95a7 7 0 010-9.9z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">Dewan Platinum, Denai Alam</span>
                </div>
                <div class="flex items-center text-sm text-gray-600 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#1f6d84] mr-3" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8 2a2 2 0 00-2 2v2a2 2 0 002 2h4a2 2 0 002-2V4a2 2 0 00-2-2H8z" />
                        <path fill-rule="evenodd" d="M3 8a1 1 0 011-1h12a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1V8zm7 1a2 2 0 110 4 2 2 0 010-4z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">9.00 AM - 12.00 PM</span>
                </div>
                <div class="text-sm text-gray-600 mb-6">
                    <span class="font-medium">Date:</span> 12/12/2024
                </div>

                <button class="btn-submit">
                    Join Us
                </button>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-8 text-center text-gray-600 text-sm">
        If you have any inquiries call us at <span class="font-medium">0184004385</span>
    </footer>
</x-ben-sidebar>

</body>
</html>
