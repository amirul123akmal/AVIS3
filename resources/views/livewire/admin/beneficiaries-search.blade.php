<div>
    <input type="text" wire:model.live="search" placeholder="Search Beneficiaries..." class="form-control">
    <ul class="list-group mt-3">

        @foreach ($beneficiaries as $beneficiary)
        <div class="bg-white rounded-lg p-4 mb-4 flex justify-between items-center shadow-sm">
            <span class="font-medium">{{ $beneficiary->fullname }}</span>
            <div class="space-x-2">
                <a href="{{ route('View-User-Information', ['id' => $beneficiary->actorID]) }}" class="btn btn-sm bg-purple-100 hover:bg-purple-200 border-none text-black">View</a>
                <a href="{{ route('Update-User-Information', ['id' => $beneficiary->actorID]) }}" class="btn btn-sm bg-purple-100 hover:bg-purple-200 border-none text-black">Update</a>
            </div>
        </div>
        @endforeach
    </ul>
    <div wire:pagination.no-scroll>
        {{ $beneficiaries->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>
</div>