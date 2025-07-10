<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Kami Koordinasikan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <x-home-navbar custom="fixed top-0 z-10 opacity-0 hover:opacity-100 transition ease-in-out duration-500" />

    <main class="bg-white min-h-screen flex flex-col items-center pt-20 px-6 md:px-16 lg:px-32">

        <section class="max-w-7xl w-full grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            <!-- Image container -->
            <div class="flex justify-center">
                <img 
                    src="https://amalvalley.com/wp-content/uploads/2021/09/Sec-5-Image.png" 
                    alt="Single Image" 
                    class="w-full max-w-xs rounded-lg object-cover shadow-lg"
                />
            </div>

            <!-- Right text container -->
            <div class="text-left max-w-xl">

                <h2 class="text-2xl md:text-3xl font-bold text-teal-600 mb-2">Kami koordinasikan</h2>
                <h3 class="text-3xl md:text-4xl font-extrabold text-blue-900 leading-tight mb-6">
                    bantuan kepada asnaf dan komuniti yang kurang berkemampuan.
                </h3>

                <p class="text-gray-600 mb-6 leading-relaxed">
                    Amal Valley Organization (AVO), dengan nombor pendaftaran pertubuhan PPM-016-10-25032020, merupakan sebuah pertubuhan berdaftar bukan kerajaan (NGO) yang berteraskan usaha untuk membantu asnaf dan komuniti yang kurang berkemampuan terutama di dalam pengurusan jenazah (termasuk pengurusan jenazah COVID-19) serta bantuan perubatan (panel perubatan, perkhidmatan ambulan komuniti & van komuniti) secara percuma.
                </p>

                <p class="text-gray-600 mb-8 leading-relaxed">
                    Pihak pertubuhan juga aktif menyantuni komuniti yang terkesan melalui program Kotak Amal (food basket), sokongan peralatan perubatan dan sebagainya.
                </p>

                <a href="About-Us" class="inline-block bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 px-8 rounded-full transition duration-300">
                    Kenali Kami
                </a>
            </div>

        </section>

    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script>
        anime.timeline({ easing: 'easeOutQuad', duration: 800 })
            .add({
                targets: 'img',
                opacity: [0, 1],
                translateX: [50, 0],
                delay: anime.stagger(200)
            })
            .add({
                targets: 'h2, h3, p, a',
                opacity: [0, 1],
                translateY: [30, 0],
                delay: anime.stagger(150)
            }, '-=600');
    </script>

</body>
</html>
