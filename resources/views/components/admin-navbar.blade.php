<div class="navbar bg-white">
    <div class="flex-none">
        <label for="my-drawer" class="btn btn-primary btn-ghost drawer-button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="inline-block h-5 w-5 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </label>
        <x-icon-amal-valley class="w-3/5" />
    </div>
    <div class="flex-1 flex-col">
    </div>
    <div class="flex-end">
        <details class="dropdown dropdown-end">
            <summary class="btn btn-ghost m-1" onclick="event.preventDefault()">

            </summary>
            <ul class="menu dropdown-content bg-base-200 rounded-box z-[1] w-52 p-2 shadow">
                <li>

                </li>
                <li><a href="#">Item 2</a></li>
            </ul>
        </details>
        <div class="dropdown dropdown-bottom dropdown-end">
            <div tabindex="0" role="button" class="btn m-1 bg-base-100">...</div>
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                <li>
                    <form action="/logout" method="POST" class="flex">
                        {{ csrf_field() }}
                        <button type="submit" class="grow text-start">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
