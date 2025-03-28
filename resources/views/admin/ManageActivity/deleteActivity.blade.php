<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Activity</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-admin-sidebar>
        <x-admin-navbar />
        <div class="container mx-auto bg-base-100 p-6">
            <div class="bg-purple-200 p-6 rounded-lg mb-6 flex w-full">
                <div class="w-1/2 flex flex-col justify-center">
                    <h1 class="text-4xl font-bold mb-3">New Activity Added</h1>
                    <p class="text-xl px-2">The activity has been successfully created! Below are the details of the newly added activity.
                        You
                        can review and make any necessary changes or updates if required.</p>
                </div>
                <div class="w-1/2">
                    <img src="{{ Vite::asset('resources/images/default/discus.jpg') }}" class=" mb-5">
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @include('admin.ManageActivity.ActivitiNavigation')
                <div class="col-span-3">
                    <h2 class="font-bold mb-2">Recently Added</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($allActivity as $activity)
                        <div>
                            <div class="relative w-64 h-40 rounded-lg shadow-md overflow-hidden">
                                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $activity->activityImage) }}');" aria-hidden="true"></div>
                            </div>
                            <div class="p-4 w-full">
                                <h3 class="font-bold text-black">{{ $activity->activityName }}</h3>
                            </div>
                            <div class="text-center bg-red-500 rounded-xl w-20 hover:scale-110">
                                <button type="submit" class="text-white hover:scale-110" onclick="toggleModal({{ $activity->activityID }})" >Delete</button>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-admin-sidebar>
<!-- Open the modal using ID.showModal() method -->
<dialog id="my_modal_1" class="modal">
  <div class="modal-box">
    <h3 class="text-lg font-bold">Confirm Deletion</h3>
    <p class="py-4">Are you sure you want to delete this activity?</p>
    <div class="modal-action">
        <button class="btn" onclick="my_modal_1.close()">Cancel</button>
        <form method="POST" id="deleteForm" action="">
        @csrf
        @method('DELETE')
        <button class="btn" type="submit">Delete</button>
      </form>
    </div>
  </div>
</dialog>
<script>
    function toggleModal(id) {
        document.getElementById('my_modal_1').showModal();
        const form = document.getElementById('deleteForm');
        form.action = `{{ route('activity.destroy', '') }}` + '/' + id; // Updated to use named route
    }
</script>   
</body>

</html>
