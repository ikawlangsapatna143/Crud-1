<?php
session_start();

// Hardcoded credentials
$admin_email = "Admin";
$admin_pass  = "admin123";

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === $admin_email && $password === $admin_pass) {
        $_SESSION['auth'] = true;
        $_SESSION['auth_user'] = [
            'user_name' => "Administrator",
            'user_email' => $admin_email,
        ];
        $_SESSION['message'] = "Welcome Administrator";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['message'] = "Invalid Email or Password";
        header("Location: login.php");
        exit();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Login</title>
</head>
<body>
<div class="container mt-5">

    <!-- Display Session Message -->
    <?php
    if (isset($_SESSION['message'])) {
        echo '<div class="alert alert-info">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
    }
    ?>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header"><h4>Login</h4></div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                        </div>
                        <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
