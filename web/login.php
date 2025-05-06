
<?php
   session_start();
    include "./dbcon.php";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "select * from users where Email='".$email."' AND password='".$password."'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        if($row){
            $_SESSION['Email'] = $email;
            $_SESSION['Fullname'] = $row['Fullname'];
            header("location:home.php");
        }else{
            echo "Invalid Email or Password".mysqli_error($conn);
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ItemTracer - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="p-4 flex justify-between items-center">
        <img src="./assets/logo.png" alt="ItemTracer Logo" class="h-8">
        <div class="flex gap-4">
            <button class="p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </button>
            <button class="p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 mt-8 grid md:grid-cols-2 gap-8 max-w-6xl">
        <!-- Left Column -->
        <div class="flex flex-col justify-center items-center">
            <img src="./assets/logo.png" alt="ItemTracer Logo" class="w-64 mb-4">
            <h1 class="text-[#1a237e] text-3xl font-bold">Welcome back!!</h1>
        </div>

        <!-- Right Column -->
        <div class="max-w-md mx-auto w-full">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold mb-2">Login now</h2>
                <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>

            <form class="space-y-4" action="#" method="post">
                <div>
                    <label class="block text-sm font-medium mb-1">Email:</label>
                    <input type="text" placeholder="enter phone number or email" name="email" class="w-full px-4 py-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Password:</label>
                    <input type="password" placeholder="enter your password" name="password" class="w-full px-4 py-2 border rounded-md bg-gray-50">
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="mr-2">
                    <label for="remember" class="text-sm">Remember me</label>
                </div>
                <button type="submit" class="w-full bg-[#1a237e] text-white py-2 rounded-md hover:bg-[#1a237e]/90" name="save">login</button>
                <div class="text-center">
                    <span class="text-sm">Not Registered </span>
                    <a href="register.php" class="text-blue-600 text-sm">Register</a>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
<?php

include "./footer.php";
?>