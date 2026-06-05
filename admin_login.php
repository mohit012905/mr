<?php
session_start();
include '../db.php';

$msg = "";

if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string(
        $conn,
        $_POST['email']
    );

    $password = $_POST['password'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM users
         WHERE email='$email'
         AND role='admin'"
    );

    if(mysqli_num_rows($query) > 0)
    {
        $row = mysqli_fetch_assoc($query);

        if(password_verify(
            $password,
            $row['password']
        ))
        {
            $_SESSION['admin_id'] =
            $row['id'];

            $_SESSION['admin_name'] =
            $row['fullname'];

            header(
            "Location: dashboard.php"
            );

            exit();
        }
        else
        {
            $msg =
            "Invalid Password";
        }
    }
    else
    {
        $msg =
        "Admin Not Found";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Login</title>

<link rel="stylesheet"
href="admin_login.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<div class="blob blob1"></div>
<div class="blob blob2"></div>
<div class="blob blob3"></div>

<div class="container">

    <div class="left-panel">

        <div class="brand">

            <div class="logo">
                <i class="fa-solid fa-user-shield"></i>
            </div>

            <h1>Route Rover</h1>

            <p>
                Administration Portal
            </p>

        </div>

        <div class="features">

            <div class="feature">
                <i class="fa-solid fa-shield-halved"></i>
                Secure Authentication
            </div>

            <div class="feature">
                <i class="fa-solid fa-users-gear"></i>
                Manage Users & Roles
            </div>

            <div class="feature">
                <i class="fa-solid fa-chart-line"></i>
                Monitor Platform Activity
            </div>

        </div>

    </div>

    <div class="right-panel">

        <div class="card">

            <h2>Admin Login</h2>

            <p class="subtitle">
                Access the administrator dashboard
            </p>

            <?php if($msg!=""){ ?>

            <div class="error">
                <?php echo $msg; ?>
            </div>

            <?php } ?>

            <form method="POST">

                <div class="input-box">

                    <i class="fa-solid fa-envelope left-icon"></i>

                    <input
                    type="email"
                    name="email"
                    placeholder="Admin Email"
                    required>

                </div>

                <div class="input-box password-box">

                    <i class="fa-solid fa-lock left-icon"></i>

                    <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Password"
                    required>

                  <button
type="button"
class="toggle-password"
onclick="togglePassword()">

<i id="eyeIcon"
class="fa-solid fa-eye"></i>

</button>

                </div>

                <button
                class="btn"
                name="login">

                    Sign In

                </button>

            </form>

            <div class="footer-text">

                Route Rover Admin Panel

            </div>

        </div>

    </div>

</div>

<script>

function togglePassword()
{
    const password =
    document.getElementById("password");

    const eyeIcon =
    document.getElementById("eyeIcon");

    if(password.type === "password")
    {
        password.type = "text";

        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    }
    else
    {
        password.type = "password";

        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
}

</script>

</body>
</html>