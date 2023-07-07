<?php
require_once(__DIR__ . '/route/conn.php');
session_start();



$header_status = '<button class="rounded-md px-9 py-2 bg-gray-800 hover:bg-slate-600 transition-all">
<a href="pages/login.php" class="text-xl px-2 font-semibold leading-6 text-white">Login</a>
</button>';

if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == "admin") {
        $header_status = '<button class="rounded-md px-9 py-2 bg-gray-800 hover:bg-slate-600 transition-all">
        <a href="pages/profile-admin.php" class="text-xl px-2 font-semibold leading-6 text-white">'. $_SESSION['username'] .'</a>
        </button>';
    }else{
        $header_status = '<button class="rounded-md px-9 py-2 bg-gray-800 hover:bg-slate-600 transition-all">
        <a href="pages/profile.php" class="text-xl px-2 font-semibold leading-6 text-white">'. $_SESSION['username'] .'</a>
        </button>';
    }

    echo "<script>console.log('user loged')</script>";
}else{
    echo "<script>console.log('user not loged'))</script>";
}

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/style/output.css">
    <title>Library</title>
</head>

<body>

    <nav class="flex items-center justify-between fixed w-full p-6 bg-white/75 backdrop-blur-lg z-50">

        <div class="flex flex-none">
            <p class="font-bold text-xl">Library X</p>
        </div>

        <div class="lg:flex justify-center flex-grow lg:gap-x-12">
            <a href="#" class="text-xl  px-2 font-semibold leading-6 text-gray-800">Home</a>
            <a href="/pages/books.php" class="text-xl px-2 font-semibold leading-6 text-gray-800">Books</a>
            <a href="#about" class="text-xl px-2 font-semibold leading-6 text-gray-800">About</a>
        </div>

        <?php 
            echo $header_status;
        
        ?>


    </nav>

    <!-- hero container -->
    <div class="container  h-screen mx-auto bg-white flex justify-center w-full">
        <div class="container py-[5rem] flex flex-col items-center ">

            <h1 class="text-6xl py-40 text-center font-black text-gray-800 hover:-rotate-2 hover:text-gray-600 transition-all">
                An online Collection of good Books.
            </h1>

            <div class="w-5/6 image__hero items-center justify-between flex flex-row">
                <img src="dist/image/book-group.png" alt="" class="w-2/6 hover:scale-110 transition-all">

                <p class="text-2xl font-normal w-3/6">Discover a world of boundless imagination, endless learning, and unparalleled exploration at our Online Library. Whether you're an avid reader, a dedicated scholar, or a curious mind seeking inspiration, our virtual shelves are brimming with literary treasures that will transport you to extraordinary realms and expand your intellectual horizons.</p>
            </div>
        </div>
    </div>

    <!-- Book container -->
    <div class="container h-screen mx-auto flex flex-col">
        <div class="book__shelve my-16 flex flex-col items-center justify-center">
            <h1 class="text-6xl py-40 text-center font-black text-gray-800 hover:scale-105 hover:text-gray-600 transition-all">
                Best book, from great author
            </h1>

            <div class="books container book1 w-7/12 flex flex-row justify-between">

                <!-- book1 -->
                <div class="book1 w-44 scale-150">
                    <div class="absolute p-2 opacity-0 decsription h-full hover:bg-black/25 backdrop-blur-sm hover:opacity-100 transition-all">
                        <p class="text-white font-bold">Laut Bercerita</p>
                        <p class="text-white font-normal text-sm">Leila S. Chudori</p>
                        <hr>
                        <p class="text-white text-xs">Bagian pertama mengambil sudut pandang seorang mahasiswa aktivis bernama Laut, menceritakan bagaimana Laut dan kawan-kawannya menyusun rencana, berpindah-pindah dalam pelarian, hingga tertangkap oleh pasukan rahasia. </p>

                    </div>
                    <img src="dist/image/laut-bercerita.jpg" alt="">

                </div>

                <!-- book2 -->
                <div class="book2 w-44 scale-150">
                    <div class="absolute p-2 opacity-0 decsription h-full hover:bg-black/25 backdrop-blur-sm hover:opacity-100 transition-all">
                        <p class="text-white font-bold">Mata yang Enak Dipandang</p>
                        <p class="text-white font-normal text-sm">Ahmad Tohari</p>
                        <hr>
                        <p class="text-white text-xs">Almustafa, hendak kembali ke negerinya dengan menaiki sebuah kapal. Keberangkatannya tertunda oleh pertanyaan-pertanyaan tentang misteri kehidupan yang diajukan oleh penduduk kota.</p>

                    </div>
                    <img src="dist/image/mata-yang-enak-dipandang.jpg" alt="">

                </div>

                <!-- book3 -->
                <div class="book3 w-44 scale-150">
                    <div class="absolute p-2 opacity-0 decsription h-full hover:bg-black/25 backdrop-blur-sm hover:opacity-100 transition-all">
                        <p class="text-white font-bold">Al Mustafa</p>
                        <p class="text-white font-normal text-sm">Kahlil Gibran</p>
                        <hr>
                        <p class="text-white text-xs">Almustafa, hendak kembali ke negerinya dengan menaiki sebuah kapal. Keberangkatannya tertunda oleh pertanyaan-pertanyaan tentang misteri kehidupan yang diajukan oleh penduduk kota.</p>
                    </div>
                    <img src="dist/image/Al_Mustafa_Republish.jpg" alt="">

                </div>

            </div>



            <svg width="1262" height="308" viewBox="0 0 1262 308" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_f_8_37)">
                    <path d="M69 107H1184.62L1233 283H141.098L69 107Z" fill="url(#paint0_linear_8_37)" />
                </g>
                <path d="M0 107H1262V129C1262 133.418 1258.42 137 1254 137H7.99999C3.58171 137 0 133.418 0 129V107Z" fill="url(#paint1_linear_8_37)" />
                <path d="M55.1203 6.24084C57.2253 2.39294 61.2619 0 65.648 0H1196.35C1200.74 0 1204.77 2.39293 1206.88 6.24084L1262 107H0L55.1203 6.24084Z" fill="url(#paint2_linear_8_37)" />
                <defs>
                    <filter id="filter0_f_8_37" x="44" y="82" width="1214" height="226" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                        <feGaussianBlur stdDeviation="12.5" result="effect1_foregroundBlur_8_37" />
                    </filter>
                    <linearGradient id="paint0_linear_8_37" x1="978.76" y1="263" x2="978.76" y2="36.5" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFFEFE" stop-opacity="0" />
                        <stop offset="1" stop-color="#1A1A1A" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_8_37" x1="631" y1="107" x2="631" y2="137" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFFEFE" />
                        <stop offset="1" stop-color="#E3E3E3" />
                    </linearGradient>
                    <linearGradient id="paint2_linear_8_37" x1="631" y1="-30.2552" x2="631" y2="107" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#A5A5A5" />
                        <stop offset="0.413201" stop-color="#BDBDBD" />
                        <stop offset="1" stop-color="#E9E9E9" />
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </div>

    <!-- about -->
    <div class="container about mx-auto h-screen" id="about">
        <div class="wraping flex flex-col justify-between">
            <h1 class="text-6xl pt-32 pb-6 text-center font-black text-gray-800 hover:-rotate-2 hover:text-gray-600 transition-all">
                About
            </h1>
            <p class="text-center font-normal text-2xl pb-36 w-2/3 mx-auto">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae pariatur totam nobis ducimus dolorem ullam delectus neque quos quis eum.</p>

            <!-- author of the web -->
            <div class="author__wrap flex justify-between">

                <div class="author1 w-1/4 px-9 flex text-gray-900 flex-col items-center ease-in-out duration-200 ">
                    <div class="image hover:scale-105 transition-all">
                        <img src="dist/image/author1.jpg" alt="" class="rounded-full drop-shadow-2xl">
                    </div>
                    <p class="text-2xl font-bold mt-10">Abdul Khadir D.</p>
                    <p class="text-lg font-normal">Programmer</p>
                </div>

                
                <div class="author1 w-1/4 px-9 flex text-gray-900 flex-col items-center ease-in-out duration-200 ">
                    <div class="image hover:scale-110 transition-all">
                        <img src="dist/image/author2.jpg" alt="" class="rounded-full drop-shadow-2xl">
                    </div>
                    <p class="text-2xl font-bold mt-10">Aprilia Puspita A.</p>
                    <p class="text-lg font-normal">Designer</p>
                </div>
                
                
                <div class="author1 w-1/4 px-9 flex text-gray-900 flex-col items-center ease-in-out duration-200 ">
                    <div class="image hover:scale-110 transition-all">
                        <img src="dist/image/author3.jpg" alt="" class="rounded-full drop-shadow-2xl">
                    </div>
                    <p class="text-2xl font-bold mt-10">Muhammad Alyf A.</p>
                    <p class="text-lg font-normal">Database Engineer</p>
                </div>
                
                
                <div class="author1 w-1/4 px-9 flex text-gray-900 flex-col items-center ease-in-out duration-200 ">
                    <div class="image hover:scale-110 transition-all">
                        <img src="dist/image/author4.jpg" alt="" class="rounded-full drop-shadow-2xl">
                    </div>
                    <p class="text-2xl font-bold mt-10">A. Nasrun Minalloh</p>
                    <p class="text-lg font-normal">Project Manager</p>
                </div>
                
            </div>




        </div>
    </div>




    <!-- Footer -->
    <footer class="bg-gray-900 py-20 mt-20">
        <div class="sm:grid grid-cols-3 w-4/5 pb-10 m-auto border-b-2 border-gray-400">
            <div>
                <h3 class="text-l sm:font-bold text-gray-100">
                    Pages
                </h3>

                <ul class="py-4 sm:text-s pt-4 text-gray-400">
                    <li class="pb-1">
                        <a href="/">
                            Home
                        </a>
                    </li>
                    <li class="pb-1">
                        <a href="/blog">
                            Blog
                        </a>
                    </li>
                    <li class="pb-1">
                        <a href="/login">
                            Login
                        </a>
                    </li>
                    <li class="pb-1">
                        <a href="/register">
                            Register
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-l sm:font-bold text-gray-100">
                    Find Us
                </h3>

                <ul class="py-4 sm:text-s pt-4 text-gray-400">
                    <li class="pb-1">
                        <a href="/">
                            What we do
                        </a>
                    </li>
                    <li class="pb-1">
                        <a href="/">
                            Address
                        </a>
                    </li>
                    <li class="pb-1">
                        <a href="/">
                            Phone
                        </a>
                    </li>
                    <li class="pb-1">
                        <a href="/">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-l sm:font-bold text-gray-100">
                    Latest Post
                </h3>

                <ul class="py-4 sm:text-s pt-4 text-gray-400">
                    <li class="pb-1">
                        <a href="/">
                            Why we love tech
                        </a>
                    </li>
                    <li class="pb-1">
                        <a href="/">
                            Why we love design
                        </a>
                    </li>
                    <li class="pb-1">
                        <a href="/">
                            Why to use Laravel
                        </a>
            </div>
        </div>
        <p class="text-xl text-center text-white">Made with 🧡</p>

    </footer>



</body>

</html>