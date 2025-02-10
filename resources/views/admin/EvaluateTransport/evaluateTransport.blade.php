<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluate Transport Requests</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
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
        .section-header {
            font-size: 1.2rem;
            font-weight: bold;
            color: #1f6d84;
            margin-bottom: 1rem;
        }
        .search-box {
            display: flex;
            align-items: center;
            background: white;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 5px 10px;
        }
        .search-box input {
            flex: 1;
            border: none;
            padding: 8px;
            outline: none;
        }
        .search-icon {
            color: #1f6d84;
            font-size: 18px;
            margin-right: 8px;
        }
        .item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(233, 214, 241, 0.63);
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            font-weight: bold;
        }
        .item a {
            background-color: #1f6d84;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.8rem;
        }
        .item a:hover {
            background-color: #14565b;
        }
    </style>
</head>
<body>
    <x-admin-sidebar>
        <x-admin-navbar/>
        <main class="card">
            <h1 class="text-center text-2xl font-bold text-[#1f6d84]">Evaluate Transport Request</h1>

            <!-- Search Box with Icon -->
            <div class="mt-4">
                <div class="search-box">
                    <span class="search-icon">🔍</span>
                    <input type="text" id="searchInput" placeholder="Search Request" class="w-full p-2">
                </div>
            </div>

            <!-- Section: To Evaluate -->
            <div class="mt-6">
                <h2 class="section-header">To Evaluate</h2>
                <div id="toEvaluateList">
                    @foreach($requestsToEvaluate as $request)
                        <div class="item">
                            <span class="request-name">{{ $request->fullname ?? 'Unknown' }}</span>
                            <a href="{{ route('admin.evaluateDetails', ['id' => $request->reqID]) }}">Details</a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Section: Evaluated -->
            <div class="mt-6">
                <h2 class="section-header">Evaluated</h2>
                <div id="evaluatedList">
                    @foreach($evaluatedRequests as $request)
                        <div class="item">
                            <span class="request-name">{{ $request->fullname ?? 'Unknown' }}</span>
                            <a href="{{ route('admin.evaluateDetails', ['id' => $request->reqID]) }}">Details</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </x-admin-sidebar>

    <script>
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let filter = this.value.toLowerCase();
            let items = document.querySelectorAll(".item");

            items.forEach(item => {
                let name = item.querySelector(".request-name").textContent.toLowerCase();
                if (name.includes(filter)) {
                    item.style.display = "flex";
                } else {
                    item.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>
