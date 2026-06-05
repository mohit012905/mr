
<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Settings</title>

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

    <a href="profile.php">
        <i class="fa-solid fa-user"></i>
        Profile
    </a>

    <a class="active" href="settings.php">
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

        <h1>System Settings</h1>

        <div class="admin-info">

            <i class="fa-solid fa-user-shield"></i>

            <?php echo $_SESSION['admin_name']; ?>

        </div>

    </div>

    <!-- Website Settings -->

    <div class="section">

        <h3>
            <i class="fa-solid fa-globe"></i>
            Website Settings
        </h3>

        <div class="settings-grid">

            <div class="form-group">

                <label>Website Name</label>

                <input
                type="text"
                value="Route Rover">

            </div>

            <div class="form-group">

                <label>Support Email</label>

                <input
                type="email"
                value="admin@routerover.com">

            </div>

        </div>

    </div>

    <!-- SMTP Settings -->

    <div class="section">

        <h3>
            <i class="fa-solid fa-envelope"></i>
            Email Settings
        </h3>

        <div class="settings-grid">

            <div class="form-group">

                <label>SMTP Host</label>

                <input
                type="text"
                value="smtp.gmail.com">

            </div>

            <div class="form-group">

                <label>SMTP Port</label>

                <input
                type="text"
                value="587">

            </div>

        </div>

    </div>

    <!-- AI Settings -->

    <div class="section">

        <h3>
            <i class="fa-solid fa-robot"></i>
            AI Assistant Settings
        </h3>

        <div class="settings-grid">

            <div class="form-group">

                <label>AI Provider</label>

                <input
                type="text"
                value="Groq">

            </div>

            <div class="form-group">

                <label>Model</label>

                <input
                type="text"
                value="llama-3.1-8b-instant">

            </div>

        </div>

    </div>

    <!-- Security -->

    <div class="section">

        <h3>
            <i class="fa-solid fa-shield-halved"></i>
            Security Settings
        </h3>

        <div class="toggle-row">

            <span>Allow User Registration</span>

            <input type="checkbox" checked>

        </div>

        <div class="toggle-row">

            <span>Enable AI Assistant</span>

            <input type="checkbox" checked>

        </div>

    </div>

    <!-- System Info -->

    <div class="section">

        <h3>
            <i class="fa-solid fa-server"></i>
            System Information
        </h3>

        <p><strong>PHP Version:</strong> <?php echo phpversion(); ?></p>

        <p><strong>Database:</strong> Connected</p>

        <p><strong>Server:</strong> Apache / XAMPP</p>

    </div>

    <button class="save-btn">

        <i class="fa-solid fa-floppy-disk"></i>

        Save Settings

    </button>

</div>

</body>
</html>
