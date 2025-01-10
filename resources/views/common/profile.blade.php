<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Profile</title>
</head>
{{-- Remember, user only care the functionality --}}
{{-- Not the coding --}}
@admin
    <x-admin-sidebar>
        <x-admin-navbar />
        <div class="container bg-base-100 p-6 mx-auto">
            <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 ">
                <h1 class="text-xl font-bold mb-4">Profile</h1>

                <div class="flex items-center mb-4">
                    <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center">
                        <i class="bi bi-person-fill text-4xl text-gray-500"></i>
                    </div>
                    <div class="ml-4">
                        <h2 class="font-semibold">{{ $user->actor->fullname }}</h2>
                        <p class="text-gray-700">{{ $user->username }}</p>
                    </div>
                </div>
                <div class="flex gap-x-5 mx-auto">
                    <div class="mb-4 w-full">
                        <label class="block text-sm font-medium">IC Number</label>
                        <input type="text" value="{{ $user->actor->ic }}" class="input input-bordered w-full" readonly />
                    </div>
                    <div class="mb-4 w-full">
                        <label class="block text-sm font-medium">Username</label>
                        <input type="text" value="{{$user->username}}" class="input input-bordered w-full" readonly />
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" value="{{$user->email}}" class="input input-bordered w-full" readonly />
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium">Password</label>
                    <input type="text" value="*******" class="input input-bordered w-full" readonly />
                </div>
                
                <div class="flex gap-x-5 mx-auto [&_.mb-4]:w-full">
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Phone Number</label>
                        <input type="text" value="{{ $user->actor->phoneNumber }}" class="input input-bordered w-full" readonly />
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Birth Date</label>
                        <input type="text" value="19 / 02 / 1999" class="input input-bordered w-full" readonly />
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Address</label>
                    <textarea class="textarea textarea-bordered w-full" readonly>{{ $user->actor->address->road }}</textarea>
                </div>
                <div class="flex gap-x-5">
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Postcode</label>
                        <input type="text" value="{{ $user->actor->address->postcode }}" class="input input-bordered w-full" readonly />
                    </div>
    
                    <div class="mb-4">
                        <label class="block text-sm font-medium">State</label>
                        <select class="select select-bordered w-full" readonly>
                            @foreach ($states as $state)
                                <option value="{{ $state->statename }}" {{ $user->actor->state == $state->statename ? 'selected' : '' }}>{{ $state->statename }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex justify-between mt-6">
                    <button class="btn btn-primary">Update</button>
                    <button class="btn btn-secondary">Delete</button>
                </div>
            </div>
        </div>
    </x-admin-sidebar>
@endadmin
@beneficiary
    <x-ben-sidebar>
        <x-ben-navbar />
        <div class="container bg-base-100 p-6 mx-auto">
            <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 ">
                <h1 class="text-xl font-bold mb-4">Profile</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/profile" method="POST" class="updatingForm">
                    @csrf
                    @method('PATCH')
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center">
                            <i class="bi bi-person-fill text-4xl text-gray-500"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="font-semibold">{{ $user->actor->fullname }}</h2>
                            <p class="text-gray-700">{{ $user->username }}</p>
                        </div>
                    </div>
                    <div class="flex gap-x-5 mx-auto">
                        <div class="mb-4 w-full">
                            <label class="block text-sm font-medium">IC Number</label>
                            <input type="text" name="ic_number" value="{{ $user->actor->ic }}" class="input input-bordered w-full" readonly />
                        </div>
                        <div class="mb-4 w-full">
                            <label class="block text-sm font-medium">Username</label>
                            <input type="text" name="username" value="{{$user->username}}" class="input input-bordered w-full" readonly />
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" value="{{$user->email}}" class="input input-bordered w-full" readonly />
                    </div>                   
                    <div class="flex gap-x-5 mx-auto [&_.mb-4]:w-full">
                        <div class="mb-4">
                            <label class="block text-sm font-medium">Phone Number</label>
                            <input type="text" name="phone_number" value="{{ $user->actor->phoneNumber }}" class="input input-bordered w-full" readonly />
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium">Address</label>
                        <textarea name="address" class="textarea textarea-bordered w-full" readonly>{{ $user->actor->address->road }}</textarea>
                    </div>
                    <div class="flex gap-x-5">
                        <div class="mb-4">
                            <label class="block text-sm font-medium">Postcode</label>
                            <input type="text" name="postcode" value="{{ $user->actor->address->postcode }}" class="input input-bordered w-full" readonly />
                        </div>
        
                        <div class="mb-4">
                            <label class="block text-sm font-medium">State</label>
                            <select name="state" class="select select-bordered w-full" readonly>
                                @foreach ($states as $state)
                                    <option value="{{ $state->stateID }}" {{ $user->actor->address->stateID == $state->stateID ? 'selected' : '' }}>{{ $state->statename }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-between mt-6">
                        <button class="btn btn-primary updating">Update</button>
                        <button class="btn btn-secondary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </x-ben-sidebar>
@endbeneficiary
@volunteer
    <x-vol-sidebar>
        <x-vol-navbar />
        <div class="container bg-base-100 p-6 mx-auto">
            <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 ">
                <h1 class="text-xl font-bold mb-4">Profile</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/profile" method="POST" class="updatingForm">
                    @csrf
                    @method('PATCH')
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center">
                            <i class="bi bi-person-fill text-4xl text-gray-500"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="font-semibold">{{ $user->actor->fullname }}</h2>
                            <p class="text-gray-700">{{ $user->username }}</p>
                        </div>
                    </div>
                    <div class="flex gap-x-5 mx-auto">
                        <div class="mb-4 w-full">
                            <label class="block text-sm font-medium">IC Number</label>
                            <input type="text" name="ic_number" value="{{ $user->actor->ic }}" class="input input-bordered w-full" readonly />
                        </div>
                        <div class="mb-4 w-full">
                            <label class="block text-sm font-medium">Username</label>
                            <input type="text" name="username" value="{{$user->username}}" class="input input-bordered w-full" readonly />
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" value="{{$user->email}}" class="input input-bordered w-full" readonly />
                    </div>                   
                    <div class="flex gap-x-5 mx-auto [&_.mb-4]:w-full">
                        <div class="mb-4">
                            <label class="block text-sm font-medium">Phone Number</label>
                            <input type="text" name="phone_number" value="{{ $user->actor->phoneNumber }}" class="input input-bordered w-full" readonly />
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium">Address</label>
                        <textarea name="address" class="textarea textarea-bordered w-full" readonly>{{ $user->actor->address->road }}</textarea>
                    </div>
                    <div class="flex gap-x-5">
                        <div class="mb-4">
                            <label class="block text-sm font-medium">Postcode</label>
                            <input type="text" name="postcode" value="{{ $user->actor->address->postcode }}" class="input input-bordered w-full" readonly />
                        </div>
        
                        <div class="mb-4">
                            <label class="block text-sm font-medium">State</label>
                            <select name="state" class="select select-bordered w-full" readonly>
                                @foreach ($states as $state)
                                    <option value="{{ $state->stateID }}" {{ $user->actor->address->stateID == $state->stateID ? 'selected' : '' }}>{{ $state->statename }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-between mt-6">
                        <button class="btn btn-primary updating">Update</button>
                        <button class="btn btn-secondary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </x-vol-sidebar>
@endvolunteer
<script>
    // Ensure the DOM is fully loaded
    window.addEventListener('load', function() {
        // Select the update button
        const updateButton = document.querySelector('.updating');

        // Select all input fields and textareas with readonly attribute
        const readonlyElements = document.querySelectorAll('input[readonly], textarea[readonly]');

        // Add click event listener to the update button
        updateButton.addEventListener('click', function() {
            event.preventDefault();
            console.log(updateButton.innerHTML);
            if(updateButton.innerHTML == 'Update'){
                updateButton.innerHTML = 'Save';
                updateButton.classList.add('btn-success');
                readonlyElements.forEach(function(element) {
                    element.removeAttribute('readonly');
                });
            }else{
            const form = document.querySelector('.updatingForm');
            form.submit();
            }
        });
    });
</script>
</html>
