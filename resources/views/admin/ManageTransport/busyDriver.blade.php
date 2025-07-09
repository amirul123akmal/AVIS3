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
                <h1 class="text-2xl font-bold mb-4">Current Busy Drivers</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    @foreach ($assignedTransport as $transport)
                        <div class="card bg-gray-100 p-4 rounded-lg flex justify-between items-center">
                            <div>
                                <p class="font-semibold text-xl">{{ $transport->driverName }}</p>
                                <p>Status: Busy</p>
                                <p>Vehicle Plate: {{ $transport->vehiclePlateNumber }}</p>
                                <p>Date Requested: {{ $transport->dateReq }}</p>
                                <p>Beneficiary Name: {{ $transport->fullname }}</p>
                                <p>Beneficiary Email: {{ $transport->email }}</p>
                            </div>
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

