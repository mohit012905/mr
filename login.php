
<?php
session_start();
include 'db.php';

$alert = "";

if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn,
    "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($query) > 0)
    {
        $row = mysqli_fetch_assoc($query);

        if(password_verify($password,$row['password']))
        {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['email'] = $row['email'];

            $alert = "
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon:'success',
                    title:'Login Successful',
                    text:'Redirecting to dashboard...',
                    showConfirmButton:false,
                    timer:1800
                }).then(()=>{
                    window.location='home.php';
                });
            });
            </script>";
        }
        else
        {
            $alert = "
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon:'error',
                    title:'Invalid Password',
                    text:'Please enter the correct password.'
                });
            });
            </script>";
        }
    }
    else
    {
        $alert = "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon:'error',
                title:'Account Not Found',
                text:'No account exists with this email.'
            });
        });
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login | Route Rover</title>

<link rel="stylesheet" href="login.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

<div class="blob blob1"></div>
<div class="blob blob2"></div>
<div class="blob blob3"></div>

<div class="container">

    <div class="left-panel">

        <div class="brand">

            <div class="logo">
                <i class="fa-solid fa-rocket"></i>
            </div>

            <h1>Route Rover</h1>

            <p>
                Smart Transportation Platform
            </p>

        </div>

        <div class="features">

            <div class="feature">
                <i class="fa-solid fa-shield-halved"></i>
                Secure Authentication
            </div>

            <div class="feature">
                <i class="fa-solid fa-bolt"></i>
                Fast Performance
            </div>

            <div class="feature">
                <i class="fa-solid fa-cloud"></i>
                Cloud Powered
            </div>

        </div>

    </div>

    <div class="right-panel">

        <div class="card">

            <h2>Welcome Back</h2>

            <p class="subtitle">
                Sign in to continue your journey
            </p>

            <form method="POST">

                <div class="input-box">

                    <i class="fa-solid fa-envelope"></i>

                    <input
                    type="email"
                    name="email"
                    placeholder="Email Address"
                    required>

                </div>

                <div class="input-box password-box">

    <i class="fa-solid fa-lock"></i>

    <input
        type="password"
        id="password"
        name="password"
        placeholder="Password"
        required>

    <span class="toggle-password"
          onclick="togglePassword()">

        <i id="eyeIcon"
           class="fa-solid fa-eye"></i>

    </span>

</div>

                <div class="login-options">

                    <label>
                        <input type="checkbox">
                        Remember Me
                    </label>

                    <a href="#">
                        Forgot Password?
                    </a>

                </div>

                <button
                type="submit"
                name="login"
                class="btn">

                    Sign In

                </button>

            </form>

            <div class="divider">
                <span>OR</span>
            </div>

            <button class="google-btn">

                <i class="fa-brands fa-google"></i>

                Continue with Google

            </button>

            <div class="login-link">

                Don't have an account?

                <a href="register.php">
                    Create Account
                </a>

            </div>

        </div>

    </div>

</div>

<?php echo $alert; ?>

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
        eyeIcon.classList.replace(
        "fa-eye",
        "fa-eye-slash");
    }
    else
    {
        password.type = "password";
        eyeIcon.classList.replace(
        "fa-eye-slash",
        "fa-eye");
    }
}

</script>

</body>
</html>
