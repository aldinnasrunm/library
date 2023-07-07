<?php
    require_once(__DIR__ . '/../route/conn.php');
    $cari='SELECT * FROM book';
    $hasil_cari=mysqli_query($conn, $cari);
    // Check if there are any rows returned
    if (mysqli_num_rows($hasil_cari) > 0) {
        // Fetch all rows into an array
        $items = mysqli_fetch_all($hasil_cari, MYSQLI_ASSOC);
    } else {
        $items = array(); // Empty array if no items found
    }

    // Convert the items array to JSON format
    $items_json = json_encode($items);

    // Pass the JSON data to JavaScript
    echo "<script>";
    echo "var items = " . $items_json . ";";
    echo "</script>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/style/output.css">

    <title>Books - Description</title>
</head>

<body>
    <nav class="flex items-center justify-between fixed w-full p-6 bg-white/75 backdrop-blur-lg z-50 ">

        <div class="flex flex-none">
            <p class="font-bold text-xl">Library X</p>
        </div>

        <div class="lg:flex justify-center flex-grow lg:gap-x-12">
            <a href="../index.php" class="text-xl  px-2 font-semibold leading-6 text-gray-800">Home</a>
            <a href="/pages/books.php" class="text-xl px-2 font-semibold leading-6 text-gray-800">Books</a>
            <a href="#" class="text-xl px-2 font-semibold leading-6 text-gray-800">About</a>
        </div>


        <button class="rounded-md px-9 py-2 bg-gray-800 hover:bg-slate-600 transition-all">
            <a href="login.php" class="text-xl px-2 font-semibold leading-6 text-white">Login</a>
        </button>

    </nav>

    <!-- <div class="conntainer py-32 book__details mx-auto h-screen w-4/6 flex justify-center">
        <div class="book__image flex w-1/3">
            <div class="image ">
                <img src="../dist/image/Al_Mustafa_Republish.jpg" alt="">
            </div>
        </div>
        <div class="book__info flex flex-col w-2/3 pl-20">
            <p class="text-3xl text-gray-900 font-semibold">
                Al Mustafa
            </p>

            <p class="text-xl text-gray-900 font-semibold">Kahlil Gibran</p>
            <hr>

            <p class="text-xl text-gray-900 font-medium">Description</p>

            <p class="text-lg text-gray-900"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae animi quibusdam tempora aliquam harum quia aspernatur voluptates minus iusto esse dolore consequuntur, fugiat aut sint. Impedit dolorem nulla tempora non.</p>

            <p class="text-lg text-gray-900 font-bold">Stock : 4</p>

            <button type="button" class="bg-gray-900 hover:bg-gray-600 text-center text-white py-2 rounded-md transition-all">Lend</button>
        </div>

    </div> -->

    <div class='list__container flex flex flex-wrap' id="list__container">

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
    
    <script type="text/javascript">
    var list__container = document.getElementById("list__container");
    var urlParams = new URLSearchParams(window.location.search);
    var count = urlParams.get('variable');
    var phd = '';
    phd+='<div class="conntainer py-32 book__details mx-auto h-screen w-4/6 flex justify-center"> <div class="book__image flex w-1/3"><div class="image "><img src="../dist/image/'+items[count].imageurl+'" alt=""></div></div>'
    phd+='<div class="book__info flex flex-col w-2/3 pl-20"><p class="text-3xl text-gray-900 font-semibold">'+items[count].book_title+'</p><p class="text-xl text-gray-900 font-semibold">'+items[count].book_author+'</p><hr><p class="text-xl text-gray-900 font-medium">Description</p><p class="text-lg text-gray-900"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae animi quibusdam tempora aliquam harum quia aspernatur voluptates minus iusto esse dolore consequuntur, fugiat aut sint. Impedit dolorem nulla tempora non.</p><p class="text-lg text-gray-900 font-bold">Stock : 4</p><button type="button" class="bg-gray-900 hover:bg-gray-600 text-center text-white py-2 rounded-md transition-all">Lend</button></div></div>'
    list__container.innerHTML = phd;
    </script>
</body>

</html>