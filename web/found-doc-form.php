
<?php
include 'dbcon.php';
$query=mysqli_query($conn, 'select * from document_categories');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ItemTracer - Register Found Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php
    include './header.php';
 ?>
<body class="bg-gray-50">
   

    <!-- Form Section -->
    <div class="max-w-3xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-sm p-6 sm:p-8">
            <form class="space-y-6" enctype="multipart/form-data" method="post" action="#">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Your name</label>
                        <input type="text" name="names" placeholder="enter you name" class="mt-1 block w-full rounded-md border-gray-500 border-1 outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email or phone</label>
                        <input type="text" name="email_phone" placeholder="enter you name" class="mt-1 block w-full rounded-md  border-gray-500  outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Document category</label>
                        <select name="category" class="mt-1 block w-full rounded-md border-gray-500  outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            
                        <option value="">choose category</option>
                       <?php
                       $n=1;
                       while ($info = $query->fetch_assoc()) {
                        # code...
                       
                       ?>
                           <option value="<?php echo $info['CategoryName']; ?>"><?php echo $info['CategoryName']; ?></option>

                        <?php
                        $n++;}
                        ?>
                        
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Document Number</label>
                        <input type="text" name="doc_number" placeholder="enter number of document" class="mt-1 block w-full  border-gray-500  outline-none p-3 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                </div>

                <div class="space-y-2">
                    <h3 class="text-lg font-medium text-gray-900">Found-Location:</h3>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Province</label>
                            <input type="text" name="province" placeholder="specify province" class="mt-1 block w-full rounded-md border-gray-500  outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">district</label>
                            <input type="text" name="district" placeholder="specify district" class="mt-1 block w-full rounded-md  border-gray-500  outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">sector</label>
                            <input type="text" name="sector" placeholder="specify sector" class="mt-1 block w-full rounded-md  border-gray-500  outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Location point</label>
                            <input type="text" name="loc_point" placeholder="ex: bus park, malls, market" class="mt-1 block w-full rounded-md  border-gray-500  outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">description:</label>
                    <textarea rows="4" name="desc" placeholder="give a detailed description" class="mt-1 outline-none p-5 block w-full rounded-md border-gray-500 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">upload image of lost item</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label class="relative cursor-pointer bg-indigo-600 rounded-md font-medium text-white px-4 py-2 hover:bg-indigo-700">
                                    <span>Choose a file</span>
                                    <input type="file" name="image" class="sr-only">
                                </label>
                                <p class="pl-1 pt-2">upload a document</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" name="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit
                    </button>
                </div>
            </form>
            <!-- <?php
            // if (isset($_POST['submit'])) {
            //     echo "<pre>";
            //     print_r($_POST);
            //     echo "</pre>";
            //     die();
            // }
            
            ?> -->
        </div>
    </div>

    <!-- Php -->

    <?php
     include 'dbcon.php';
     if(isset($_POST['submit'])){
          $names=$_POST['names'];
          $email_phone=$_POST['email_phone'];
          $category=$_POST['category'];
          $doc_number=$_POST['doc_number'];
          $province=$_POST['province'];
          $district=$_POST['district'];
          $sector=$_POST['sector'];
          $loc_point=$_POST['loc_point'];
          $desc=$_POST['desc'];
          $doc_status = 'Found';
          $loc= array($province,$district,$sector,$loc_point);
          $loc_json = json_encode($loc);
        //   image insert
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'image/' . $image_name;
        move_uploaded_file($image_tmp_name, $image_folder);
        // insert into database
        if (empty($category)) {
            die("Category is empty! Please select a valid category.");
        }
        $sql = "INSERT INTO documents (FinderName,FinderContact,DocumentType,DocumentNumber,DocumentLocation,Descriptions,DocumentStatus,found_img) values('$names','$email_phone','$category','$doc_number','$loc_json','$desc','$doc_status','$image_folder')";
        $query=mysqli_query($conn,$sql);
        if($query)
        {
            echo 'Found document recorded secessfuly';
            // header('location:found-doc-form.php');
        }
        else{
            echo 'Document not inserted well. Error: ' . mysqli_error($conn);
        }
        
     }
    ?>
    <!-- Footer -->
    <footer class="bg-white mt-12">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <img src="./assets/logo.png" alt="ItemTracer Logo" class="h-8 w-auto mb-4">
                </div>
                <div>
                    <h3 class="text-lg font-medium text-blue-600 mb-4">Get in Touch</h3>
                    <div class="space-y-3 text-gray-600">
                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            kk 308, kabeza, Kicukiro, Kigali Rwanda
                        </p>
                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            afanyuji@gmail.com
                        </p>
                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            +250793908701
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-200 pt-8 text-center">
                <p class="text-sm text-gray-500">&copy; 2025 ItemTracer. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
