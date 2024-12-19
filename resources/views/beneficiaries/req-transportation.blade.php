<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request Transportation Application</title>
    @vite(['resources/css/app.css'])
</head>

<body>

    <x-ben-sidebar>
        <x-ben-navbar />
        <div class="fixed bottom-0 left-0 ...">
            <p>Absolute child</p>
        </div>
        <div class="container mx-auto">
            <div class="text-center">
                <h1 class="font-bold text-4xl">Request Transportation Application</h1>
                <p class="mt-3 text-gray-400 text-2xl">Complete All The Information Required Below</p>
            </div>
            <section
                class="[&_.card]:grow [&_.card]:items-center [&_.card]:justify-center [&_.card]:align-middle [&_.card]:h-16 bg-[#9dc7d7] h-20 mt-5 flex space-x-4 [&_i]:text-4xl [&_i]:rounded-full [&_i]:border-4 [&_i]:p-1 [&_i]:border-[#131e2f] items-center gap-6 px-4">
                <div class="card bg-[#6e9fb2] group">
                    <div class="flex items-center justify-center">
                        <i class="bi bi-person-circle"></i>
                        <span class="text-lg font-semibold ps-3">Personal Details</span>
                    </div>
                </div>
                <div class="card hover:bg-[#4b6d7b] hover:text-white group">
                    <div class="flex items-center justify-center ">
                        <i class="group-hover:border-white bi bi-car-front-fill"></i>
                        <span class="text-lg font-semibold ps-3">Transport Details</span>
                    </div>
                </div>
                <div class="card hover:bg-[#4b6d7b] hover:text-white group">
                    <div class="flex items-center justify-center ">
                        <i class="group-hover:border-white bi bi-clipboard-check-fill"></i>
                        <span class="text-lg font-semibold ps-3">Status Application</span>
                    </div>
                </div>
            </section>
            <div class="divider divider-neutral p-0 mt-1"></div>
            <section class="flex flex-row justify-between px-6 gap-4 [&_div]:bg-white [&_div]:rounded-lg [&_div]:h-16 ">
                <div class="w-72 flex items-center justify-center ">
                    <p class="font-bold text-3xl text-red-500">90%</p>
                    <span class="text-lg font-semibold ps-3 ">Completed Details</span>
                </div>
                <div class="grow flex items-center justify-center ">
                    <i class="bi bi-exclamation-octagon-fill text-4xl text-blue-900"></i>
                    <span class="text-lg font-semibold ps-3">Remember to check your detail correctly</span>
                </div>
            </section>
            <section class="bg-white rounded-xl h-vh py-4 px-6 mt-4 mx-6 mb-10">
                <form action="">
                    @csrf
                    <p class="font-bold text-3xl">Personal Info</p>
                    <section {{-- PERSONAL INFO --}}
                        class="grid grid-cols-2 gap-6 gap-x-8 mt-2 [&_input]:rounded-2xl [&_input]:bg-pink-100 [&_input]:h-12 [&_input]:ps-10 [&_input]:font-bold mb-20">
                        <input type="text" class="text-gray-400 text-2xl" name="benName"
                            value="NAME : NUR SYAZREEN BT SHUHAIMI" disabled>
                        <input type="text" class="text-gray-400 text-2xl" name="benStatusIncome"
                            value="STATUS INCOME : B40" disabled>
                        <input type="text" class="text-gray-400 text-2xl" name="benIC"
                            value="IC NUM : 012345-16-7889" disabled>
                        <input type="text" class="text-gray-400 text-2xl" name="benPhoneNum"
                            value="PHONE NUMBER : 018-98655678" disabled>
                    </section>
                    <p class="font-bold text-3xl">Transport Section</p>
                    <section
                        class="flex justify-between mt-2 [&_input]:rounded-2xl [&_input]:bg-pink-100 [&_input]:h-12 [&_input]:ps-10">
                        <div class="w-2/4">
                            <p class="font-semibold text-2xl">Transport Type:</p>
                            <label class="form-control w-full max-w-xs ">
                                <select class="select bg-pink-100" name="transportType">
                                    <option disabled selected>Pick one</option>
                                    <option>Ambulan</option>
                                    <option>Lorry</option>
                                </select>
                            </label>
                        </div>
                        <div class="w-1/4">
                            <p class="font-semibold text-2xl">Date:</p>
                            <input type="date" class="text-gray-400 text-2xl font-bold" value="2025-06-15"
                                name="dateRequest">
                        </div>
                    </section>
                    <p class="font-semibold text-2xl mt-5">Address From:</p>
                    <section
                        class="grid grid-cols-2 gap-6 gap-x-8 [&_input]:rounded-2xl [&_input]:bg-pink-100 [&_input]:h-12 [&_input]:ps-10 [&_input]:font-bold mb-16 w-2/3">
                        <input type="text" class="text-gray-400 text-2xl" name="addressFrom" placeholder="Address">
                        <label class="form-control w-full rounded-4xl">
                            <select class="select bg-pink-100 text-gray-400 text-2xl font-bold" name="StateFrom">
                                <option disabled selected>States</option>
                                <option value="W.P. Putrajaya">W.P. Putrajaya</option>
                                <option value="W.P. Labuan">W.P. Labuan</option>
                                <option value="W.P. Kuala Lumpur">W.P. Kuala Lumpur</option>
                                <option value="Sabah">Sabah</option>
                                <option value="Sarawak">Sarawak</option>
                                <option value="Johor">Johor</option>
                                <option value="Melaka">Melaka</option>
                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                <option value="Pahang">Pahang</option>
                                <option value="Selangor">Selangor</option>
                                <option value="Perak">Perak</option>
                                <option value="Penang">Penang</option>
                                <option value="Terengganu">Terengganu</option>
                                <option value="Kedah">Kedah</option>
                                <option value="Kelantan">Kelantan</option>
                                <option value="Perlis">Perlis</option>
                            </select>
                        </label>
                        <input type="text" class="text-gray-400 text-2xl" placeholder="Postcode" name="postcodeFrom">
                        <input type="text" class="text-gray-400 text-2xl" placeholder="City" name="cityFrom">
                    </section>
                    <p class="font-semibold text-2xl mt-5">Address To:</p>
                    <section
                        class="grid grid-cols-2 gap-6 gap-x-8 [&_input]:rounded-2xl [&_input]:bg-pink-100 [&_input]:h-12 [&_input]:ps-10 [&_input]:font-bold mb-10 w-2/3">
                        <input type="text" class="text-gray-400 text-2xl" placeholder="Address" name="addressTo">
                        <label class="form-control w-full rounded-4xl">
                            <select class="select bg-pink-100 text-gray-400 text-2xl font-bold" name="stateTo">
                                <option disabled selected>States</option>
                                <option value="W.P. Putrajaya">W.P. Putrajaya</option>
                                <option value="W.P. Labuan">W.P. Labuan</option>
                                <option value="W.P. Kuala Lumpur">W.P. Kuala Lumpur</option>
                                <option value="Sabah">Sabah</option>
                                <option value="Sarawak">Sarawak</option>
                                <option value="Johor">Johor</option>
                                <option value="Melaka">Melaka</option>
                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                <option value="Pahang">Pahang</option>
                                <option value="Selangor">Selangor</option>
                                <option value="Perak">Perak</option>
                                <option value="Penang">Penang</option>
                                <option value="Terengganu">Terengganu</option>
                                <option value="Kedah">Kedah</option>
                                <option value="Kelantan">Kelantan</option>
                                <option value="Perlis">Perlis</option>
                            </select>
                        </label>
                        <input type="text" class="text-gray-400 text-2xl" placeholder="Postcode"
                            name="postcodeTo">
                        <input type="text" class="text-gray-400 text-2xl" placeholder="City" name="cityTo">
                    </section>
                    <p class="font-semibold text-2xl mt-5">Notes :</p>
                    <textarea class="rounded-2xl bg-pink-100 ps-10 font-bold text-gray-600 text-lg w-3/5 min-h-52"
                        placeholder="Leave a message here...." name="message"></textarea>
                    <div class="flex justify-end me-10">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </section>
        </div>
    </x-ben-sidebar>
</body>

</html>
