
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Register</title>
</head>
<body>
  <div class="flex justify-center items-center h-screen bg-indigo-600">
    <div class="w-96 p-6 shadow-lg bg-white rounded-md">
      <h1 class="text-3xl block text-center font-semibold">Register</h1>
      <hr class="mt-3">
      <form action="register.php" method="POST">
        <div class="mt-3">
          <label class="block text-base mb-2">Username</label>
          <input type="text" name="username" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600" placeholder="Enter username..."/>
        </div>
        <div class="mt-3">
          <label class="block text-base mb-2">Password</label>
          <input type="password" name="password" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600" placeholder="Enter password..."/>
        </div>
        <i class="flex items-center text-red-500 text-sm mt-1"> <?=$register_message?> </i>
        <div class="mt-5">
          <button type="submit" name="register" class="border-2 border-indigo-700 bg-indigo-700 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-indigo-700 font-semibold">Register</button>
        </div>
        <span class="mt-3 flex justify-center">
          <p class="text-sm">Have an admin account? <a href="login.php" class="text-indigo-700 font-semibold hover:underline">Login</a></p>
        </span>
      </form>
    </div>
  </div>
</body>
</html>