<div class="drawer">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        {{ $slot }}
    </div>
    <div class="drawer-side">
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4 [&_.main]:ps-4 [&_.sub]:ps-6">
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
        </ul>
    </div>
</div>
