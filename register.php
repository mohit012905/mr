
<?php
include 'db.php';

$alert = "";

if(isset($_POST['register']))
{
    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email    = mysqli_real_escape_string($conn,$_POST['email']);
    $phone    = mysqli_real_escape_string($conn,$_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password != $confirm_password)
    {
        $alert = "
        <script>
        Swal.fire({
            icon:'error',
            title:'Password Mismatch',
            text:'Passwords do not match!'
        });
        </script>";
    }
    else
    {
        $check = mysqli_query($conn,
        "SELECT * FROM users WHERE email='$email' OR username='$username'");

        if(mysqli_num_rows($check) > 0)
        {
            $alert = "
            <script>
            Swal.fire({
                icon:'error',
                title:'Account Exists',
                text:'Email or Username already exists!'
            });
            </script>";
        }
        else
        {
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);

            mysqli_query($conn,"
            INSERT INTO users
            (fullname,username,email,phone,password)
            VALUES
            ('$fullname','$username','$email','$phone','$hashed_password')
            ");

            $alert = "
            <script>
            Swal.fire({
                icon:'success',
                title:'Registration Successful!',
                text:'Redirecting to Login...',
                timer:2500,
                showConfirmButton:false
            }).then(()=>{
                window.location='login.php';
            });
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Create Account</title>

<link rel="stylesheet" href="register.css">

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

            <h2>Create Account</h2>

            <p class="subtitle">
                Start your journey with us
            </p>

            <form method="POST">

                <div class="input-box">
                    <i class="fa-solid fa-user"></i>
                    <input type="text"
                    name="fullname"
                    placeholder="Full Name"
                    required>
                </div>

                <div class="input-box">
                    <i class="fa-solid fa-at"></i>
                    <input type="text"
                    name="username"
                    placeholder="Username"
                    required>
                </div>

                <div class="input-box">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email"
                    name="email"
                    placeholder="Email Address"
                    required>
                </div>

                <div class="input-box">
                    <i class="fa-solid fa-phone"></i>
                    <input type="text"
                    name="phone"
                    placeholder="Phone Number"
                    required>
                </div>

                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password"
                    id="password"
                    name="password"
                    placeholder="Password"
                    required>
                </div>

                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password"
                    name="confirm_password"
                    placeholder="Confirm Password"
                    required>
                </div>

                <button type="submit"
                name="register"
                class="btn">
                    Create Account
                </button>

            </form>

            <div class="login-link">
                Already have an account?
                <a href="login.php">
                    Sign In
                </a>
            </div>

        </div>

    </div>

</div>

<?php echo $alert; ?>

</body>
</html>
