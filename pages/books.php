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

    <title>Books</title>
</head>

<body>
    <nav class="flex items-center justify-between fixed w-full p-6 bg-white/75 backdrop-blur-lg z-50 ">

        <div class="flex flex-none">
            <p class="font-bold text-xl">Library X</p>
        </div>

        <div class="lg:flex justify-center flex-grow lg:gap-x-12">
            <a href="../index.php" class="text-xl  px-2 font-semibold leading-6 text-gray-800">Home</a>
            <a href="#" class="text-xl px-2 font-semibold leading-6 text-gray-800">Books</a>
            <a href="#" class="text-xl px-2 font-semibold leading-6 text-gray-800">About</a>
        </div>


        <button class="rounded-md px-9 py-2 bg-gray-800 hover:bg-slate-600 transition-all">
            <a href="login.php" class="text-xl px-2 font-semibold leading-6 text-white">Login</a>
        </button>

    </nav>


    <!-- hero container -->
    <div class="container pt-[5rem] mx-auto">
        <h1 class="text-6xl py-[4rem] text-center font-black text-gray-800">
            List of available books
        </h1>
    </div>

    <!-- Book container -->
    <div class="container book__list h-screen flex flex-col  mx-auto">
        <!-- form search with full width-->
        <div class="searchbar flex justify-center">
            <form action="" class="flex flex-row justify-center w-full">
                <input type="text" class="border-2 border-gray-300 rounded-md p-2 w-full " placeholder="Search">
                <button class="rounded-md px-9 py-2 bg-gray-800 hover:bg-slate-600 transition-all">
                    <a href="pages/login.php" class="text-xl px-2 font-semibold leading-6 text-white">Search</a>
                </button>
            </form>
        </div>

        <div class="list__container flex flex flex-wrap" id="list__container">
            <!-- <div class="book1 m-10 w-72 bg-white border-2 drop-shadow-2xl border-gray-700 flex flex-col justify-between items-center py-8 rounded-xl"> 
                <img src="/dist/image/mata-yang-enak-dipandang.jpg" alt="" class="w-56">
                <div class="text">
                    <p class="text-xl font-bold mt-4">Mata Yang Enak Dipandang</p>
                    <p class="text-xl">Ahmad Tohari</p>
                    <button class="button text-lg font-semibold mx-auto w-full text-white bg-gray-900 hover:bg-gray-600 py-2 rounded-md mt-3 transition-all"><a href="book-view.php">Selengkapnya</a></button>
                </div>
            </div> -->
        </div>
    </div>


    <!-- Footer -->
    <!-- <footer class="bg-gray-900 py-20 mt-20">
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

    </footer> -->

    <!-- <script type="text/javascript">
        var list__container = document.getElementById("list__container");
        var phd = '';
        
        for (let x = 0; x < 20; x++) {
            phd = phd + '<div class="book1 m-10 w-72 bg-white border-2 drop-shadow-2xl border-gray-700 flex flex-col justify-between items-center py-8 rounded-xl"> <img src="/dist/image/mata-yang-enak-dipandang.jpg" alt="" class="w-56"> <div class="text"> <p class="text-xl font-bold mt-4">', $items[1].book_title , '</p> <p class="text-xl">Ahmad Tohari</p> <button class="button text-lg font-semibold mx-auto w-full text-white bg-gray-900 hover:bg-gray-600 py-2 rounded-md mt-3 transition-all"><a href="book-view.php">Selengkapnya</a></button> </div> </div>';
            
        };
    </script> -->

    <script type="text/javascript">
    var list__container = document.getElementById("list__container");
    var phd = '';
    
    var count = 0;
    for (var x = 0; x < items.length; x++) {
        phd += '<div class="book1 m-10 w-72 bg-white border-2 drop-shadow-2xl border-gray-700 flex flex-col justify-between items-center py-8 rounded-xl">';
        phd += "<img src='/dist/image/'"+items[count].imageurl+ 'alt="" class="w-56">';
        phd += '<div class="text p-6 w-full">';
        phd += '<p class="text-xl font-bold mt-4">' + items[count].book_title + '</p>';
        phd += '<p class="text-xl">'+ items[count].book_author +'</p>';
        phd += '<button class="button text-lg font-semibold mx-auto w-full text-white bg-gray-900 hover:bg-gray-600 py-2 rounded-md mt-3 transition-all"><a href="book-view.php">Selengkapnya</a></button>';
        phd += '</div>';
        phd += '</div>';
        count ++;
    }

    

    list__container.innerHTML = phd;
</script>



</body>

</html>