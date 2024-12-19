<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard Activity</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-admin-sidebar>
        <x-admin-navbar />
        <div class="container mx-auto">
            <section class="flex justify-between">
                <div class="w-3/12">
                    <label class="input h-10 rounded-xl flex items-center gap-2 bg-gray-200">
                        <span class="bi bi-search font-bolder text-2xl"></span>
                        <input type="text" class="ms-2" placeholder="Search Activity" />
                    </label>
                </div>
                <div class="">
                    <button class="btn bg-black text-white hover:bg-white hover:text-black">Sort by <p
                            class="font-bold">Newest</p><span class="bi bi-arrow-down-circle-fill text-2xl" /></button>
                </div>
            </section>
            <section class="grid grid-cols-5 gap-4 mt-3 [&_.card]:h-28">
                <div class="card hover:bg-cyan-500 bg-cyan-200">
                    <div class="card-body">
                        <h1 class="card-title">asd</h1>
                        <p>asdhgavsd</p>
                    </div>
                </div>
                <div class="card hover:bg-cyan-500 bg-cyan-200">
                    <div class="card-body">

                    </div>
                </div>
                <div class="card hover:bg-cyan-500 bg-cyan-200">
                    <div class="card-body">

                    </div>
                </div>
            </section>
        </div>
    </x-admin-sidebar>
</body>

</html>
