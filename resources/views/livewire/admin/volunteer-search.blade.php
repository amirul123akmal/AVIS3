<div>
    <input type="text" wire:model.live="search" placeholder="Search Volunteers..." class="form-control">
    <ul class="list-group mt-3">

        @foreach ($volunteers as $volunteer)
        <div class="bg-white rounded-lg p-4 mb-4 flex justify-between items-center shadow-sm">
            <span class="font-medium">{{ $volunteer->fullname }}</span>
            <div class="space-x-2">
                <a href="{{ route('View-User-Information', ['id' => $volunteer->actorID]) }}" class="btn btn-sm bg-purple-100 hover:bg-purple-200 border-none text-black">View</a>
                <a href="{{ route('Update-User-Information', ['id' => $volunteer->actorID]) }}" class="btn btn-sm bg-purple-100 hover:bg-purple-200 border-none text-black">Update</a>
            </div>
        </div>
        @endforeach
    </ul>
    <div>
        {{ $volunteers->onEachSide(1)->links(data: ['scrollTo' => false]) }}
    </div>
</div>