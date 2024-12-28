<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Complete Beneficiary Application</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel Triggered Toast</title>
        @livewireStyles
    </head>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mx-auto w-4/5">
        <div class="text-center">
            <h1 class="font-bold text-2xl">Beneficiary Application</h1>
            <p class="mt-3 text-gray-400 text-xl">Complete All The Information Required Below</p>
        </div>
        <div class="divider divider-neutral p-0 mt-1"></div>
        <section class="bg-white rounded-xl h-vh py-4 px-6 mt-4 mx-6 mb-10">
            <div class="flex items-center gap-x-4">
                <p class="font-semibold text-2xl">Number of Dependents :</p>
                <input type="text" id="Number of Dependents" class="input border-none focus:ring-0 focus:border-none"
                    value="-1">
            </div>

            <section>
                <div class="flex flex-wrap items-center gap-y-6 gap-x-6 mt-10 px-4 sm:px-6 lg:px-8">

                    @php($count = count($names))
                    @for ($i = 0; $i < $count; $i++)
                        @livewire('SendDocuments', ['title' => $names[$i], 'types' => $types[$i], 'multiple' => $types[$i] == 'supportDocument' ? true : false])
                    @endfor

            </section>
            <div class="flex justify-end me-10">
                <input type="submit" class="btn btn-success" id="submitButton">
            </div>
        </section>
    </div>
    @livewireScripts
    <script>
        document.getElementById('submitButton').addEventListener('click', function() {
            const formData = new FormData();
            formData.append('numOfDependents', document.getElementById('Number of Dependents').value);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

            const actionURL = '/storeDocument'; // Update this to the actual route if different

            fetch(actionURL, {
                    method: 'POST',
                    body: formData,
                })
                .then(async response => {
                    if (!response.ok) {
                        // Handle errors
                        const errorData = await response.json();
                        if (response.status === 422) {
                            // Validation errors
                            console.error('Validation errors:', errorData.errors);
                            for (const [field, messages] of Object.entries(errorData.errors)) {
                                // alert(`${field}: ${messages}`); // Display error messages
                                alertify.error(`${messages}`);

                            }
                        } else {
                            console.error('Error response:', errorData);
                            // alert(errorData.message);
                            alertify.error(errorData.message);
                        }
                        return;
                    }

                    // Handle valid responses
                    const data = await response.json();
                    if (data.status === 'redirect') {
                        // Redirect to specified URL
                        window.location.href = data.url;
                    } else if (data.status === 'success') {
                        // Handle success response
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                });
        });
    </script>
</body>

</html>
