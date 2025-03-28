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
                        <a href="" class="btn btn-ghost">Request Transport</a>
                        <a href="{{ route('Create-Transport') }}" class="btn btn-ghost">Create Transport</a>
                        <a href="{{ route ('admin.view-transport')}}" class="btn btn-primary">View Transport</a>
                        <a href="{{ route('Update-Transport') }}" class="btn btn-ghost">Update Transport Information</a>
                    </div>
                    <h2 class="font-semibold mb-2">Drivers</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        @foreach ($driver as $drv)
                        <div class="card bg-[#025067] text-white p-4 rounded-lg justify-between items-center">
                            <div class="flex gap-x-4 mb-5">
                                <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center">
                                    <img src="{{ Vite::asset('resources/images/default/profile.jpg') }}" alt="Profile Image" class="rounded-full" />
                                </div>
                                <div>
                                    <p class="font-semibold text-xl">{{ $drv->driverName }}</p>
                                    <p>Status: Available</p>
                                </div>
                                <span class="bi bi-chevron-compact-right font-bold text-3xl pt-3"></span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <h2 class="font-semibold mb-2">Transportation</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($transportation as $transport)
                        <div class="card bg-gray-100 p-4 rounded-lg flex justify-between items-center">
                            <span>{{ $transport->vehiclePlateNumber }}</span>
                            <span>{{ $transport->vehicleType->vehicleType }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-admin-sidebar>
    
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('success'))
        alertify.success("{{ session('success') }}");
        @endif
        
        @if(session('error'))
        alertify.error("{{ session('error') }}");
        @endif
    });
</script>


</html>
