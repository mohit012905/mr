
<?php
include 'auth.php';

$admin = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM users
WHERE id='".$_SESSION['admin_id']."'"
));
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Admin Profile</title>

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

    <a href="users.php">
        <i class="fa-solid fa-users"></i>
        Users
    </a>

    <a class="active" href="profile.php">
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

        <h1>Admin Profile</h1>

        <div class="admin-info">

            <i class="fa-solid fa-user-shield"></i>

            <?php echo $_SESSION['admin_name']; ?>

        </div>

    </div>

    <div class="profile-container">

        <div class="profile-card">

            <div class="avatar">

                <i class="fa-solid fa-user-shield"></i>

            </div>

            <h2>
                <?php echo $admin['fullname']; ?>
            </h2>

            <p class="role-badge">
                <?php echo ucfirst($admin['role']); ?>
            </p>

        </div>

        <div class="details-card">

            <h3>Account Information</h3>

            <div class="info-row">
                <label>Full Name</label>
                <span><?php echo $admin['fullname']; ?></span>
            </div>

            <div class="info-row">
                <label>Username</label>
                <span><?php echo $admin['username']; ?></span>
            </div>

            <div class="info-row">
                <label>Email</label>
                <span><?php echo $admin['email']; ?></span>
            </div>

            <div class="info-row">
                <label>Phone</label>
                <span><?php echo $admin['phone']; ?></span>
            </div>

            <div class="info-row">
                <label>Status</label>
                <span class="status">
                    <?php echo ucfirst($admin['status']); ?>
                </span>
            </div>

            <div class="info-row">
                <label>Joined</label>
                <span><?php echo $admin['created_at']; ?></span>
            </div>

            <div class="profile-actions">

                <a href="edit_profile.php"
                class="edit-btn">

                    <i class="fa-solid fa-pen"></i>
                    Edit Profile

                </a>

                <a href="change_password.php"
                class="password-btn">

                    <i class="fa-solid fa-lock"></i>
                    Change Password

                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>
