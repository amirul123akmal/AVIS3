<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Avis</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="bg-[#d6d9de] h-screen">
        <x-home-navbar />
        <div class="h-[85vh] flex justify-between align-middle">
            <div class="left w-1/2 ">
                <div class="mt-20 ms-24 [&_i]:text-7xl [&_i]:ms-5 [&_i]:text-white">
                    <i class="bi bi-asterisk"></i>
                    <i class="bi bi-asterisk"></i>
                    <i class="bi bi-asterisk"></i>
                </div>
                <p class="text-7xl font-serif ms-24 mt-7">Amal Valley Information<br> System</p>
            </div>
            <div class="right w-1/2 h-full flex self-center">
                <div
                    class="glass h-4/5 mx-auto self-center w-4/5 rounded-xl bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                </div>
            </div>
        </div>
    </div>
</body>

</html>
