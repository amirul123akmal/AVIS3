<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Avis</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@if (session('error'))
    <script>
        // Wait for the DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function () {
            swal.fire({
                icon: 'warning',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2000
            });
        });
    </script>
@endif
<body>
    <x-home-navbar custom="fixed top-0 z-10 opacity-0 hover:opacity-100 transition ease-in-out duration-500" />
    <div class="bg-[#d6d9de] h-screen">
        <div class="flex justify-between align-middle" style="height: 100%;">
            <div class="w-1/2 flex flex-col items-center justify-center bg-radial-erin py-auto h-full ">
                <x-icon-amal-valley class="w-1/5 " />
                <p class="text-4xl font-semibold">Login Account</p>
                <p class="text-slate-500">Please Enter Your Personal Details</p>
                <form action="{{ route('login') }}" method="POST" class="w-3/5 [&_input]:border-none">
                    @csrf
                    <div
                        class="mt-3 [&_.input]:rounded-2xl [&_.input]:bg-[#7486ab] [&_input]:placeholder:text-slate-800">
                        <div class="">
                            <p class="font-bold">Email</p>
                            <label class="input input-bordered flex items-center gap-2 ">
                                <input type="email" name="email" class="focus:ring-0 grow"
                                    placeholder="Enter Your Email" />
                            </label>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        </div>
                        <div class="mt-3">
                            <p class="font-bold">Password</p>
                            <label class="input input-bordered flex items-center gap-2">
                                <input type="password" name="password" class="grow focus:ring-0"
                                    placeholder="Create Password" />
                            </label>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        </div>
                    </div>
                    {{-- <div class="flex justify-between">
                        <label class="cursor-pointer label ">
                            <input type="checkbox" class="checkbox checkbox-sm" name="rememberMe" />
                            <span class="label-text ms-3">Remember Me</span>
                        </label>
                        <a href="forgot-password" type="button"
                            class="rounded-3xl bg-[#5671a7] h-7 pb-2 px-3 mt-2 text-white">Forgot Password</a>
                    </div> --}}
                    <button class="btn bg-[#e9d6f1] w-full rounded-xl text-2xl mt-8">Log In</button>
                </form>
            </div>
            <div class="right w-1/2 flex items-center flex-col bg-[#4d6d99] glass justify-center [&_p]:text-white ">
                <p class="text-6xl font-semibold mb-3">Hello Friend !</p>
                <p class="text-lg">Enter Your Personal Detail and </p>
                <p class="text-lg">Start Your Journey With Us</p>
                <a href="/register"
                    class="btn rounded-3xl w-2/6 mt-3 border-gray-0 bg-transparent text-white underline underline-offset-4 text-2xl pb-1">Sign
                    Up</a>
            </div>
        </div>
    </div>
</body>

</html>
