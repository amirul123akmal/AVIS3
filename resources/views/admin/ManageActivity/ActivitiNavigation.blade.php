<div class="col-span-1">
    <h2 class="font-bold mb-2">Activity</h2>
    <div class="mb-4">
        <label class="block text-sm font-medium">Filter by:</label>
        <select class="select select-bordered w-full">
            <option>New Activity</option>
            <option>Current Activity</option>
            <option>Past Activity</option>
        </select>
    </div>
    <div class="mb-4">
        <input type="text" placeholder="Search Activity" class="input input-bordered w-full" />
    </div>
    <h2 class="font-bold mt-4">Manage Activity</h2>
    <div class="flex flex-col gap-y-3 justify-start">
        <a href="{{ route('addActivity') }}" class="btn btn-sm">Create Activity <span
                class="bi bi-plus font-bold text-xl"></span></a>
        <a href="{{ route('activity.edit') }}" class="btn btn-sm">Edit <span class="bi bi-plus font-bold text-xl"></span></a>
        <a href="{{ route('activity.delete') }}" class="btn btn-sm">Delete <span
                class="bi bi-plus font-bold text-xl"></span></a>
    </div>
</div>