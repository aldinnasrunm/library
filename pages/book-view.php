<?php

require_once(__DIR__ . '/../route/conn.php');
session_start();

$user_id = $_SESSION['userid'];
$userRole = $_SESSION['role'];

$bookID = $_GET['variable'];
// $cari = 'SELECT * FROM book';
$cari = 'SELECT b.book_id, b.book_title, b.imageurl, b.book_author, (b.stock - IFNULL(l.total_borrowed, 0)) AS remaining_stock
FROM book b
LEFT JOIN (
    SELECT book_id, SUM(1) AS total_borrowed
    FROM lend
    GROUP BY book_id
) l ON b.book_id = l.book_id;';

$hasil_cari = mysqli_query($conn, $cari);
// Check if there are any rows returned
if (mysqli_num_rows($hasil_cari) > 0) {
    // Fetch all rows into an array
    $items = mysqli_fetch_all($hasil_cari, MYSQLI_ASSOC);
} else {
    $items = array(); // Empty array if no items found
}

// Convert the items array to JSON format
$items_json = json_encode($items);

flog($bookID);

$seeLend = "SELECT * FROM lend WHERE user_id = '$user_id' AND book_id = '$bookID'";
$resultLend = mysqli_query($conn, $seeLend);

if (mysqli_num_rows($resultLend) > 0) {
    echo "<script>";
    echo "var islend = true;";
    echo "</script>";
} else {
    echo "<script>";
    echo "var islend = false;";
    echo "</script>";
}

// Pass the JSON data to JavaScript
echo "<script>";
echo "var items = " . $items_json . ";";
echo "</script>";

echo "<script>";
echo "var uRole = '" . $userRole . "';";
echo "</script>";



if (isset($_POST['lend'])) {
    if (isset($_SESSION['userid'])) {
        $userId = $_SESSION['userid'];
        $date = date("Y-m-d");
        $query = "INSERT INTO lend (user_id, book_id, date) VALUES ('$userId', '$bookID', '$date')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('Book has been lend!')</script>";
        } else {
            echo "<script>alert('Failed to lend book!')</script>";
        }
    } else {
        echo "<script>alert('You must login first!')</script>";
    }
}

function flog($message)
{
    echo "<script>console.log('$message');</script>";
}

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
            <a href="books.php" class="text-xl px-2 font-semibold leading-6 text-gray-800">Books</a>
            <a href="../index.php#about" class="text-xl px-2 font-semibold leading-6 text-gray-800">About</a>
        </div>


        <button class="rounded-md px-9 py-2 bg-gray-800 hover:bg-slate-600 transition-all">
            <a href="login.php" class="text-xl px-2 font-semibold leading-6 text-white">Login</a>
        </button>

    </nav>
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
                        <a href="../index.php">
                            Home
                        </a>
                    </li>
                    <li class="pb-1">
                        <a href="books.php">
                            Books
                        </a>
                    </li>
                    <li class="pb-1">
                        <a href="login.php">
                            Login
                        </a>
                    </li>
                    <li class="pb-1">
                        <a href="register.php">
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
                            Why to use thi app?
                        </a>
            </div>
        </div>
        <p class="text-xl text-center text-white">Made with 🧡</p>

    </footer>


    <script type="text/javascript">
        var list__container = document.getElementById("list__container");
        var urlParams = new URLSearchParams(window.location.search);
        var count = parseInt(urlParams.get('variable')) - 1;
        var phd = '';
        console.log(uRole);
        phd += '<div class="conntainer py-32 book__details mx-auto h-screen w-4/6 flex justify-center"> <div class="book__image flex w-1/3"><div class="image "><img src="../dist/image/' + items[count].imageurl + '" alt=""></div></div>';
        phd += '<div class="book__info flex flex-col w-2/3 pl-20"><p class="text-3xl text-gray-900 font-semibold">' + items[count].book_title + '</p><p class="text-xl text-gray-900 font-semibold">' + items[count].book_author + '</p><hr><p class="text-xl text-gray-900 font-medium">Description</p><p class="text-lg text-gray-900"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae animi quibusdam tempora aliquam harum quia aspernatur voluptates minus iusto esse dolore consequuntur, fugiat aut sint. Impedit dolorem nulla tempora non.</p>'


        if (uRole == 'admin') {
            phd += '<p class="text-lg text-gray-900 font-bold">Stock : ' + items[count].remaining_stock + '</p></div></div>';
        } else {
            if (items[count].remaining_stock == 0) {
                phd += '<p class="text-lg text-gray-900 font-bold">Stock : ' + items[count].remaining_stock + '</p> <p class="italic">*Stock buku habis!!</p> <form action="" method="post" class="text-center w-full bg-gray-900 hover:bg-gray-600 text-center text-white py-2 rounded-md transition-all hidden"><button type="submit" name="lend" class="w-full">Lend</button></form></div></div>';
            } else if (islend) {
                phd += '<p class="text-lg text-gray-900 font-bold">Stock : ' + items[count].remaining_stock + '</p> <p class="italic">*Already Lend the book!!</p> <form action="" method="post" class="text-center w-full bg-gray-900 hover:bg-gray-600 text-center text-white py-2 rounded-md transition-all hidden"><button type="submit" name="lend" class="w-full">Lend</button></form></div></div>'
            } else {
                phd += '<p class="text-lg text-gray-900 font-bold">Stock : ' + items[count].remaining_stock + '</p> <form action="" method="post" class="text-center w-full bg-gray-900 hover:bg-gray-600 text-center text-white py-2 rounded-md transition-all"> <button type="submit" name="lend" class="w-full">Lend</button> </form> </div></div>';
            };
        }

        list__container.innerHTML = phd;
    </script>
</body>

</html>