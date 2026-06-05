
<?php
include 'auth.php';

$id = $_GET['id'];

$user = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM users WHERE id='$id'"
));

if(isset($_POST['update']))
{
    $fullname = mysqli_real_escape_string(
        $conn,
        $_POST['fullname']
    );

    $username = mysqli_real_escape_string(
        $conn,
        $_POST['username']
    );

    $email = mysqli_real_escape_string(
        $conn,
        $_POST['email']
    );

    $phone = mysqli_real_escape_string(
        $conn,
        $_POST['phone']
    );

    $role = $_POST['role'];

    $status = $_POST['status'];

    mysqli_query(
    $conn,
    "UPDATE users SET

    fullname='$fullname',
    username='$username',
    email='$email',
    phone='$phone',
    role='$role',
    status='$status'

    WHERE id='$id'"
    );

    header("Location: users.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Edit User</title>

<link rel="stylesheet"
href="admin.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<div class="sidebar">

    <div class="logo">
        <i class="fa-solid fa-route"></i>
        Route Rover
    </div>

    <a href="dashboard.php">
        <i class="fa-solid fa-chart-line"></i>
        Dashboard
    </a>

    <a class="active" href="users.php">
        <i class="fa-solid fa-users"></i>
        Users
    </a>

    <a href="profile.php">
        <i class="fa-solid fa-user"></i>
        Profile
    </a>

    <a href="settings.php">
        <i class="fa-solid fa-gear"></i>
        Settings
    </a>

    <a href="admin_login.php">
        <i class="fa-solid fa-right-from-bracket"></i>
        Logout
    </a>

</div>

<div class="content">

    <div class="topbar">

        <h1>Edit User</h1>

        <div class="admin-info">

            <i class="fa-solid fa-user-shield"></i>

            <?php echo $_SESSION['admin_name']; ?>

        </div>

    </div>

    <div class="form-card">

        <div class="user-avatar">

            <i class="fa-solid fa-user"></i>

        </div>

        <h2>
            <?php echo $user['fullname']; ?>
        </h2>

        <form method="POST">

            <div class="form-grid">

                <div class="form-group">

                    <label>Full Name</label>

                    <input
                    type="text"
                    name="fullname"
                    value="<?php echo $user['fullname']; ?>"
                    required>

                </div>

                <div class="form-group">

                    <label>Username</label>

                    <input
                    type="text"
                    name="username"
                    value="<?php echo $user['username']; ?>"
                    required>

                </div>

                <div class="form-group">

                    <label>Email Address</label>

                    <input
                    type="email"
                    name="email"
                    value="<?php echo $user['email']; ?>"
                    required>

                </div>

                <div class="form-group">

                    <label>Phone Number</label>

                    <input
                    type="text"
                    name="phone"
                    value="<?php echo $user['phone']; ?>">

                </div>

                <div class="form-group">

                    <label>Role</label>

                    <select name="role">

                        <option value="user"
                        <?php if($user['role']=="user") echo "selected"; ?>>

                        User

                        </option>

                        <option value="admin"
                        <?php if($user['role']=="admin") echo "selected"; ?>>

                        Admin

                        </option>

                    </select>

                </div>

                <div class="form-group">

                    <label>Status</label>

                    <select name="status">

                        <option value="active"
                        <?php if($user['status']=="active") echo "selected"; ?>>

                        Active

                        </option>

                        <option value="inactive"
                        <?php if($user['status']=="inactive") echo "selected"; ?>>

                        Inactive

                        </option>

                    </select>

                </div>

            </div>

            <div class="action-buttons">

                <a
                href="users.php"
                class="cancel-btn">

                    Cancel

                </a>

                <button
                type="submit"
                name="update"
                class="save-btn">

                    <i class="fa-solid fa-floppy-disk"></i>

                    Update User

                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>