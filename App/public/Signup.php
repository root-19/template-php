<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up / Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .form-container {
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        .hidden {
            opacity: 0;
            transform: translateY(-20px);
        }
        .show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-2xl font-bold text-center mb-6" id="formTitle">Sign Up</h2>

            <!-- Sign Up Form -->
            <form id="signupForm" class="form-container show" action="../controller/Controller.php" method="POST">
                <input type="hidden" name="action" value="register">
                <p class="text-center text-sm text-gray-600 mt-4">
                    <?php if (isset($_SESSION['error'])): ?>
                        <span class="text-red-500"><?php echo $_SESSION['error']; ?></span>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>
                </p>

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" id="name" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white p-2 rounded-md mt-4 hover:bg-indigo-700">Sign Up</button>
            </form>

            <!-- Sign In Form -->
            <form id="signinForm" class="form-container hidden" action="../controller/Controller.php" method="POST">
                <input type="hidden" name="action" value="login">
                <p class="text-center text-sm text-gray-600 mt-4">
                    <?php if (isset($_SESSION['error'])): ?>
                        <span class="text-red-500"><?php echo $_SESSION['error']; ?></span>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>
                </p>

                <div class="mb-4">
                    <label for="email_signin" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email_signin" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="password_signin" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password_signin" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white p-2 rounded-md mt-4 hover:bg-indigo-700">Sign In</button>
            </form>

            <p class="text-center text-sm text-gray-600 mt-4">
                <span id="toggleText">Don't have an account? <a href="#" class="text-indigo-600 hover:underline" id="toggleLink">Sign Up</a></span>
            </p>
        </div>
    </div>

    <script type="module" src="../assets/js/loginform.js"> </script>
</body>
</html>
