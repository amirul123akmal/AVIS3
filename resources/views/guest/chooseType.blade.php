<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Applying As</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <div class="container mx-auto">
        <div class="flex items-center w-full justify-center mt-24">
            <button class="rounded-3xl text-white bg-[#1f5a6c] h-10 px-6 font-serif">
                Newbie's Guide
            </button>
        </div>
        <p class="text-7xl text-center font-serif mt-24">Apply as</p>
        <section class="flex w-full mt-10 [&_a]:w-2/6">
            <a href="choose/volunteers"
                class="left mx-auto me-8 h-60 rounded-3xl bg-white flex flex-col items-center justify-center ">
                <img src="{{ Vite::asset('resources/images/advisor.png') }}" class="size-20 mb-5">
                <p class="text-blue-700 font-serif text-xl">Volunteer</p>
                <p class="text-slate-600 font-serif text-xl">Get to know the company</p>
            </a>
            <a href="choose/beneficiaries"
                class="right mx-auto ms-0 rounded-3xl bg-white flex flex-col items-center justify-center">
                <img src="{{ Vite::asset('resources/images/url.png') }}" class="size-20 mb-5">
                <p class="text-blue-700 font-serif text-xl">Beneficiaries</p>
                <p class="text-slate-600 font-serif text-xl">Learn more through these resources</p>
            </a>

        </section>
    </div>
</body>

</html>
