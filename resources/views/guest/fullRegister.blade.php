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
                        <input type="text" class="w-full focus:ring-0" name="fullname" placeholder="Ali bin Abu" value="{{ old('fullname') }}">
                    </label>
                    <div class="flex mt-2">
                        <label class="">
                            <p>IC Number
                                <span class="text-red-500 text-sm">*Do not put hyphen (-)</span>
                            </p>
                            <input class="w-64 focus:ring-0" type="text" name="icnum" value="{{ old('icnum') }}">
                        </label>
                        <label class="ps-4 ">
                            <p>Phone Number
                                <span class="text-red-500 text-sm">*Do not put hyphen (-)</span>
                            </p>
                            <input class="w-64 focus:ring-0" type="text" name="phoneNumber" value="{{ old('phoneNumber') }}">
                        </label>
                    </div>
                    <div class="flex mt-2">
                        <label class="">
                            <p>Postcode</p>
                            <input class="w-64 focus:ring-0" type="text" name="postcode" placeholder="12345" value="{{ old('postcode') }}">
                        </label>
                        <label class="ps-4 w-full">
                            <p>State</p>
                            <select name="stateID" class="input input-bordered w-full focus:ring-0" required>
                                <option value="" disabled selected>Select State</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state['stateID'] }}" 
                                        {{ old('stateID') == $state['stateID'] ? 'selected' : '' }}>
                                        {{ $state['statename'] }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <label class="mt-2">
                        <p>Address</p>
                        <textarea class="w-full h-20 focus:ring-0 resize-none rounded-lg border-none" name="address" placeholder="No 5, Jalan Bunga Raya...">{{ old('address') }}</textarea>
                    </label>
                    <button type="submit"
                        class="btn mt-5 bg-purple-300 text-purple-800 text-3xl hover:bg-purple-600 hover:text-purple-200 transition duration-500">Submit</button>
                </section>
            </form>
        </div>
    </div>

</body>
<script>
    async function fetchPostcodes() {
        try {
            const response = await fetch('https://cdn.amirul-hub.com/jsonformatter.json'); // Replace with your actual API endpoint
            const data = await response.json();
            return data;
        } catch (error) {
            console.error('Error fetching postcodes:', error);
            return {};
        }
    }
    async function searchPostcode(postcode) {
        const postcodesData = await fetchPostcodes();
        let foundState = null;

        for (const state in postcodesData) {
            if (postcodesData[state].includes(postcode)) {
                foundState = state;
                break;
            }
        }

        if (foundState) {
            const stateElement = Array.from(document.querySelectorAll('select[name="stateID"] option')).find(el => el.textContent.trim() === foundState);
            if (stateElement) {
                stateElement.selected = true; // Set the state dropdown to the found state
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const postcodeInput = document.querySelector('input[name="postcode"]');
        postcodeInput.addEventListener('blur', function() {
            const postcode = postcodeInput.value;
            if (postcode) {
                searchPostcode(postcode);
            }
        });
    });
</script>

</html>
