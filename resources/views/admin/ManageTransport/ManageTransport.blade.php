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
                        <a href="{{ route('Manage-Transport', ['id' => $id]) }}" class="btn btn-primary">Request Transport</a>
                        <a href="{{ route('Create-Transport') }}" class="btn btn-ghost">Create Transport</a>
                        <a href="{{ route ('admin.view-transport')}}" class="btn btn-ghost">View Transport</a>
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
                                            <p class="bg-none border-none text-lg font-semibold text-gray-500">{{ $addressFrom }}</p>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <!-- <label class="text-sm font-medium">Send To</label> -->
                                        <p class="bg-none border-none text-lg font-semibold text-gray-500">{{ $addressTo }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center">
                                    <span class="bi bi-chevron-compact-right font-bold text-3xl"></span>
                                    <span class="bi bi-chevron-compact-right font-bold text-3xl"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('assign.drivers') }}" method="POST">
                        @csrf
                        @method("POST")
                        <h2 class="font-semibold mb-2">Assign Drivers</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            @foreach ($busyDrivers as $drv)
                            <div class="card {{ $drv['status'] === 'unavailable' ? 'bg-gray-400' : 'bg-[#025067]' }} text-white p-4 rounded-lg justify-between items-center">
                                <div class="flex gap-x-4 mb-5">
                                    <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center">
                                        <img src="{{ Vite::asset('resources/images/default/profile.jpg') }}" alt="Profile Image" class="rounded-full" />
                                    </div>
                                    <div>
                                        <p class="font-semibold text-xl">{{ $drv["driverName"] }}</p>
                                        <p>Status: {{ $drv["status"] }}</p>
                                    </div>
                                    <span class="bi bi-chevron-compact-right font-bold text-3xl pt-3"></span>
                                </div>
                                <input type="radio" name="drivers" value="{{ $drv['driverID'] }}" class="rounded-2xl bg-white text-black h-8 text-center text-xl w-40" {{ $drv['status'] === 'unavailable' ? 'disabled' : '' }}>
                            </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="reqID" value="{{ $id }}">
                        <h2 class="font-semibold mb-2">Transportation Details</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($transportation as $transport)
                            <div class="card bg-gray-100 p-4 rounded-lg flex justify-between items-center {{ in_array($transport->transID, array_keys($busyVehicle)) ? 'bg-red-200' : '' }}">
                                <span>{{ $transport->vehiclePlateNumber }}</span>
                                <span>{{ $transport->vehicleType->vehicleType }}</span>
                                <input type="radio" name="transportation" value="{{ $transport->transID }}" class="mr-2" {{ in_array($transport->transID, array_keys($busyVehicle)) ? 'disabled' : '' }}>
                            </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit Assignments</button>
                    </form>
                </div>
            </div>
        </div>
    </x-admin-sidebar>
    
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('success'))
            swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                confirmButtonText: 'OK'
            });
        @endif

        @if($errors->any())
            swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ implode(', ', $errors->all()) }}',
            });
        @endif
    });
</script>


</html>
