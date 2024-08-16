<?php
  require_once("services/database.php");
  session_start();

  $login_notification = "";

  if(isset($_SESSION["is_login"])){
    header("location: index.php");
  }

  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  }

  $query_select_admin = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $select_admin = $db->query($query_select_admin);
  if ($select_admin->num_rows > 0) {
    $selected_admin = $select_admin->fetch_assoc();

    $_SESSION['is_login'] = true;
    $_SESSION['username'] = $selected_admin['username'];
    header("location: index.php");
  } else {
    $login_notification = "Akun admin tidak ditemukan!";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Login</title>
</head>
<body>
  <div class="flex justify-center items-center h-screen bg-indigo-600">
    <div class="w-96 p-6 shadow-lg bg-white rounded-md">
      <h1 class="text-3xl block text-center font-semibold">Login</h1>
      <hr class="mt-3">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="mt-3">
          <label class="block text-base mb-2">Username</label>
          <input type="text" name="username" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600" placeholder="Enter username..."/>
        </div>
        <div class="mt-3">
          <label class="block text-base mb-2">Password</label>
          <input type="password" name="password" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600" placeholder="Enter password..."/>
        </div>
        <i class="flex items-center text-red-500 text-sm mt-1"> <?= $login_notification?> </i>
        <div class="mt-3 flex justify-between items-center text-sm">
          <div>
            <input type="checkbox">
            <label>Remember me</label>
          </div>
          <div>
            <a href="#" class="text-indigo-800 font-semibold hover:underline">Forgot password?</a>
          </div>
        </div>
        <div class="mt-5">
          <button type="submit" name="login" class="border-2 border-indigo-700 bg-indigo-700 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-indigo-700 font-semibold">Login</button>
        </div>
        <span class="mt-3 flex justify-center">
          <p class="text-sm">Don't have an admin account yet? <a href="" class="text-indigo-700 font-semibold hover:underline">Register</a></p>
        </span>
      </form>
    </div>
  </div>
</body>
</html>