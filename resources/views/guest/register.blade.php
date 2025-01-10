<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Avis</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-home-navbar custom="fixed top-0 z-10 opacity-0 hover:opacity-100 transition ease-in-out duration-500" />
    <div class="bg-[#d6d9de] h-screen">
        <div class="flex justify-between align-middle" style="height: 100%;">
            <div class="left w-1/2 flex items-center flex-col bg-[#4d6d99] glass justify-center [&_p]:text-white ">
                <p class="text-6xl font-semibold mb-3">Welcome Back !</p>
                <p class="text-lg">To Keep Connected With Us</p>
                <p class="text-lg">Please Login With Your</p>
                <p class="text-lg">Personal Info</p>
                <a href="/login" class="btn rounded-3xl w-2/6 mt-3 border-gray-0 bg-transparent text-white">Login</a>
            </div>

            <div class="right w-1/2 flex flex-col items-center justify-center pt-5 bg-radial-erin">
                <x-icon-amal-valley class="w-1/5 " />
                <p class="text-4xl font-semibold">Create Account</p>
                <p class="text-slate-500">Please Enter Your Personal Details</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div
                        class="grid grid-cols-2 gap-4 mt-3 [&_.input]:rounded-2xl [&_.input]:bg-[#7486ab] [&_input]:placeholder:text-slate-800 [&_input]:border-none">
                        <div>
                            <p>First Name</p>
                            <label class="input input-bordered flex items-center gap-2 ">
                                <input type="text" name="firstname" class="grow focus:ring-0 "
                                    placeholder="Enter Your First Name" value="{{ old('firstname') }}" required />
                            </label>
                        </div>
                        <div>
                            <p>Last Name</p>
                            <label class="input input-bordered flex items-center gap-2">
                                <input type="text" name="lastname" value="{{ old('lastname') }}"
                                    class="grow focus:ring-0" placeholder="Enter Your Last Name" required />
                            </label>
                        </div>
                        <div class="col-span-2">
                            <p>Email</p>
                            <label class="input input-bordered flex items-center gap-2">
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="grow focus:ring-0" placeholder="Enter Your Email" required />
                            </label>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="col-span-2">
                            <p>Password</p>
                            <label class="input input-bordered flex items-center gap-2">
                                <input type="password" name="password" class="grow focus:ring-0"
                                    placeholder="Create Password" required />
                            </label>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        </div>
                        <div class="col-span-2">
                            <p>Password</p>
                            <label class="input input-bordered flex items-center gap-2">
                                <input type="password" name="password_confirmation" class="grow focus:ring-0"
                                    placeholder="Re-type Password" required />
                            </label>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                        </div>
                    </div>
                    <label class="cursor-pointer label justify-start">
                        <input type="checkbox" class="checkbox checkbox-sm" name="agreeTerm" />
                        <span class="label-text ms-3">I agree with the Term and Privacy Usage</span>
                    </label>
                    <button class="btn bg-[#e9d6f1] w-full rounded-xl text-2xl mt-3">Create Account</button>
                    <p class="text-center text-gray-500 mt-3">Already have an account ? <a href="/login"
                            class="text-blue-500">Sign In</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
