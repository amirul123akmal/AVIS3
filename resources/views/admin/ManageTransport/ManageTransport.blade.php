<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Transport</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .dot {
            height: 10px;
            width: 10px;
            background-color: #1d4ed8;
            border-radius: 50%;
        }
        .line {
            height: 70%;
            width: 2px;
            background-color: #1d4ed8;
        }
    </style>
</head>

<body>
    <x-admin-sidebar>
        <x-admin-navbar />
        <div class="container mx-auto bg-base-100 p-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @include('admin.ManageTransport.ManageTransportNavigation')

                <div class="col-span-3">
                    <h1 class="text-2xl font-bold mb-4">Manage Transport</h1>
                    <div class="flex justify-between mb-4 rounded-lg bg-white">
                        <a href="{{ route('Manage-Transport') }}" class="btn btn-primary">Request Transport</a>
                        <a href="{{ route('Create-Transport') }}" class="btn btn-ghost">Create Transport</a>
                        <a href="{{ route('Update-Transport') }}" class="btn btn-ghost">Update Transport Information</a>
                    </div>
                    <h2 class="font-semibold mb-2">Address Details</h2>
                    <div class="mb-6 bg-white rounded-lg py-5 px-5">
                        <div class="flex justify-between">
                            <div class="flex flex-col items-center ">
                                <span class="dot relative w-full">
                                    <p class="absolute -top-2 left-5 w-full whitespace-nowrap font-bold">Pickup From</p>
                                </span>
                                <div class="line"></div>
                                <span class="dot relative w-full">
                                    <p class="absolute -top-2 left-5 w-full whitespace-nowrap font-bold">Send To</p>
                                </span>
                            </div>
                            <div class="flex items-center">
                                <div class="flex flex-col items-end">
                                    <div class="flex mb-2">
                                        <div class="ml-4">
                                            <p class="bg-none border-none text-lg font-semibold text-gray-500">Shah Alam, Selangor</p>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <!-- <label class="text-sm font-medium">Send To</label> -->
                                        <p class="bg-none border-none text-lg font-semibold text-gray-500">Hulu Langat, Selangor</p>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center">
                                    <span class="bi bi-chevron-compact-right font-bold text-3xl"></span>
                                    <span class="bi bi-chevron-compact-right font-bold text-3xl"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="font-semibold mb-2">Assign Drivers</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        @for ($i = 0; $i < 4; $i++)
                        <div class="card bg-[#025067] text-white p-4 rounded-lg justify-between items-center">
                            <div class="flex gap-x-4 mb-5">
                                <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center">
                                    <img src="https://via.placeholder.com/64" alt="Profile Image" class="rounded-full" />
                                </div>
                                <div>
                                    <p class="font-semibold text-xl">Halim Bin Jumaat</p>
                                    <p>Status: Available</p>
                                </div>
                                <span class="bi bi-chevron-compact-right font-bold text-3xl pt-3"></span>
                            </div>
                            <input class="rounded-2xl bg-white text-black h-8 text-center text-xl w-40" value="Assign">
                        </div>
                        @endfor
                    </div>

                    <h2 class="font-semibold mb-2">Assign Transportation</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" checked class="checkbox checkbox-primary mr-2" />
                            <span>Ambulance</span>
                            <img src="https://img.icons8.com/ios-filled/50/000000/ambulance.png" alt="Ambulance"
                                class="w-12 h-12 ml-2" />
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" class="checkbox checkbox-primary mr-2" />
                            <span>Funeral Van</span>
                            <img src="https://img.icons8.com/ios-filled/50/000000/van.png" alt="Funeral Van"
                                class="w-12 h-12 ml-2" />
                        </div>
                    </div>

                    <h2 class="font-semibold mb-2">Transportation Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($transportation as $transport)
                        <div class="card bg-gray-100 p-4 rounded-lg flex justify-between items-center">
                            <span>{{ $transport->vehiclePlateNumber }}</span>
                            <button class="btn btn-primary">Assign</button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-admin-sidebar>

</body>

</html>
