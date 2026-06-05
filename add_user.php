
<?php
include 'auth.php';

if(isset($_POST['add_user']))
{
    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $role = $_POST['role'];

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    mysqli_query($conn,"
    INSERT INTO users
    (
        fullname,
        username,
        email,
        phone,
        password,
        role,
        status
    )
    VALUES
    (
        '$fullname',
        '$username',
        '$email',
        '$phone',
        '$password',
        '$role',
        'active'
    )
    ");

    header("Location: users.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Add User</title>

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

        <h1>Add New User</h1>

        <div class="admin-info">

            <i class="fa-solid fa-user-shield"></i>

            <?php echo $_SESSION['admin_name']; ?>

        </div>

    </div>

    <div class="form-card">

        <div class="user-avatar">

            <i class="fa-solid fa-user-plus"></i>

        </div>

        <h2>Create User Account</h2>

        <form method="POST">

            <div class="form-grid">

                <div class="form-group">

                    <label>Full Name</label>

                    <input
                    type="text"
                    name="fullname"
                    placeholder="Enter full name"
                    required>

                </div>

                <div class="form-group">

                    <label>Username</label>

                    <input
                    type="text"
                    name="username"
                    placeholder="Enter username"
                    required>

                </div>

                <div class="form-group">

                    <label>Email Address</label>

                    <input
                    type="email"
                    name="email"
                    placeholder="Enter email address"
                    required>

                </div>

                <div class="form-group">

                    <label>Phone Number</label>

                    <input
                    type="text"
                    name="phone"
                    placeholder="Enter phone number">

                </div>

                <div class="form-group">

                    <label>Password</label>

                    <input
                    type="password"
                    name="password"
                    placeholder="Enter password"
                    required>

                </div>

                <div class="form-group">

                    <label>User Role</label>

                    <select name="role">

                        <option value="user">
                            User
                        </option>

                        <option value="admin">
                            Admin
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
                name="add_user"
                class="save-btn">

                    <i class="fa-solid fa-user-plus"></i>

                    Add User

                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>
