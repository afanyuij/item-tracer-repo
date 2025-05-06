<?php
// if (!isset($_SESSION['username'])) {
//     header("location:login.php");
// }else{
//     if (isset($_SESSION['username'])) {
//         header("location:found-item-page.php");
// //    header("location:found-item-page.php");

// }}
// include './header.php';
    

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents Found - ItemTracer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head> -->
<body class="bg-gray-50">
    <!-- Header -->
    <?php
    include './header.php';
    include "./dbcon.php";

    $sql = "select * from documents where DocumentStatus='Found'";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
    ?>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Documents Found</h1>
                <p class="text-gray-600">browse our gallery for found documents</p>
            </div>
           
            <div class="search flex">
                <input type="text" class="searchTerm w-96 p-3 outline-none focus:bg-slate-200 duration-300 rounded-xl" placeholder="Search for documents"><a href="" class="p-3 bg-slate-300 w-32 flex items-center"><button type="submit" class=" text-center text-black font-medium" >Search </button><img src="./image/search.png" alt="search_icon" width="30px" height="30px" srcset=""></a>
            </div>
            <div>
            <a href="found-doc-form.php"><button class="bg-indigo-500 text-white px-6 py-2 rounded-lg hover:bg-indigo-600">
                Report a Found Document
            </button></a>
            </div>
        </div>

        <div class="flex gap-8">
 <!-- Categories Sidebar -->
 <div class="w-64 flex-shrink-0">
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-sm font-semibold mb-4">categories</h3>
                    
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <a href="#"><h4 class="text-primary font-medium">✨ Personal Identification Documents</h4></a>
                            <ul class="ml-4 space-y-1 text-sm text-gray-600">
                                <a href=""><li>• National ID cards</li></a>
                                <a href=""><li>• Passports</li></a>
                                <a href=""><li>• Driver's licenses</li></a>
                                <a href=""><li>• Birth certificates</li></a>
                            </ul>
                        </div>

                        <div class="space-y-2">
                        <a href="#"> <h4 class="text-primary font-medium">💳 Financial Documents:</h4></a>
                            <ul class="ml-4 space-y-1 text-sm text-gray-600">
                            <a href="#"><li>• Credit/debit cards</li></a>
                            <a href="#"> <li>• Insurance policies</li></a>
                            </ul>
                        </div>

                        <div class="space-y-2">
                        <a href="#"> <h4 class="text-primary font-medium">💼 Professional Documents:</h4></a>
                            <ul class="ml-4 space-y-1 text-sm text-gray-600">
                            <a href="#"><li>• Work ID badges</li></a>
                            <a href="#"><li>• Business licenses</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Document Grid -->
            <div class="flex-1">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                    <!-- Document Card Template (repeated 6 times) -->

                    <?php
// ...

while ($info=$result->fetch_assoc()) {
    # code...
?>

<div class="bg-white rounded-lg p-4 shadow-sm">
    <div class="aspect-square bg-gray-100 rounded-lg mb-4 flex items-center justify-center text-gray-400">
        <img src="./<?php echo $info['found_img']; ?>" alt="Lost Item Image">
    </div>
    <h3 class="font-medium mb-2"><?php echo $info['FinderName']; ?></h3>
    <p class="text-sm text-gray-500 mb-4"><?php echo $info['Descriptions']; ?></p>
    <a href="afanyuij@gmail.com"><p class="text-sm text-gray-400"><?php echo $info['FinderContact']; ?></p></a>
</div>
<?php
}
    }
?>
                    <!-- Repeat the card 5 more times -->
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
   <?php
   include './footer.php';
   ?>