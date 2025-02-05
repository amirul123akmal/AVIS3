<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Transport</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>
<body>
    <x-admin-sidebar>
        <x-admin-navbar />
        <div class="container mx-auto bg-base-100 p-6">
            <div class="relative mb-6">
                <input 
                    type="text"
                    placeholder="Search User Name"
                    class="input input-bordered w-full max-w-md bg-gray-200 pl-10"
                >
                <svg 
                    class="absolute left-3 top-3 h-5 w-5 text-gray-500"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <div class="mb-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg">Volunteer</h2>

                    <div>
                        <select class="select select-bordered w-full max-w-xs bg-black text-white focus:outline-none focus:ring-0 focus:border-none" aria-label="Sort by" id="sort-options">
                            <option value="a_to_z">Sort by A to Z</option>
                            <option value="z_to_a">Sort by Z to A</option>
                        </select>
                    </div>
                </div>
                <livewire:admin.volunteer-search />
            </div>
        
            <div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg">Beneficiaries</h2>
                    <div>
                        <select class="select select-bordered w-full max-w-xs bg-black text-white focus:outline-none focus:ring-0 focus:border-none" aria-label="Sort by" id="sort-options">
                            <option value="a_to_z">Sort by A to Z</option>
                            <option value="z_to_a">Sort by Z to A</option>
                        </select>
                    </div>
                </div>
                @livewire('admin.beneficiaries-search')
            </div>
        </div>
    </x-admin-sidebar>
    @livewireScripts
</body>
</html>
