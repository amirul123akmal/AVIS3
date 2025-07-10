<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Who We Serve</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <x-home-navbar custom="fixed top-0 z-10 opacity-0 hover:opacity-100 transition ease-in-out duration-500" />

    <main class="bg-white min-h-screen flex flex-col items-center pt-20 px-4">

        <header class="text-center mb-12">
            <h1 class="text-3xl font-bold text-blue-900 mb-2">Kempen</h1>
            <p class="text-gray-500 text-sm">Utama &gt; Kempen</p>
        </header>

        <section class="max-w-7xl w-full grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Card 1 -->
            <article class="card bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm flex flex-col">
                <img 
                    src="https://amalvalley.com/wp-content/uploads/2022/05/Lyna-Loose-L.png" 
                    alt="Dana Van Jenazah" 
                    class="w-full h-48 object-cover rounded-t-lg"
                />
                <div class="p-6 flex flex-col flex-grow">
                    <h2 class="text-blue-900 font-semibold mb-3 text-center">Dana Van Jenazah</h2>
                    <p class="text-gray-600 text-sm leading-relaxed text-justify flex-grow">
                        Kesukaran untuk mendapatkan perkhidmatan van jenazah pada harga caj mampu milik menyebabkan tercetusnya idea bagi pihak pertubuhan untuk menyediakan VAN JENAZAH PERCUMA pada komuniti dan asnaf yang memerlukan. Penggunaan dana dimanfaatkan untuk penyelenggaraan berkala kenderaan &amp; peralatan, pemeriksaan kenderaan pihak berwajib, cukai jalan, petrol dan pelbagai
                    </p>
                </div>
            </article>

            <!-- Card 2 -->
            <article class="card bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm flex flex-col">
                <img 
                    src="https://amalvalley.com/wp-content/uploads/2022/05/Lyna-Loose-L-1.png" 
                    alt="Dana Amal Halal Food" 
                    class="w-full h-48 object-cover rounded-t-lg"
                />
                <div class="p-6 flex flex-col flex-grow">
                    <h2 class="text-blue-900 font-semibold mb-3 text-center">Dana Amal Halal Food</h2>
                    <p class="text-gray-600 text-sm leading-relaxed text-justify flex-grow">
                        Buah fikiran untuk memulakan sebuah ruang mesra komuniti muncul ekoran wujudnya lompang di dalam membantu masyarakat yang memerlukan akses kepada bantuan makanan percuma. Penggunaan dana merangkumi pengurusan operasi harian kedai makan (bahan mentah dan sumber manusia), edaran makanan panas, agihan pek makanan dan tapak niaga untuk asnaf.
                    </p>
                </div>
            </article>

            <!-- Card 3 -->
            <article class="card bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm flex flex-col">
                <img 
                    src="https://amalvalley.com/wp-content/uploads/2021/10/dana-van-jenazah-5.png" 
                    alt="Dana Inventori Sut PPE" 
                    class="w-full h-48 object-cover rounded-t-lg"
                />
                <div class="p-6 flex flex-col flex-grow">
                    <h2 class="text-blue-900 font-semibold mb-3 text-center">Dana Inventori Sut PPE</h2>
                    <p class="text-gray-600 text-sm leading-relaxed text-justify flex-grow">
                        Pihak pertubuhan sentiasa bersedia untuk mengangkat kewajipan fardhu kifayah yang diamanahkan terutama ketika waktu pandemik yang sedang melanda ketika ini, namun begitu, kewajipan ini tidak dapat disempurnakan tanpa peralatan PPE yang lengkap serta melindungi para petugas. Dana akan digunakan untuk pembelian set lengkap PPE untuk pengurusan jenazah pandemik dan juga penyakit berjangkit.
                    </p>
                </div>
            </article>

        </section>

    </main>

    <!-- Anime.js script for fade-in + slide-up animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script>
        anime.timeline({ easing: 'easeOutQuad', duration: 800 })
            .add({
                targets: '.card',
                opacity: [0, 1],
                translateY: [40, 0],
                delay: anime.stagger(150)
            });
    </script>

</body>
</html>
