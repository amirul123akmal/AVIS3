@props(['custom' => '""'])
<div class="navbar bg-white {{ $custom }}">
    <div class="flex-none">
        <a href="/">
            <x-icon-amal-valley class="w-3/5 ms-5" />
        </a>
    </div>
    <div class="flex-1 justify-end">
    </div>
    <div class="flex-end [&_a]:me-8">
        <a href="What-Are-We" class="">
            What We Do
        </a>
        <a href="We-Serve" class="">
            Who We Serve
        </a>
        <a href="login" class="">
            Get Involved
        </a>
        <a href="About-Us" class="">
            About Us
        </a>
        <a href="/login" class="text-[#1f6d84]">
            Sign In
        </a>
        <a class="btn rounded-lg bg-[#1f6d84] text-white" href="/register">
            Get Started
        </a>
    </div>
</div>
