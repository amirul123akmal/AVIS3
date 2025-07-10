<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Sejarah Pertubuhan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

</head>
<body>
    <x-home-navbar custom="fixed top-0 z-10 opacity-0 hover:opacity-100 transition ease-in-out duration-500" />
    <main class="bg-white min-h-screen flex flex-col items-center pt-20 px-6 md:px-16 lg:px-32">
    <div class="max-w-7xl mx-auto px-4 py-12 flex flex-col md:flex-row items-start gap-12">
        <!-- Image Section -->
        <div class="md:w-1/2 relative">
            <img id="img" src="https://amalvalley.com/wp-content/uploads/2021/09/Sec-1-Image.png" alt="Sejarah Pertubuhan"
            class="rounded-tl-[200px] rounded-br-2xl shadow-lg w-full object-cover" />
        </div>
        
        <!-- Text Section -->
        <div class="md:w-1/2 space-y-6">
            <h2 id="title" class="text-3xl font-bold text-blue-800">Sejarah Pertubuhan</h2>
            
            <div class="relative pl-6 border-l-4 border-cyan-400 space-y-8">
                <!-- Point 1 -->
                <div class="relative" data-step="1">
                    <div class="absolute -left-7 top-1 w-6 h-6 rounded-full bg-cyan-500 text-white text-sm font-bold flex items-center justify-center">
                        1
                    </div>
                    <p class="point">Amal Valley Organization (AVO) merupakan sebuah pertubuhan bukan kerajaan (NGO) yang diasaskan oleh Pengarah Urusan bagi rangkaian Klinik As-Salam, Dr. Azfar Hussin pada 25 Mac 2020.</p>
                </div>
                
                <!-- Point 2 -->
                <div class="relative" data-step="2">
                    <div class="absolute -left-7 top-1 w-6 h-6 rounded-full bg-cyan-500 text-white text-sm font-bold flex items-center justify-center">
                        2
                    </div>
                    <p class="point">Namun begitu gerak kerja sukarelawan bagi penubuhan ini telah bermula lebih awal sejak tahun 2013 lagi dengan membantu komuniti setempat, berfokus kepada bantuan sukarelawan perubatan & panel perubatan percuma.</p>
                </div>
                
                <!-- Point 3 -->
                <div class="relative" data-step="3">
                    <div class="absolute -left-7 top-1 w-6 h-6 rounded-full bg-cyan-500 text-white text-sm font-bold flex items-center justify-center">
                        3
                    </div>
                    <p class="point">Seiring masa, tuntutan untuk membantu komuniti secara lebih menyeluruh telah membuka dimensi baru kepada pertubuhan untuk menawarkan pengurusan jenazah, khidmat ambulan komuniti dan bantuan bank makanan secara percuma kepada mereka yang memerlukan.</p>
                </div>
                
                <!-- Point 4 -->
                <div class="relative" data-step="4">
                    <div class="absolute -left-7 top-1 w-6 h-6 rounded-full bg-cyan-500 text-white text-sm font-bold flex items-center justify-center">
                        4
                    </div>
                    <p class="point">Musibah COVID-19 yang melanda baru-baru ini juga telah mempersiapkan pihak pertubuhan untuk lebih peka berkenaan pengurusan jenazah COVID-19 yang lebih efisien serta selamat untuk para petugas sukarelawan.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 py-12 flex flex-col lg:flex-row items-start gap-12">
        
        <!-- Left Content -->
        <div class="lg:w-1/2 space-y-6" id="textBlock">
            <h2 class="text-3xl font-bold text-blue-900">Aktiviti Pertubuhan</h2>
            
            <ul class="space-y-4 text-lg">
                <li class="flex items-start gap-3">
                    <span class="text-cyan-500 text-xl mt-1">✔️</span>
                    Pengurusan jenazah Islam secara percuma (kes normal, penyakit berjangkit & COVID-19) merangkumi mandi, kafan, transit dan pengembumian.
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-cyan-500 text-xl mt-1">✔️</span>
                    Khidmat perkhidmatan ambulan komuniti secara percuma.
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-cyan-500 text-xl mt-1">✔️</span>
                    Panel perubatan untuk asnaf dan golongan memerlukan secara percuma.
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-cyan-500 text-xl mt-1">✔️</span>
                    Sokongan perubatan dan peralatan untuk asnaf dan golongan memerlukan secara percuma.
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-cyan-500 text-xl mt-1">✔️</span>
                    Bantuan bank makanan.
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-cyan-500 text-xl mt-1">✔️</span>
                    Kelas ilmu pembelajaran Quran harian & tazkirah mingguan secara atas talian.
                </li>
            </ul>
        </div>
        
        <!-- Right Image Grid -->
        <div class="lg:w-1/2 flex justify-center items-center" id="imageGrid">
            <img src="https://amalvalley.com/wp-content/uploads/2021/09/Sec-2-Image.png" class="w-full rounded-lg" alt="Aktiviti 1" />
        </div>
    </div>
    </main>
    
    <script>
        anime({
            targets: '#textBlock',
            translateY: [50, 0],
            opacity: [0, 1],
            duration: 1000,
            easing: 'easeOutExpo'
        });
        
        anime({
            targets: '#imageGrid img, #imageGrid div',
            opacity: [0, 1],
            scale: [0.8, 1],
            delay: anime.stagger(150, { start: 300 }),
            duration: 700,
            easing: 'easeOutBack'
        });
    </script>
    
    <script>
        anime({
            targets: '#img',
            translateY: [50, 0],
            opacity: [0, 1],
            duration: 1000,
            easing: 'easeOutExpo'
        });
        
        anime({
            targets: '#title',
            translateX: [-50, 0],
            opacity: [0, 1],
            delay: 300,
            duration: 800,
            easing: 'easeOutExpo'
        });
        
        anime({
            targets: '.point',
            translateX: [-30, 0],
            opacity: [0, 1],
            delay: anime.stagger(300, { start: 600 }),
            duration: 600,
            easing: 'easeOutQuad'
        });
    </script>
    
</body>
</html>