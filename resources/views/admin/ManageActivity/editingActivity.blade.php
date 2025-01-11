<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Activity</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<x-admin-sidebar>
    <x-admin-navbar />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    alertify.error('{{ $error }}');
                @endforeach
            @endif

            @if (session('success'))
                alertify.success('{{ session('success') }}');
            @endif
        });
    </script>
    <div class="container mx-auto">
        
        <form action="{{ route('activity.editPost', ['id' => $activity->activityID]) }}" method="post" enctype="multipart/form-data" class="flex-col gap-y-5 md:flex-row flex justify-center items-center mt-10 mx-auto gap-x-4 ">
            @csrf
            @method('PUT')
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md ">
                <h2 class="text-3xl font-bold mb-6 text-center">Edit Activity</h2>
                <div class="mb-4">
                    <label for="activityName" class="block text-sm font-medium text-gray-700">Activity Name <span class="text-red-500">*</span></label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" id="activityName" name="activityName" value="{{ $activity->activityName }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-3 pr-3 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Enter activity name" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="activityPlace" class="block text-sm font-medium text-gray-700">Activity Place/Location <span class="text-red-500">*</span></label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" id="activityPlace" name="activityPlace" value="{{ $activity->activityPlace }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-3 pr-3 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Enter activity place/location" required>
                    </div>
                </div>
                <div class="flex gap-x-4 mb-4">
                    <div class="w-1/2">
                        <label for="volunteerCount" class="block text-sm font-medium text-gray-700">Volunteer Count <span class="text-red-500">*</span></label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="number" id="volunteerCount" name="volunteerCount" value="{{ $activity->volunteerCount }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-3 pr-3 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Enter number of volunteers" required>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <label for="beneficiaryCount" class="block text-sm font-medium text-gray-700">Beneficiary Count <span class="text-red-500">*</span></label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="number" id="beneficiaryCount" name="beneficiaryCount" value="{{ $activity->beneficiaryCount }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-3 pr-3 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Enter number of beneficiaries" required>
                        </div>
                    </div>
                </div>
                <div class="flex gap-x-4" >
                    <div class="mb-4 w-1/2">
                        <label for="timeStart" class="block text-sm font-medium text-gray-700">Time Start <span class="text-red-500">*</span></label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="time" id="timeStart" name="timeStart" value="{{ substr($activity->timeStart, 0, 5) }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 pr-3 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="HH:MM" required>  
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-clock text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 w-1/2">
                        <label for="timeEnd" class="block text-sm font-medium text-gray-700">Time End <span class="text-red-500">*</span></label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="time" id="timeEnd" name="timeEnd" value="{{ substr($activity->timeEnd, 0, 5) }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 pr-3 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="HH:MM" required>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-clock text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-6 flex gap-x-4">
                    <div class="w-1/2">
                        <label for="dateStart" class="block text-sm font-medium text-gray-700">Date Start <span class="text-red-500">*</span></label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="date" id="dateStart" name="dateStart" value="{{ $activity->dateStart }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 pr-3 py-2 sm:text-sm border-gray-300 rounded-md" required>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-calendar text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <label for="dateEnd" class="block text-sm font-medium text-gray-700">Date End <span class="text-red-500">*</span></label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="date" id="dateEnd" name="dateEnd" value="{{ $activity->dateEnd }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 pr-3 py-2 sm:text-sm border-gray-300 rounded-md" required>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-calendar text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="activityDescription" class="block text-sm font-medium text-gray-700">Activity Description <span class="text-red-500">*</span></label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <textarea id="activityDescription" name="activityDescription" rows="4" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-3 pr-3 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Enter a brief description of the activity" required>{{ $activity->activityDescription }}</textarea>
                    </div>
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg w-full md:w-1/3">
                <h3 class="text-2xl font-bold mb-6 text-center">Upload Activity Image</h3>
                <div class="mb-4">
                    <label for="activityImage" class="block text-sm font-medium text-gray-700">Choose an image</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <i class="bi bi-image text-4xl text-gray-400"></i>
                            <div class="text-sm">
                                <label for="activityImage" class="font-medium text-indigo-600 hover:text-indigo-500 cursor-pointer">
                                    Upload an image
                                </label>
                                <p class="text-gray-500">or drag and drop</p>
                            </div>
                            <input type="file" id="activityImage" name="activityImage" class="hidden" accept="image/jpeg, image/png, image/jpg">
                        </div>
                    </div>
                    <img id="imagePreview" src="{{ asset('storage/' . $activity->activityImage) }}" alt="Preview of selected image" class="w-full rounded-md mt-4" />
                </div>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('activityImage').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('imagePreview').src = '#';
                alert('Please select a valid image file.');
            }
        });
    </script>
</x-admin-sidebar>

</html>