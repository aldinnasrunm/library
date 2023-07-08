<?php
session_start();
require_once(__DIR__ . '/../route/conn.php');

$userId = $_SESSION['userid'];
$username = $_SESSION['username'];
$role = $_SESSION['role'];

$query = mysqli_query($conn, "SELECT * FROM user WHERE user_id='$userId'");
$result = mysqli_fetch_assoc($query);

// Check if there are any rows returned
$query2 = mysqli_query($conn, "SELECT lend.lend_id, lend.date, user.user_name, book.book_title, book.book_author FROM lend JOIN user ON lend.user_id = user.user_id JOIN book ON lend.book_id = book.book_id WHERE lend.user_id = '$userId';");
// $bookResult = mysqli_fetch_assoc($query2);

// Check if there are any rows returned
if (mysqli_num_rows($query2) > 0) {
    // Fetch all rows into an array
    $booksResult = mysqli_fetch_all($query2, MYSQLI_ASSOC);
} else {
    $booksResult = array(); // Empty array if no items found
}

// $bookResults = array(); // Initialize an empty array to store the results

// while ($row = mysqli_fetch_assoc($query2)) {
//     $bookResults[] = $row; // Add each row to the results array
// }

// // Process the query results
// foreach ($bookResults as $bookResult) {
//     // Access individual rows using $bookResult
//     echo $bookResult['lend_id']; // Replace 'column_name' with the actual column name from the 'lend' table
// }

$books = json_encode($booksResult);

echo "<script>";
echo "var books = " . $books . " ;";

echo "</script>";


if (isset($_POST['logout'])) {

    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session

    header("Location: login.php");
    exit();
}

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
        <div class="w-1/4  pl-20">
            <div class="bg-white drop-shadow-2xl rounded-xl border-2 border-gray-900">
                <div class="wrapper h-fit m-6 flex flex-col">
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
                        <?php echo $username ?>
                    </p>

                    <p class="text-xl font-semibold py-2">
                        Contact
                    </p>
                    <p class="text-xl font-normal">
                        <?php echo $result['user_contact']; ?>
                    </p>

                    <form action="" method="post">
                        <button type="submit" name="changepassword" class="px-3 py-2 bg-gray-900 text-white hover:bg-gray-600 rounded-md my-3">
                            Change Password
                        </button>

                        <button type="submit" name="logout" class="px-3 py-2 bg-red-700 text-white hover:bg-red-400 rounded-md my-3">
                            Logout
                        </button>
                    </form>


                </div>

            </div>
        </div>
        <div class="w-3/4 h-fit ml-24 px-20 flex justify-center items-center">
            <!-- show book list -->
            <div class="bg-white h-full border-2 border-gray-900 drop-shadow-2xl rounded-xl">
                <div class="wrapper m-6">
                    <p class="text-2xl font-semibold py-2 text-center my-2">
                        Book Lended
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <div class="book__list flex flex-wrap" id="book__list">
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        var list__contianer = document.getElementById("book__list");
        var phd = '';
        console.log(books[0]);
        for (var x = 0; x < books.length; x++) {
            phd = phd + '<div class="book1 bg-white drop-shadow-xl px-6 border-2 border-gray-600 py-2 rounded-lg mx-7 my-3"> <div class="book__img"> <img src="../dist/image/mata-yang-enak-dipandang.jpg" class="w-24"> </div> <div class="book__detail"> <p class="text-lg font-semibold py-2"> '+ books[x].book_title+' </p> <p class="text-md font-normal"> '+ books[x].book_author+' </p> </div> </div>';
        };
        list__contianer.innerHTML = phd;
    </script>
</body>

</html>