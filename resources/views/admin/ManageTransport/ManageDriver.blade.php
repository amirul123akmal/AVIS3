<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Driver</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-admin-sidebar>
        <x-admin-navbar />
        <div class="container mx-auto bg-base-100 p-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @include('admin.ManageTransport.ManageTransportNavigation')
                <div class="col-span-3">
                <div class="flex justify-between gap-x-5">
                    <!-- Left Box: List of Drivers -->
                    <div class="w-1/2 bg-white p-4 rounded-lg shadow-md">
                        <h2 class="font-semibold text-lg mb-4">List of Drivers</h2>
                        <div class="max-h-60 overflow-y-auto">
                            @foreach ($drivers as $driver)
                            <div class="flex justify-between items-center border-b py-2">
                                <span class="text-gray-800">{{ $driver->driverName }}</span>
                                <a href="{{ route('transport.driver.delete', ['id' => $driver->driverID]) }}" class="btn btn-warning">delete</a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Right Box: Create Driver Form -->
                    <div class="w-1/2 bg-white p-4 rounded-lg shadow-md">
                        <h2 class="font-semibold text-lg mb-4">Create Driver</h2>
                        <form action="{{ route('transport.driver.put') }}" method="post">
                            @csrf
                            @method("PUT")
                            <div class="mb-4">
                                <label for="driverName" class="block text-sm font-medium text-gray-700">Driver Name</label>
                                <input type="text" id="driverName" name="driverName" value="{{ old('driverName') }}" required class="w-full input input-bordered input-primary" />
                            </div>
                            <div class="mb-4">
                                <label for="driverPhone" class="block text-sm font-medium text-gray-700">Driver Phone Number</label>
                                <input type="text" id="driverPhone" name="driverPhoneNum" value="{{ old('driverPhoneNum') }}" required class="w-full input input-bordered input-primary" />
                            </div>
                            <button class="btn btn-primary" type="submit">Create Driver</button>
                        </form>
                    </div>
                </div>
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
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
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

