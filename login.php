<?php
session_start();

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "sensor_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Start session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid email or password!";
        }
    } else {
        $error = "No account found with this email!";
    }
}

$conn->close();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eco Stalkers - Login</title>
    <link rel="stylesheet" href="login-page.css" />
  </head>
  <body>
    <div class="page-container">
      <img src="https://cdn.builder.io/api/v1/image/assets/85803fba0ef4434cad5bba38c5b9360a/cd5e4629d5e9f9f35fbc356d0e49928fc76f1a43?placeholderIfAbsent=true" alt="Background" class="background-image"/>

      <header class="nav-bar">
        <div class="nav-container">
          <div class="logo">
            <div class="logo-symbol">✱</div>
            <div class="logo-text">Eco Stalkers</div>
          </div>
        </div>
      </header>

      <main class="main-container">
        <section class="login-section">
          <div class="login-wrapper">
            <div class="login-container">
              <h1 class="login-header">Login to your Account</h1>

              <?php if (isset($error)): ?>
                <div style="color: red; text-align: center;"><?= $error; ?></div>
              <?php endif; ?>

              <form class="login-form" method="POST" action="">
                <input type="email" name="email" placeholder="Email" class="input-field" required />
                <input type="password" name="password" placeholder="Password" class="input-field" required />

                <button type="submit" class="login-button">Login</button>

                <p class="signup-text">Don't have an account?</p>
                <a href="registration.php" type="button" class="signup-button">Sign Up</a>
              </form>
            </div>
          </div>
        </section>
      </main>
    </div>
  </body>
</html>
