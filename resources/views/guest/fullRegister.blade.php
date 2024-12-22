<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Completing Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white bg-radial-erin" x-data="{ open: false, selectedState: 'Select State...', selectedID: '-1' }">
    <div class=" container flex justify-center items-center mx-auto">
        <div x-bind:class="!open ? 'mt-20' : ''"
            class="px-10 py-7 h-full bg-blue-900 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-10 border border-gray-100 mx-auto">
            <div class="text-center mb-3">
                <div class="flex flex-col justify-center items-center">
                    <x-icon-amal-valley class="w-40" />
                    <p class="font-semibold text-3xl">Profile</p>

                </div>
                <p class="font-semibold">Please fill in your details</p>
            </div>
            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="" method="POST">
                @csrf
                <section class="flex flex-col [&_input]:rounded-lg [&_input]:border-none [&_p]:font-semibold ">
                    <label>
                        <p>Full Name</p>
                        <input type="text" class="w-full focus:ring-0" name="fullname">
                    </label>
                    <div class="flex mt-2">
                        <label class="">
                            <p>IC Number</p>
                            <input class="w-64 focus:ring-0" type="text" name="icnum">
                        </label>
                        <label class="ps-4 ">
                            <p>Phone Number</p>
                            <input class="w-64 focus:ring-0" type="text" name="phoneNumber">
                        </label>
                    </div>
                    <label class="mt-2">
                        <p>Address</p>
                        <textarea type="text" class="w-full h-20 focus:ring-0 resize-none rounded-lg border-none" name="address"></textarea>
                    </label>
                    <div class="flex mt-2">
                        <label class="">
                            <p>Postcode</p>
                            <input class="w-64 focus:ring-0" type="text" name="postcode">
                        </label>
                        <label class="ps-4 w-full">
                            <p>State</p>
                            <input type="button" :value="selectedState" class="bg-white h-10 w-full"
                                @click="open = !open">
                            <input type="text" id="stateid" name="stateID" :value="selectedID" hidden>
                        </label>
                    </div>
                    <button type="submit"
                        class="btn mt-5 bg-purple-300 text-purple-800 text-3xl hover:bg-purple-600 hover:text-purple-200 transition duration-500">Submit</button>
                </section>
            </form>
        </div>
        <div x-show="open" class=" mx-auto mt-12">
            <div class="bg-blue-300 rounded-md">
                <div class="rounded-t-md text-center py-1 sticky bg-slate-400">State</div>
                <div class="px-6 py-4 pt-2 text-center">
                    @foreach ($states as $state)
                        <p class="cursor-pointer rounded-lg hover:bg-blue-200 py-1 px-3"
                            @click="selectedState ='{{ $state['statename'] }}', selectedID = '{{ $state['stateID'] }}', open=false">
                            {{ $state['statename'] }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</body>

</html>
