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
                        <a href="{{ route('Create-Transport') }}" class="btn btn-ghost">Create Transport</a>
                        <a href="{{ route ('admin.view-transport')}}" class="btn btn-ghost">View Transport</a>
                        <a href="{{ route('Update-Transport') }}" class="btn btn-primary">Update Transport Information</a>
                    </div>
                    @foreach ($transportation as $transport)
                    <div class="card bg-gray-100 p-4 rounded-lg flex justify-between items-center">
                        <span>{{ $transport->vehiclePlateNumber }}</span>
                        <button class="btn btn-danger" onclick="deleteTransport({{ $transport->transID }})">Delete</button>
                    </div>
                    @endforeach
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
    function deleteTransport(id) {
        alertify.confirm('Are you sure you want to delete this transport?', function() {
            var csrfToken = '{{ csrf_token() }}';
            fetch('{{ route('Delete-TransportPost') }}?id=' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                if (response.ok) {
                    alertify.success('Transportation deleted successfully');
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                } else {
                    console.log(response);
                    alertify.error('Failed to delete transport.');
                }
            });
        });
    }
</script>
</html>

