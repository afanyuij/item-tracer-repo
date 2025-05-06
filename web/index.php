<?php
session_start();
include "./dbcon.php";
if(isset($_SESSION['Email'])){
  $email = $_SESSION['Email'];
  $sql = "SELECT Fullname FROM users WHERE Email = '$email'";
  $result = mysqli_query($conn, $sql);
  $info = $result->fetch_assoc();
} else {
  $info = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ItemTracer - Lost and Found Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="welcome.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: '#1a237e',
                        coral: '#ff5252',
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans">
    <!-- Header -->
    <header class="bg-gray-100">
  <nav class="container mx-auto px-4 py-4 flex justify-between items-center ">
    <div class="flex items-center">
      <a href="#"><img src="./assets/logo.png" alt="ItemTracer Logo" class="h-8"></a>
    </div>
    <nav class="hidden md:flex space-x-8">
      
     
      <button class="p-3 rounded-md bg-slate-200" onclick="toggleDropdown()">👤 Guest</button>
     
      <!-- Dropdown menu -->
      <div id="userDropdown" class="absolute right-32 mt-16 w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
        <div class="p-4 border-b border-gray-100">
         <p class="text-gray-800 font-medium">Guest</p>
         <p class="text-gray-600 pt-3 pb-3">You are not logged in</p>

        <hr>
        <a href="login.php" class="">SignUp</a>
        
         <!-- <a href="Register.php" class="p-1.5 m-0 w-full"><button class="bg-blue-300 p-3 w-full rounded-lg ">SignIn</button></a> -->
        </div>
        <div class="p-2">
        
        </div>
      </div>
    </div>
  </nav>
</header>

<script>
  function toggleDropdown() {
    const dropdown = document.getElementById('userDropdown');
    dropdown.classList.toggle('hidden');
  }

  // Close dropdown when clicking outside
  window.addEventListener('click', function(event) {
    const dropdown = document.getElementById('userDropdown');
    if (!event.target.closest('button') && !event.target.closest('#userDropdown')) {
      dropdown.classList.add('hidden');
    }
  });
</script>

 <!-- Hero Section -->
 <section class="section_one mx-auto px-4 py-16 md:py-24 flex justify-end ">
 <div class="section-content mr-64 mt-56">
                <h1 class="text-4xl md:text-5xl font-bold text-white pb-8">
                    Welcome to
                    <div class="mt-2"><img src="./assets/logo.png" alt="ItemTracer Logo" class="h-20"> </div>
                </h1>
                <p class=" text-gray-50 text-lg pb-6 ">
                Welcome to ItemTracer!! your go to platform for finding lost items and important documents! 
                Whether you’ve misplaced something or found an item, 
                we’re here to connect you with the right owner safely and efficiently. 
                Let’s reunite lost things with their owners!
                </p>
                <div class="flex flex-col sm:flex-row gap-7">
                    <a href="register.php"><button class="px-6 py-3 bg-navy text-white rounded-md hover:bg-navy/90 hover:scale-105 duration-150">
                        Get Started
                    </button></a>
                    <a href="#"><button class="px-6 py-3 border-2 border-navy text-navy rounded-md hover:bg-gray-50 hover:scale-105 duration-150">
                        Read More
                    </button></a>
                </div>
            </div>
        
    </section>

    <!-- our Service -->
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Our Services</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-blue-100 cursor-default rounded-full flex items-center justify-center">
                        🔍
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Lost Item Search</h3>
                    <p class="text-gray-600">Easily search for lost items reported by others and find your missing belongings</p>
                </div>
                <div class="bg-white p-8 rounded-lg text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-red-100 cursor-default rounded-full flex items-center justify-center">
                        📢
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Report Found Items</h3>
                    <p class="text-gray-600">Found something? Report it on ItemTracer and help reunite it with its owner.</p>
                </div>
                <div class="bg-white p-8 rounded-lg text-center">
                    <div class="w-16 h-16 mx-auto mb-4 cursor-default bg-purple-100 rounded-full flex items-center justify-center">
                        📍
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Location-Based Matching</h3>
                    <p class="text-gray-600">Our system suggests possible matches based on where items were lost or found.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- how it works -->


    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">How It Works</h2>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 hover:bg-navy duration-200 rounded-full flex items-center justify-center text-2xl font-bold">1</div>
                    <h3 class="text-xl font-semibold mb-4 text-blue-600">Submit a Report</h3>
                    <p class="text-gray-600">Report a lost or found item with essential details, including location and description.</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 hover:bg-navy duration-200  bg-gray-100  rounded-full flex items-center justify-center text-2xl font-bold">2</div>
                    <h3 class="text-xl font-semibold mb-4 text-blue-600">Smart Matching in Action</h3>
                    <p class="text-gray-600">Our system scans the database to find potential matches, notifying you instantly.</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 hover:bg-navy duration-200 rounded-full flex items-center justify-center text-2xl font-bold">3</div>
                    <h3 class="text-xl font-semibold mb-4 text-blue-600">Connect Securely</h3>
                    <p class="text-gray-600">Use our in-app messaging system to safely communicate with the finder or owner.</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full hover:bg-navy duration-200 flex items-center justify-center text-2xl font-bold">4</div>
                    <h3 class="text-xl font-semibold mb-4 text-blue-600">Reunite with Your Item</h3>
                    <p class="text-gray-600">Arrange a safe and convenient way to retrieve your lost item and celebrate the reunion!</p>
                </div>
            </div>
        </div>
    </section>

    <?php
    include "./footer.php";
    ?>