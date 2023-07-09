<?php
require_once(__DIR__ . '/../route/conn.php');
session_start();


if (isset($_POST['register'])) {
    $username = $_POST['email'];
    $contact = $_POST['user_contact'];
    $password = $_POST['password'];
    $reEnterPassword = $_POST['re_enter_password'];


    // Periksa apakah username dan password sudah diisi
    if (!empty($username) && !empty($contact) && !empty($password) && !empty($reEnterPassword)) {
        // Periksa apakah password yang dimasukkan sesuai dengan konfirmasi password
        if ($password === $reEnterPassword) {
            // Periksa apakah username sudah ada dalam database
            $checkUsernameQuery = "SELECT * FROM user WHERE user_name='$username'";
            $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);


            if (mysqli_num_rows($checkUsernameResult) > 0) {
                echo "<script>alert('Username sudah digunakan')</script>";
            } else {
                // Periksa panjang password
                if (strlen($password) >= 8) {
                    // Tambahkan data pengguna ke database
                    $registerQuery = "INSERT INTO user (user_name, user_contact ,password) VALUES ('$username', '$contact' ,'$password')";
                    $registerResult = mysqli_query($conn, $registerQuery);


                    if ($registerResult) {
                        echo "<script>alert('Pendaftaran berhasil. Silakan login dengan akun yang baru dibuat.')</script>";
                        header("Location: login.php");
                        exit();
                    } else {
                        echo "<script>alert('Terjadi kesalahan. Gagal mendaftar.')</script>";
                    }
                } else {
                    echo "<script>alert('Password harus memiliki panjang minimal 8 karakter')</script>";
                }
            }
        } else {
            echo "<script>alert('Konfirmasi password tidak cocok')</script>";
        }
    } else {
        echo "<script>alert('Harap lengkapi semua field')</script>";
    }
}

function goToLogin()
{
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
    <title>Register</title>
</head>

<body>

    <nav class="flex items-center justify-between absolute w-full p-6 bg-white ">

        <div class="flex flex-none">
            <p class="font-bold text-xl">Library X</p>
        </div>

        <div class="lg:flex justify-center flex-grow lg:gap-x-12">
            <a href="../index.php" class="text-xl  px-2 font-semibold leading-6 text-gray-800">Home</a>
            <a href="books.php" class="text-xl px-2 font-semibold leading-6 text-gray-800">Books</a>
            <a href="#" class="text-xl px-2 font-semibold leading-6 text-gray-800">About</a>
        </div>


        <button class="rounded-md px-9 py-2 bg-gray-800 hover:bg-slate-600 transition-all">
            <a href="login.php" class="text-xl px-2 font-semibold leading-6 text-white">Login</a>
        </button>

    </nav>

    <div class="h-screen w-full flex items-center ">

        <div class="container form w-1/2 h-full">
            <svg width="100%" height="100%" fill="none" xmlns="http://www.w3.org/2000/svg">
                <mask id="mask0_11_21" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="100%" height="100%">
                    <rect width="100%" height="100%" fill="#404040" />
                </mask>
                <g mask="url(#mask0_11_21)">
                    <rect width="100%" height="100%" fill="#404040" />
                    <g filter="url(#filter0_f_11_21)">
                        <circle cx="173" cy="871" r="310" fill="url(#paint0_linear_11_21)" />
                    </g>
                    <g filter="url(#filter1_f_11_21)">
                        <circle cx="754" cy="243" r="310" fill="#6134C1" />
                    </g>
                </g>
                <defs>
                    <filter id="filter0_f_11_21" x="-437" y="261" width="1220" height="1220" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                        <feGaussianBlur stdDeviation="150" result="effect1_foregroundBlur_11_21" />
                    </filter>
                    <filter id="filter1_f_11_21" x="-56" y="-567" width="1620" height="1620" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                        <feGaussianBlur stdDeviation="250" result="effect1_foregroundBlur_11_21" />
                    </filter>
                    <linearGradient id="paint0_linear_11_21" x1="283.5" y1="454" x2="85.5" y2="1056" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#1A45DE" />
                        <stop offset="1" stop-color="#9B1EB0" />
                    </linearGradient>
                </defs>
            </svg>

        </div>

        <div class="container form w-1/2">
            <!-- create login form -->
            <div class="container w-full flex justify-center">
                <form action="" method="post" class="flex flex-col justify-center ">
                    <h1 class="text-4xl font-bold text-gray-900">Create new account here</h1>
                    <p class="text-gray-600 text-lg font-normal py-2">Enter the information for your new account</p>

                    <div class="flex flex-col justify-center py-2">
                        <label for="email" class="text-xl font-light text-gray-800 py-2">Username</label>
                        <input type="text" name="email" id="email" class="border-2 border-gray-800 rounded-md px-2 py-2 w-96">
                    </div>

                    <div class="flex flex-col justify-center py-2">
                        <label for="password" class="text-xl font-light text-gray-800 py-2">Password</label>
                        <input type="password" name="password" id="password" class="border-2 border-gray-800 rounded-md px-2 py-2 w-96">
                    </div>

                    <div class="flex flex-col justify-center py-2">
                        <label for="password" class="text-xl font-light text-gray-800 py-2">Re-enter Password</label>
                        <input type="password" name="re_enter_password" id="password" class="border-2 border-gray-800 rounded-md px-2 py-2 w-96">
                    </div>

                    <div class="flex flex-col justify-center py-2">
                        <label for="user_contact" class="text-xl font-light text-gray-800 py-2">Email</label>
                        <input type="email" name="user_contact" id="user_contact" class="border-2 border-gray-800 rounded-md px-2 py-2 w-96">
                    </div>

                    <div class="flex flex-col w-96 justify-center py-6">
                        <button type="submit" name="register" class="rounded-md px-9 py-3 bg-gray-800 hover:bg-slate-600 transition-all">
                            <p class="text-2xl px-2 font-medium leading-6 text-white">Register</p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>