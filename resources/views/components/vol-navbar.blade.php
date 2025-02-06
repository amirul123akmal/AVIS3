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
    <div class="flex items-center">
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost">
                <img src="path/to/my/image.jpg" alt="Profile Picture" class="w-8 h-8 rounded-full" />
            </label>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-48">
                <li><a href="{{ route('profile.edit') }}">My Profile</a></li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <li><button type="submit">Logout</button></li>
                </form>
            </ul>
        </div>
    </div>
</div>
