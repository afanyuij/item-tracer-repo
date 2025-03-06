<!-- header -->

<?php

    include "./header.php";
    
    
?>
    <!-- Hero Section -->
    <section class="container mx-auto px-4 py-16 md:py-24 ">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <h1 class="text-4xl md:text-5xl font-bold text-navy">
                    Welcome to
                    <div class="mt-2"><img src="./assets/logo.png" alt="ItemTracer Logo" class="h-20"> </div>
                </h1>
                <p class="text-gray-600 text-lg">
                    Lost something? Found an item? We've got you covered!<br>
                    Connect lost belongings with their rightful owners quickly and easily.<br>
                    Start searching or reporting now! 🚀
                </p>
                <div class="flex flex-col sm:flex-row gap-7">
                    <a href="lost-doc-form.php"><button class="px-6 py-3 bg-navy text-white rounded-md hover:bg-navy/90 hover:scale-105 duration-150">
                        Report Lost item
                    </button></a>
                    <a href="found-doc-form.php"><button class="px-6 py-3 border-2 border-navy text-navy rounded-md hover:bg-gray-50 hover:scale-105 duration-150">
                        Report Found item
                    </button></a>
                </div>
            </div>
            <div class="hidden md:block">
                <img src="./assets/Мышление мужская фигура деловой человек думает о….jpg" alt="Hero Illustration" class="w-full">
            </div>
        </div>
    </section>

    <!-- Services Section -->
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

    <!-- How It Works -->
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

    <!-- Footer -->
    <?php
    include './footer.php'
    ?>