<body class="bg-gray-50">
    <!-- Header -->
    <?php
    // if (!isset($_SESSION['username'])) {
    //     header("location:login.php");
    // }
    include './header.php';
    include "./dbcon.php";

    $sql = "SELECT * FROM documents WHERE DocumentStatus='Lost'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // Main Content
        ?>
        <main class="container mx-auto px-4 py-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Documents Lost</h1>
                    <p class="text-gray-600 mt-2">Browse our gallery for lost documents</p>
                </div>
                <form action="" method="get" class="flex gap-10">
                    <div class="search flex">
                        <input type="text" value="<?php if (isset($_GET['search'])) {
                                                            echo $_GET['search'];
                                                        } ?>" class="searchTerm w-96 p-3 outline-none focus:bg-slate-200 duration-300 rounded-xl" placeholder="Search for documents" name="search">
                        <a href="" class="p-3 bg-slate-300 w-32 flex items-center">
                            <button type="submit" class="text-center text-black font-medium">Search</button>
                            <img src="./image/search.png" alt="search_icon" width="30px" height="30px" srcset="">
                        </a>
                    </div>
                    <div class="mr-56">
                        
                            <button class="bg-indigo-500 text-white px-6 py-2 rounded-lg hover:bg-indigo-600"><a href="lost-doc-form.php">
                                Report a Lost Document</a>
                            </button>
                        
                    </div>
                </form>
            </div>

            <h2 class="text-xl font-semibold text-gray-900 mb-6">All Documents</h2>

            <div class="flex gap-8">
                <!-- Categories Sidebar -->
                <div class="w-64 flex-shrink-0">
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <h3 class="text-sm font-semibold mb-4">Categories</h3>
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <a href="#">
                                    <h4 class="text-primary font-medium"> Personal Identification Documents</h4>
                                </a>
                                <ul class="ml-4 space-y-1 text-sm text-gray-600">
                                    <a href=""><li>• National ID cards</li></a>
                                    <a href=""><li>• Passports</li></a>
                                    <a href=""><li>• Driver's licenses</li></a>
                                    <a href=""><li>• Birth certificates</li></a>
                                </ul>
                            </div>

                            <div class="space-y-2">
                                <a href="#">
                                    <h4 class="text-primary font-medium"> Financial Documents:</h4>
                                </a>
                                <ul class="ml-4 space-y-1 text-sm text-gray-600">
                                    <a href="#"><li>• Credit/debit cards</li></a>
                                    <a href="#"> <li>• Insurance policies</li></a>
                                </ul>
                            </div>

                            <div class="space-y-2">
                                <a href="#">
                                    <h4 class="text-primary font-medium"> Professional Documents:</h4>
                                </a>
                                <ul class="ml-4 space-y-1 text-sm text-gray-600">
                                    <a href="#"><li>• Work ID badges</li></a>
                                    <a href="#"><li>• Business licenses</li></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Document Grid -->
                <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php
                    if (isset($_GET['search'])) {
                        $search = $_GET['search'];
                        $sql_search = "SELECT * FROM documents WHERE CONCAT(OwnerName, OwnerContact, DocumentNumber, Descriptions) LIKE '%$search%'";
                        $result_search = mysqli_query($conn, $sql_search);
                        if ($result_search) {
                            while ($searchval = $result_search->fetch_assoc()) {
                                ?>
                                <div class="bg-white rounded-lg p-4 shadow-sm">
                                    <div class="aspect-square bg-gray-100 rounded-lg mb-4 flex items-center justify-center text-gray-400">
                                        <img src="./image/<?php echo $searchval['lost_img']; ?>" alt="Lost Item Image">
                                    </div>
                                    <h3 class="font-medium mb-2"><?php echo $searchval['OwnerName']; ?></h3>
                                    <p class="text-sm text-gray-500 mb-4"><?php echo $searchval['Descriptions']; ?></p>
                                    <a href="afanyuij@gmail.com"><p class="text-sm text-gray-400"><?php echo $searchval['OwnerContact']; ?></p></a>
                                </div>
                            <?php
                            }
                        } else {
                            echo 'Error: ' . mysqli_error($conn);
                        }
                    } else {
                        while ($info = $result->fetch_assoc()) {
                            ?>
                            <div class="bg-white rounded-lg p-4 shadow-sm">
                                <div class="aspect-square bg-gray-100 rounded-lg mb-4 flex items-center justify-center text-gray-400">
                                    <img src="./image/<?php echo $info['lost_img']; ?>" alt="Lost Item Image">
                                </div>
                                <h3 class="font-medium mb-2"><?php echo $info['OwnerName']; ?></h3>
                                <p class="text-sm text-gray-500 mb-4"><?php echo $info['Descriptions']; ?></p>
                                <a href="afanyuij@gmail.com"><p class="text-sm text-gray-400"><?php echo $info['OwnerContact']; ?></p></a>
                            </div>
                        <?php
                        }
                    }}
                    ?>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <?php
        include './footer.php'
        ?>
