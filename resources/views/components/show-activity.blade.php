<div class="flex items-center justify-center">
    <div class="w-96 flex flex-col gap-y-2 ">
        <img src="{{ Vite::asset('resources/images/activities/' . $imagePath) }}"
            class="object-cover rounded-tl-full rounded-tr-full h-48" alt="">

        <div class="w-full bg-[#e5c9fb] min-h-64 flex justify-center static">
            <div
                class="absolute rounded-full size-20 bg-white flex justify-center items-center font-semibold text-2xl justify-self-center -translate-y-10">
                {{ $num }}
            </div>
            <div class="flex flex-col justify-center items-center -mb-0">
                <p class="text-2xl font-semibold">{{ $title }}</p>
                <p class="px-20 font-semibold">Location : {{ $location }}</p>
                <p class="font-semibold mt-3">Date : {{ $date }}</p>
                <a href="{{ $link }}" class="mt-3 text-blue-700 font-semibold">More Info</a>
            </div>
        </div>
    </div>
</div>
