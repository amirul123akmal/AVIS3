<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Transport</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                        <a href="{{ route('admin.evaluatePage') }}" class="btn btn-ghost">Assign Request Transport</a>
                        <a href="{{ route('Create-Transport') }}" class="btn btn-primary">Create Transport</a>
                        <a href="{{ route ('admin.view-transport')}}" class="btn btn-ghost">View Transport</a>
                        <a href="{{ route('Update-Transport') }}" class="btn btn-ghost">Update Transport Information</a>
                    </div>
                    <h2 class="font-semibold mb-2">Type of Transportation</h2>
                    <form action="{{ route('Create-TransportPost') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            @foreach ($vehicleType as $vehicle)
                            <div class="flex items-center">
                                <input type="radio" name="vehicleType" value="{{ $vehicle->vehicleID }}" class="radio radio-primary mr-2" {{ old('vehicleType') == $vehicle->vehicleID ? 'checked' : '' }} />
                                <span>{{ $vehicle->vehicleType }}</span>
                            </div>
                            @endforeach
                        </div>
                        <!-- Plate Number Input -->
                        <div class="mb-4">
                            <label for="plateNumber" class="block text-sm font-medium text-gray-700">Plate Number</label>
                            <input type="text" id="plateNumber" name="plateNumber" required class="w-full input input-bordered input-primary" value="{{ old('plateNumber') }}" />
                        </div>
                        
                        <!-- Capacity Input -->
                        <div class="mb-4">
                            <label for="capacity" class="block text-sm font-medium text-gray-700">Capacity</label>
                            <input type="number" id="capacity" name="capacity" required class="w-full input input-bordered input-primary" value="{{ old('capacity') }}" />
                        </div>
                        
                        <!-- Description Input -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="4" class="w-full textarea textarea-bordered textarea-primary">{{ old('description') }}</textarea>
                        </div>
                        
                        <!-- Status Dropdown -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select id="status" name="status" required class="w-full select select-bordered select-primary">
                                @foreach ($status as $status)
                                <option value="{{ $status->statusID }}" {{ old('status') == $status->statusID ? 'selected' : '' }}>{{ $status->statusType }}</option>
                                @endforeach
                            </select>
                        <button class="btn btn-primary" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-sidebar>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('success'))
        alertify.success('{{ session('success') }}');
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
</html>

