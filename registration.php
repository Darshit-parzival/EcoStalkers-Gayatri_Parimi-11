<?php
session_start();

// Redirect to dashboard if already logged in
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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if email already exists
        $check_email = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($check_email);
        
        if ($result->num_rows > 0) {
            $error = "Email already exists!";
        } else {
            // Insert user into database
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
            
            if ($conn->query($sql) === TRUE) {
                $_SESSION['user_id'] = $conn->insert_id; // Store user ID in session
                $_SESSION['user_name'] = $name; // Store name in session
                header("Location: dashboard.php"); // Redirect to dashboard
                exit();
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    }
}

$conn->close();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eco Stalkers - Signup</title>
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
              <h1 class="login-header">Signup your Account</h1>

              <?php if (isset($error)): ?>
                <div style="color: red; text-align: center;"><?= $error; ?></div>
              <?php endif; ?>

              <form class="login-form" method="POST" action="">
                <input type="text" name="name" placeholder="Name" class="input-field" required />
                <input type="email" name="email" placeholder="Email" class="input-field" required />
                <input type="password" name="password" placeholder="Password" class="input-field" required />
                <input type="password" name="confirm_password" placeholder="Confirm Password" class="input-field" required />

                <button type="submit" class="login-button">Signup</button>

                <p class="signup-text">Have an account?</p>
                <a href="login.php" type="button" class="signup-button">Sign In</a>
              </form>
            </div>
          </div>
        </section>
      </main>
    </div>
  </body>
</html>
