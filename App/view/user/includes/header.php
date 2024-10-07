
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-white text-xl font-bold">Dashboard</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="user_dashboard.php" class="text-white hover:text-gray-200">Home</a></li>
                    <li><a href="profile.php" class="text-white hover:text-gray-200">Profile</a></li>
                    <li><a href="settings.php" class="text-white hover:text-gray-200">Settings</a></li>
                    <li><a href="./logout.php" class="text-white hover:text-gray-200">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
