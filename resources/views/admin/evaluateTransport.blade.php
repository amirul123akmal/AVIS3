<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluate Transport Requests</title>
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
        .section-header {
            font-size: 1.2rem;
            font-weight: bold;
            color: #1f6d84;
            margin-bottom: 1rem;
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
        <x-admin-navbar />
        <!-- Main Content -->
        <main class="card">
            <!-- Page Header -->
            <h1 class="text-center text-2xl font-bold text-[#1f6d84]">Evaluate Transport Request</h1>

            <!-- Search Bar -->
            <div class="mt-4">
                <input type="text" placeholder="Search Request" class="w-full p-2 border rounded-md">
            </div>

            <!-- Section: To Evaluate -->
            <div class="mt-6">
                <h2 class="section-header">To Evaluate</h2>
                <div class="item">
                    <span>Bing</span>
                    <a href="{{ route('admin.evaluateDetails', ['id' => 1]) }}">Details</a>
                </div>
                <div class="item">
                    <span>Sarah</span>
                    <a href="{{ route('admin.evaluateDetails', ['id' => 2]) }}">Details</a>
                </div>
            </div>

            <!-- Section: Evaluated -->
            <div class="mt-6">
                <h2 class="section-header">Evaluated</h2>
                <div class="item">
                    <span>Johnny</span>
                    <a href="{{ route('admin.evaluateDetails', ['id' => 3]) }}">Details</a>
                </div>
                <div class="item">
                    <span>Garfield</span>
                    <a href="{{ route('admin.evaluateDetails', ['id' => 4]) }}">Details</a>
                </div>
            </div>
        </main>
    </x-admin-sidebar>
</body>
</html>