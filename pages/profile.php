<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/style/output.css">
    <title>User Detail</title>
</head>

<body>

    <nav class="flex items-center justify-between w-full p-6 bg-white ">

        <div class="flex flex-none">
            <p class="font-bold text-xl">Library X</p>
        </div>

        <div class="lg:flex justify-center flex-grow lg:gap-x-12">
            <a href="../index.php" class="text-xl  px-2 font-semibold leading-6 text-gray-800">Home</a>
            <a href="books.php" class="text-xl px-2 font-semibold leading-6 text-gray-800">Books</a>
            <a href="#" class="text-xl px-2 font-semibold leading-6 text-gray-800">About</a>
        </div>


        <button class="rounded-md px-9 py-2 bg-gray-800 hover:bg-slate-600 transition-all">
            <a href="#" class="text-xl px-2 font-semibold leading-6 text-white">Login</a>
        </button>

    </nav>

    <div class="h-full w-full flex items-center pt-52">
        <div class="w-1/4 h-full pl-20">
            <div class="bg-white h-full drop-shadow-2xl rounded-xl">
                <div class="wrapper m-6">
                    <div class="img__profile w-32 rouned-full pb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 100" fill="none">
                            <circle cx="50" cy="50" r="48" fill="white" stroke="#828282" stroke-width="4" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5751 85.2856C19.1692 70.0755 33.2912 59 50 59C66.7088 59 80.8308 70.0755 85.4249 85.2856C76.3713 94.3748 63.8425 100 50 100C36.1575 100 23.6287 94.3748 14.5751 85.2856Z" fill="#828282" />
                            <ellipse cx="50" cy="32.5" rx="21" ry="20.5" fill="#828282" />
                        </svg>
                    </div>

                    <p class="text-xl font-semibold py-2">
                        Username
                    </p>
                    <p class="text-xl font-normal">
                        Adinkkkk
                    </p>

                    <p class="text-xl font-semibold py-2">
                        Contact
                    </p>
                    <p class="text-xl font-normal">
                        085700118877
                    </p>
                    

                    <button type="submit" class="px-3 py-2 bg-gray-900 text-white hover:bg-gray-600 rounded-md my-3">
                        Reset Password
                    </button>

                </div>

            </div>
        </div>
        <div class="w-3/4 bg-red-300 h-full ml-24 px-20">
            <!-- show book list -->
            <div class="bg-gray-400 h-full drop-shadow-2xl rounded-xl">
                <div class="wrapper m-6">
                    <p class="text-2xl font-semibold py-2 text-center my-2">
                        Book Lended
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <div class="book__list">
                            <div class="book1 bg-white drop-shadow-xl px-6 py-2 rounded-lg">
                                <div class="book__img">
                                    <img src="../dist/image/mata-yang-enak-dipandang.jpg" class="w-24">
                                </div>
                                <div class="book__detail">
                                    <p class="text-lg font-semibold py-2">
                                        Judul Buku
                                    </p>
                                    <p class="text-md font-normal">
                                        Penulis
                                    </p>
                                    <p class="text-md font-normal">
                                        Tahun Terbit
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>