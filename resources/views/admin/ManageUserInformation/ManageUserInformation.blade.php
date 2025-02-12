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
            <div class="mb-8">
                <livewire:admin.volunteer-search />
            </div>
            <div>
                @livewire('admin.beneficiaries-search')
            </div>
        </div>
    </x-admin-sidebar>
    @livewireScripts
</body>
</html>
