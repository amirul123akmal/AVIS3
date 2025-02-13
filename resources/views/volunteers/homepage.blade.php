<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #ebeff4;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            flex-direction: column;
        }
        
        main {
            max-width: 900px;
            width: 100%;
            margin: 0 auto;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
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
        
        .search-bar svg {
            color: #888;
        }
        
        .activity-list {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        
        .activity-item {
            background-color: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            display: flex;
            align-items: center;
            gap: 16px;
            border: 1px solid #ddd;
        }
        
        .activity-image {
            width: 200px;
            height: 150px;
            border-radius: 8px;
            object-fit: cover;
        }
        
        .activity-details {
            flex: 1;
        }
        
        .btn-join {
            background-color: #1f6d84;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .btn-join:hover {
            background-color: #155266;
        }
    </style>
</head>

<body>
    <x-vol-sidebar>
        <x-vol-navbar />
        <main class="mt-8">
            <div class="flex justify-between items-center mb-8 ">
                <h2 class="text-2xl font-bold text-gray-800">Join Activities</h2>
                
                <!-- Search Bar -->
                <div class="search-bar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="11" cy="11" r="8" stroke-width="2" />
                        <line x1="21" y1="21" x2="16.65" y2="16.65" stroke-width="2" />
                    </svg>
                    <input type="text" id="searchActivity" placeholder="Search Activities">
                </div>
            </div>
            
            <!-- Activity List -->
            <div class="activity-list" id="activityList">
                @foreach($activities as $activity)
                <div class="activity-item">
                    <!-- Image Section -->
                    <div>
                        <img src="{{ URL::asset('storage/' . $activity->activityImage) }}" alt="{{ $activity->activityName }}" class="activity-image">
                    </div>
                    
                    <!-- Details Section -->
                    <div class="activity-details">
                        <h3 class="text-xl font-bold text-[#1f6d84]">{{ $activity->activityName }}</h3>
                        <p class="text-gray-600 text-sm mb-2">{{ $activity->description }}</p>
                        <p class="text-gray-600 text-sm"><strong>Location:</strong> {{ $activity->activityPlace }}</p>
                        <p class="text-gray-600 text-sm"><strong>Date:</strong> {{ date('d/m/Y', strtotime($activity->dateStart)) }}</p>
                    </div>
                    
                    <!-- Join Button -->
                    <form action="{{ route('vol.joinActivity', ['activityID'=>$activity->activityID])}}" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="activity_id" value="{{ $activity->activityID }}"> --}}
                        <button type="submit" class="btn-join">Join</button>
                    </form>
                </div>
                @endforeach
            </div>
        </main>
    </x-vol-sidebar>
</body>
<script>
    document.getElementById("searchActivity").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let activities = document.querySelectorAll(".activity-item");

        activities.forEach(activity => {
            let name = activity.querySelector("h3").textContent.toLowerCase();
            if (name.includes(filter)) {
                activity.style.display = "flex";
            } else {
                activity.style.display = "none";
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('error'))
            alertify.error("{{ session('error') }}");
        @endif
        
        @if(session('success'))
            alertify.success("{{ session('success') }}");
        @endif
    });
</script>
</html>
