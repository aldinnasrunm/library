<?php
require_once(__DIR__ . '/../route/conn.php');
session_start();


$username = $_SESSION['username'];
$userid = $_SESSION['userid'];


$query = mysqli_query($conn, "SELECT * FROM administrator WHERE admin_id = '$userid'");
$result = mysqli_fetch_assoc($query);

if (isset($_POST['logout'])) {

    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session

    header("Location: login-admin.php");
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
            <a href="../index.php#about" class="text-xl px-2 font-semibold leading-6 text-gray-800">About</a>
        </div>
    </nav>


    <div class="h-full w-full flex items-center pt-52">
        <div class="w-1/4 h-full pl-20">
            <div class="bg-white h-full drop-shadow-2xl rounded-xl border-2 border-gray-900">
                <div class="wrapper m-6">
                    <div class="img__profile w-32 rouned-full pb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 100" fill="none">
                            <circle cx="50" cy="50" r="48" fill="white" stroke="#828282" stroke-width="4" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5751 85.2856C19.1692 70.0755 33.2912 59 50 59C66.7088 59 80.8308 70.0755 85.4249 85.2856C76.3713 94.3748 63.8425 100 50 100C36.1575 100 23.6287 94.3748 14.5751 85.2856Z" fill="#828282" />
                            <ellipse cx="50" cy="32.5" rx="21" ry="20.5" fill="#828282" />
                        </svg>
                    </div>
                    <p class="text-xl font-semibold py-2">Username</p>
                    <p class="text-xl font-normal"><?php echo $username; ?></p>
                    <form action="" method="post">
                        <button type="submit" name="logout" class="px-3 py-2 bg-red-700 text-white hover:bg-red-400 rounded-md my-3">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-3/4 h-full ml-24 px-20">
            <!-- show book list -->
            <div class="bg-white h-full border-2 border-gray-900 drop-shadow-2xl rounded-xl">
                <div class="wrapper m-6">
                    <p class="text-2xl font-semibold py-2 text-center my-2">Book Lend Information</p>
                    <!-- searchbar -->
                    <div class="container mx-auto py-8">
                        <div class="mb-6">
                            <input id="searchInput" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" placeholder="Search book...">
                        </div>
                        <!-- table number, book name, user, lend date, return button -->
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-3 px-6 text-left">Table Number</th>
                                    <th class="py-3 px-6 text-left">Book Name</th>
                                    <th class="py-3 px-6 text-left">User</th>
                                    <th class="py-3 px-6 text-left">Lend Date</th>
                                    <th class="py-3 px-6 text-left">Return</th>
                                </tr>
                            </thead>
                            <tbody id="book__list">
                                <?php
                                $lendQuery = mysqli_query($conn, "SELECT lend.lend_id, book.book_title, user.user_name, lend.date
                                    FROM lend
                                    INNER JOIN user ON lend.user_id = user.user_id
                                    INNER JOIN book ON lend.book_id = book.book_id");
                                while ($lendRow = mysqli_fetch_assoc($lendQuery)) {
                                    echo '<tr>
                                            <td class="py-4 px-6 border-b">' . $lendRow['lend_id'] . '</td>
                                            <td class="py-4 px-6 border-b">' . $lendRow['book_title'] . '</td>
                                            <td class="py-4 px-6 border-b">' . $lendRow['user_name'] . '</td>
                                            <td class="py-4 px-6 border-b">' . $lendRow['date'] . '</td>
                                            <td class="py-4 px-6 border-b">
                                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="returnBook(' . $lendRow['lend_id'] . ')">Return</button>
                                            </td>
                                        </tr>';
                                }
                                ?>
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            const searchInput = document.getElementById('searchInput');
            const tableRows = document.querySelectorAll('tbody tr');


            searchInput.addEventListener('input', function(event) {
                const searchTerm = event.target.value.toLowerCase();


                tableRows.forEach(row => {
                    const bookName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    if (bookName.includes(searchTerm)) {
                        row.style.display = 'table-row';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });


            function returnBook(lendId) {
                if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                    // Mengirim permintaan AJAX ke server untuk menghapus data
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "delete_lend.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // Memperbarui tampilan setelah data dihapus
                            if (xhr.responseText === "success") {
                                location.reload(); // Memuat ulang halaman setelah penghapusan berhasil
                            } else {
                                alert("Gagal menghapus data.");
                            }
                        }
                    };
                    xhr.send("lend_id=" + lendId);
                }
            }
        </script>
    </div>
</body>


</html>