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
  <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
    <div class="flex items-center">
      <a href="#"><img src="./assets/logo.png" alt="ItemTracer Logo" class="h-8"></a>
    </div>
    <nav class="hidden md:flex space-x-8">
      <a href="index.php" class="text-gray-700 font-medium hover:text-blue-500 duration-500 hover:scale-110">Home</a>
      <a href="lost-item-page.php" class="text-gray-700 font-medium hover:text-blue-500 duration-500 hover:scale-110">Lost items</a>
      <a href="found-item-page.php" class="text-gray-700 font-medium hover:text-blue-500 duration-500 hover:scale-110">Found items</a>
      <a href="#" class="text-gray-700 font-medium hover:text-blue-500 duration-500 hover:scale-110">My-items</a>
    </nav>
    <div class="flex items-center space-x-4 relative">
      <a href="#"><button class="p-2">🔔</button></a>
      <?php
      if($info){

      
      ?>
      <button class="p-3 rounded-md bg-slate-200" onclick="toggleDropdown()">👤 <?php echo $info['Fullname']; ?></button>
      <?php
      }
      ?>
      <!-- Dropdown menu -->
      <div id="userDropdown" class="absolute right-0 mt-52 w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
        <div class="p-4 border-b border-gray-100">
          <?php
            if($info){
              echo '<p class="text-gray-800 font-medium">'.$info['Fullname'].'</p>';
            } else {
              echo '<p class="text-gray-800 font-medium">Guest</p>';
            }
          ?>
        </div>
        <div class="p-2">
          <?php
            if($info){
              echo '<a href="signout.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">SignOut</a>';
            } else {
              echo '<a href="login.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">SignIn</a>';
            }
          ?>
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