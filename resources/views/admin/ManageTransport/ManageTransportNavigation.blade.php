<div class="col-span-1">
    <h2 class="font-bold mb-2">Transport</h2>
    <div class="mb-4">
        <label class="block text-sm font-medium">Filter by:</label>
        <select class="select select-bordered w-full">
            <option>New Activity</option>
            <option>Current Activity</option>
            <option>Past Activity</option>
        </select>
    </div>
    <div class="mb-4">
        <input type="text" placeholder="Search Transport" class="input input-bordered w-full" />
    </div>
    <h2 class="font-bold mt-4">Manage Transport</h2>
    <div class="flex flex-col gap-y-3 justify-start">
        <a href="{{ route('admin.view-transport') }}" class="btn btn-sm">View Transport <span class="bi bi-plus font-bold text-xl"></span></a>
        <a href="{{ route('Create-Transport') }}" class="btn btn-sm">Create Transport <span class="bi bi-plus font-bold text-xl"></span></a>
        <a href="{{ route('Update-Transport') }}" class="btn btn-sm">Edit Transport <span class="bi bi-plus font-bold text-xl"></span></a>
        <a href="{{ route('Delete-Transport') }}" class="btn btn-sm">Delete Transport <span class="bi bi-plus font-bold text-xl"></span></a>
        <a href="{{ route('Manage-Driver') }}" class="btn btn-sm">Manage Driver <span class="bi bi-plus font-bold text-xl"></span></a>
        <a href="{{ route('current-busy-driver') }}" class="btn btn-sm">Current Busy Driver <span class="bi bi-plus font-bold text-xl"></span></a>
    </div>
</div>