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
                        <a href="" class="btn btn-ghost">Assign Request Transport</a>
                        <a href="{{ route('Create-Transport') }}" class="btn btn-ghost">Create Transport</a>
                        <a href="{{ route ('admin.view-transport')}}" class="btn btn-ghost">View Transport</a>
                        <a href="{{ route('Update-Transport') }}" class="btn btn-primary">Update Transport Information</a>
                    </div>
                    @foreach ($transportation as $transport)
                    <div class="card bg-gray-100 p-4 rounded-lg flex justify-between items-center">
                        <span>{{ $transport->vehiclePlateNumber }}</span>
                        <a href="{{ route('Updating-Transport', ['id' => $transport->transID]) }}" class="btn btn-primary">Update</a>
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
        alertify.success('{{ session('success') }}');
        @endif
    });
</script>
</html>

