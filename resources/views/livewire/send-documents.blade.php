<div class="w-full max-w-lg p-6 bg-white rounded-lg shadow-lg dark:bg-gray-500">
    <form wire:submit.prevent="save">
<!-- Validation error message -->
        @error('file')
            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
        @enderror

        <!-- If multiple files -->
        @error('file.*')
            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
        @enderror
        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4 ">
            {{ $title }}{!! $title == 'Income Document' ? '<span class="text-red-400 text-2xl">*</span>' : '' !!}</h2>
        <div
            class="relative border-2 border-dashed border-gray-300 rounded-lg p-6 hover:border-blue-500 focus-within:border-blue-500 cursor-pointer transition-colors bg-gray-700">
            <input type="file" wire:model="file" class="absolute inset-0 opacity-0 cursor-pointer"
                {{ $multiple ? 'multiple' : '' }} accept="application/pdf" />
            <input type="text" wire:model="types" value="{{ $types }}" hidden>

            <p class="text-center text-gray-500 dark:text-gray-400">
                Drag and drop your file here or <span class="text-blue-500 underline cursor-pointer">browse</span>
            </p>
        </div>
        {{-- @error('file')
            <span class="error">{{ $message }}</span>
        @enderror --}}

        @if ($file)
            <div class="mt-4">
                <span class="text-sm text-gray-600 dark:text-gray-300">
                    @php
                        if (is_array($file)) {
                            for ($i = 0; $i < count($file); $i++) {
                                echo $file[$i]->getClientOriginalName() . '<br>';
                            }
                        } else {
                            echo $file->getClientOriginalName();
                        }
                    @endphp
                </span>
            </div>
        @endif

        @if ($uploadStatus)
            <div class="mt-4 text-green-500">{{ $uploadStatus }}</div>
        @else
            <div class="mt-4 text-red-500">Please select a file to upload.</div>
        @endif
        <div wire:loading wire:target="file" class="mt-4 flex items-center space-x-2 text-blue-500">
            <svg class="animate-spin h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
            </svg>
            <span>Uploading...</span>
        </div>
        <button wire:click="save" class="mt-4 btn btn-blue">Upload</button>
    </form>
</div>
