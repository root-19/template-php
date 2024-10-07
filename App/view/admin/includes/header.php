<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../../../assets/css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-white text-xl font-bold">Dashboard</h1>
            <button id="hamburger" class="md:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <nav class="hidden md:block">
                <ul class="flex space-x-4">
                    <li><a href="user_dashboard.php" class="text-white hover:text-gray-200">Home</a></li>
                    <li><a href="profile.php" class="text-white hover:text-gray-200">Profile</a></li>
                    <li><a href="settings.php" class="text-white hover:text-gray-200">Settings</a></li>
                    <li><a href="./logout.php" class="text-white hover:text-gray-200">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div id="mobileMenu" class="md:hidden navbar max-h-0 overflow-hidden transition-all duration-300">
           <hr class="text-black">
        <ul class="flex flex-col space-y-2 p-4  font-bold">
                <li><a href="user_dashboard.php" class="text-white hover:text-gray-200">Home</a></li>
                <li><a href="profile.php" class="text-white hover:text-gray-200">Profile</a></li>
                <li><a href="settings.php" class="text-white hover:text-gray-200">Settings</a></li>
                <li><a href="./logout.php" class="text-white hover:text-gray-200">Logout</a></li>
            </ul>
        </div>
    </header>

<script  type="module" src="../../../assets/js/header.js"> </script>

