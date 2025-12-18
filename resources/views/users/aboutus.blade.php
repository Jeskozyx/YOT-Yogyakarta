<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>About Us - YOT Jogja</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden; /* Mencegah scroll horizontal karena elemen dekorasi */
        }
    </style>
</head>
<body class="bg-white text-gray-900">

    @include('layouts.navbar_users')

    <div class="relative pt-32 pb-20">

        <div class="hidden lg:block absolute right-0 top-1/4 translate-x-1/2 w-[500px] h-[500px] bg-yellow-400 rounded-full -z-10 opacity-90"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            
            <div class="text-center mb-20 relative z-10">
                <h1 class="text-4xl md:text-5xl font-bold mb-10 text-black">About Us</h1>
                
                <div class="space-y-6 text-lg md:text-xl leading-relaxed text-gray-800 max-w-5xl mx-auto">
                    <p>
                        Lahir sebagai organisasi komunitas anak muda terbesar di Indonesia yang digagas 
                        oleh Billy Boen pada tahun 2009 untuk membangun dan memberdayakan anak muda Indonesia.
                    </p>
                    
                    <p>
                        YOT telah menjangkau jutaan anak muda di <span class="font-bold">900+ kampus</span> dan <span class="font-bold">860+ sekolah</span> di <span class="font-bold">480 kota/kabupaten</span> 
                        dari Aceh hingga Papua melalui <span class="font-bold">6 pilar positif (Pendidikan, Kesehatan, Lingkungan, UKM, Sosial, dan Teknologi)</span>, 
                        dengan pendekatan semangat gotong royong.
                    </p>

                    <p>
                        YOT menjadi sebuah ekosistem bagi anak muda; berkontribusi nyata melalui kolaborasi dengan universitas, 
                        sekolah, komunitas, hingga perusahaan/brand seperti Astra, BRI, Pertamina, Pegadaian, Wuling, dsb.
                    </p>

                    <p>
                        PT YOT Muda Sukses adalah anak perusahaan dari PT. YOT Nusantara (Holding) yang dipimpin oleh 
                        Andy F. Noya sebagai Presiden Komisaris dan Billy Boen sebagai Presiden Direktur.
                    </p>
                </div>
            </div>

            <div class="mt-16">
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800">Vision & Mision</h2>

                <div class="grid md:grid-cols-2 gap-8 md:gap-12 max-w-5xl mx-auto">
                    
                    <div class="bg-yellow-300 rounded-[2rem] p-10 text-center shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col items-center justify-center min-h-[250px]">
                        <h3 class="text-2xl font-bold mb-4 text-gray-900">Vision</h3>
                        <p class="text-gray-800 text-lg font-medium leading-relaxed">
                            To create stronger next generations of Indonesia
                        </p>
                    </div>

                    <div class="bg-yellow-300 rounded-[2rem] p-10 text-center shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col items-center justify-center min-h-[250px]">
                        <h3 class="text-2xl font-bold mb-4 text-gray-900">Mision</h3>
                        <p class="text-gray-800 text-lg font-medium leading-relaxed">
                            To inspire more youth to reach their success at their young age, and to create a strong and positive youth communities nationwide by giving inspirations and continuous development programs.
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>

</body>
</html>