<div class="drawer">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        {{ $slot }}
    </div>
    <div class="drawer-side">
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu text-base-content min-h-full w-80 p-4 [&_.main]:ps-4 [&_.sub]:ps-6 bg-[#8cd5ef]">
            @php
                $linking = [
                    [
                        'name' => 'Homepage',
                        'link' => 'vol.homepage',
                        'icon' => 'bi-house-fill',
                    ],
                    [
                        'name' => 'Joined Activity',
                        'link' => 'vol.joinedActivities',
                        'icon' => 'bi-activity',
                    ],
                    [
                        'name' => 'Outdated Activity',
                        'link' => 'vol.outdateActivity',
                        'icon' => 'bi-activity',
                    ],
                ];
            @endphp
            <section class="flex p-4">
                <svg fill="none" height="42" viewBox="0 0 32 32" width="42"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect height="100%" rx="16" width="100%"></rect>
                    <path clip-rule="evenodd"
                        d="M17.6482 10.1305L15.8785 7.02583L7.02979 22.5499H10.5278L17.6482 10.1305ZM19.8798 14.0457L18.11 17.1983L19.394 19.4511H16.8453L15.1056 22.5499H24.7272L19.8798 14.0457Z"
                        fill="currentColor" fill-rule="evenodd"></path>
                </svg>
                <div class="flex flex-col">
                    <span>AVIS</span>
                    <span class="text-xs font-normal">Amal Valley Information System</span>
                </div>
            </section>
            @foreach ($linking as $item)
                <a class="h-20 hover:bg-cyan-600 rounded-xl flex items-center p-8" href="{{ route($item['link']) }}">
                    <span class="bi {{ $item['icon'] }} text-4xl">
                    </span>
                    <p class="ps-4 pt-2 text-2xl font-serif">{{ $item['name'] }}</p>
                </a>
            @endforeach
        </ul>
    </div>
</div>
