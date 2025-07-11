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
        <div class="dropdown dropdown-end">
            <!-- User Dropdown Trigger -->
            <label tabindex="0" class="btn btn-ghost ">
                {{ auth()->user()->username }}
            </label>
            <!-- Dropdown Menu -->
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 pb-0 shadow">
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="w-full text-left">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
