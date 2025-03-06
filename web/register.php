<?php
    session_start();
    // $userid = $_SESSION['UserID'];
    include './dbcon.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirm_password = $_POST['re_pass'];
        $usertype = 'Finder';
        if($password!=$confirm_password){
            echo "Password and Confirm Password doesn't match";
        }
        else{
           $check = "select * from users WHERE FullName='$name' AND Email='$email' AND PhoneNumber='$password'";
           $result = mysqli_query($conn, $check);
           if(mysqli_num_rows($result) > 0){  
            echo "User already exists";

             }else{
                $sql = "INSERT INTO users (FullName, Email, PhoneNumber, Password, UserType) VALUES('$name','$email','$phone','$password','$usertype')";
                $result1=mysqli_query($conn,$sql);
                if($result1){
                    header("location:login.php");
                    echo "User created successfully";
                }else{
                    echo "Error in creating user";
                }
             }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ItemTracer Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1A1B4B',
                        accent: '#E85757'
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="flex justify-between items-center px-6 py-4 bg-white shadow-sm">
        <img src="./assets/logo.png" alt="ItemTracer Logo" class="h-8">
        <div class="flex items-center gap-4">
            <button class="text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </button>
            <button class="text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 max-w-6xl">
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <!-- Left Side - Logo and Text -->
            <div class="text-center md:text-left">
                <img src="./assets/logo.png" alt="ItemTracer Logo" class="w-64 mx-auto md:mx-0 mb-6">
                <h1 class="text-3xl font-bold text-primary mb-4">lets Register your account</h1>
            </div>

            <!-- Right Side - Form -->
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-primary mb-6">Registration <span class="text-accent">Form</span></h2>
                
                <form class="space-y-6" method="post" action="#">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Names:</label>
                            <input type="text" placeholder="enter your name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
                            <input type="email" name="email" placeholder="Enter your email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number:</label>
                        <input type="tel" name="phone" placeholder="enter phone number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password:</label>
                        <input type="password" name="password" placeholder="enter your password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password:</label>
                        <input type="password" name="re_pass" placeholder="confirm password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="terms" class="rounded text-primary focus:ring-primary">
                        <label for="terms" class="text-sm text-gray-600">
                            I agree to terms and conditions
                            <a href="#" class="text-blue-600 hover:underline">Read More</a>
                        </label>
                    </div>

                    <button type="submit" name="submit" class="w-full bg-primary text-white py-2 rounded-md hover:bg-primary/90 transition-colors">
                        Register
                    </button>

                    <p class="text-center text-sm text-gray-600">
                        Already have an Account
                        <a href="login.php" class="text-blue-600 hover:underline">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php
    include './footer.php'
    ?>