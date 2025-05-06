<?php
// session_start();

include 'dbcon.php';
$query=mysqli_query($conn, 'select * from document_categories');


?>
<?php


if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email_phone = $_POST['email_phone'];
    $category = $_POST['category'];
    $doc_number = $_POST['docno'];
    $des = $_POST['des'];
    $doc_status = 'Lost';
    $province = $_POST['province'];
    $district = $_POST['district'];
    $sector = $_POST['sector'];
    $loc_point = $_POST['locpoint'];
    $loc = array($province,$district,$sector,$loc_point);
    $loc_json = json_encode($loc);
    $lost_img = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $image_folder = 'image/'.$lost_img;
    move_uploaded_file($tmp_name,$image_folder);
    $error = array();
    if(empty($email_phone) OR empty($name) OR empty($category)){
        array_push($error,"fields are required");
    }
    if(count($error) > 0){
        foreach($error as $err){
            echo $err;
        }
    }

    $Selectcategoryid=mysqli_query($conn,"select CategoryID from document_categories where CategoryName='$category'");
    $categoryid=mysqli_fetch_assoc($Selectcategoryid);

    $sql1 = "INSERT INTO documents(OwnerName,OwnerContact,DocumentType,DocumentNumber,DocumentLocation,Descriptions,DocumentStatus,lost_img,CategoryID)
     VALUES('$name', '$email_phone','$category','$doc_number','$loc_json','$des','$doc_status','$lost_img','$categoryid')";
    
    // $check = "select DocumentNumber from documents WHERE OwnerContact='$email_phone' ";
    // $result3=mysqli_query($conn,$check);
    // if($result3){
    //     echo "document already exist";
    // }else{
        $result2 = mysqli_query($conn,$sql1);
        if($result2){
           echo "Document Added Successfully";
        }else{
           echo "Error". mysqli_error($conn);;
        }
    }
    

    

// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ItemTracer - Report Lost Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php
    include './header.php';
 ?>
<body class="bg-gray-100">


    <!-- Main Form -->
    <main class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-8">
            <h1 class="text-2xl font-bold text-center mb-8">Report lost doc</h1>
            
            <form class="space-y-6" method="post" action="#" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name and Contact -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Your names:</label>
                        <input type="text" placeholder="enter you name" name="name" class="mt-1 block w-full rounded-md  border-gray-500  outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email or phone</label>
                        <input type="text" placeholder="enter email or phone" name="email_phone" class="mt-1 block w-full rounded-md  border-gray-500  outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <!-- Document Details -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Document category</label>
                        
                        
                        <select name="category" class="mt-1 block w-full rounded-md border-gray-500  outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            
                            <option value="">choose category</option>
                           <?php
                           $n=1;
                           while ($info = $query->fetch_assoc()) {
                            # code...
                           
                           ?>
                               <option value="<?php
                                echo $info['CategoryName']; ?>"><?php echo $info['CategoryName']; ?></option>
    
                            <?php
                            $n++;}
                            ?>
                            
                            </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Document Number</label>
                        <input type="text" placeholder="enter number of document" name="docno" class="mt-1 block w-full rounded-md  border-gray-500  outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <!-- Location Information -->
                    <div class="md:col-span-2">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Lost-Location:</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Province</label>
                                <input type="text" name="province" placeholder="specify province" class="mt-1 block w-full rounded-md  border-gray-500  outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">district</label>
                                <input type="text" name="district" placeholder="specify district" class="mt-1 block w-full rounded-md  border-gray-500  outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">sector</label>
                                <input type="text" name="sector" placeholder="specify sector" class="mt-1 block w-full rounded-md  border-gray-500  outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Location point</label>
                                <input type="text" name="locpoint" placeholder="eg: bus park, mall, market" class="mt-1 block w-full rounded-md  border-gray-500  outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">description:</label>
                        <textarea rows="4" name="des" placeholder="give a detailed description" class="mt-1 block w-full rounded-md  border-gray-500  outline-none p-3 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>

                    <!-- File Upload -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">upload image of lost item</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <div class="flex text-sm text-gray-600">
                                    <label class="relative cursor-pointer bg-indigo-600 rounded-md font-medium text-white px-4 py-2 hover:bg-indigo-700 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Choose a file</span>
                                        <input type="file" name="img" class="sr-only">
                                    </label>
                                    <p class="pl-1 text-gray-500 self-center">upload a document</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" name="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white mt-12 py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Logo and Description -->
                <div>
                    <a href="/" class="text-2xl font-bold">
                    <img src="./assets/logo.png" alt="ItemTracer Logo" class="h-8 w-auto">
                    </a>
                    <p class="mt-4 text-gray-600">Connect lost belongings with their rightful owners quickly and easily.</p>
                </div>

                <!-- Follow Us -->
                <div>
                    <h3 class="text-lg font-semibold text-indigo-600 mb-4">Follow us</h3>
                    <div class="space-y-2">
                        <a href="#" class="block text-gray-600 hover:text-gray-900">linkedIn</a>
                        <a href="#" class="block text-gray-600 hover:text-gray-900">Instagram</a>
                        <a href="#" class="block text-gray-600 hover:text-gray-900">X</a>
                    </div>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-semibold text-indigo-600 mb-4">Get in Touch</h3>
                    <div class="space-y-2">
                        <p class="text-gray-600">kk 308, kabeza, Kicukiro, Kigali Rwanda</p>
                        <p class="text-gray-600">afanyuji@gmail.com</p>
                        <p class="text-gray-600">+250793908701</p>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-200 text-center">
                <p class="text-gray-600">&copy; 2025 ItemTracer. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>