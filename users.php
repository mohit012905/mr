
<?php
include 'auth.php';

$search = "";

if(isset($_GET['search']))
{
    $search = mysqli_real_escape_string(
        $conn,
        $_GET['search']
    );

    $users = mysqli_query(
        $conn,
        "SELECT * FROM users
         WHERE fullname LIKE '%$search%'
         OR email LIKE '%$search%'
         ORDER BY id DESC"
    );
}
else
{
    $users = mysqli_query(
        $conn,
        "SELECT * FROM users
         ORDER BY id DESC"
    );
}

$totalUsers = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM users")
);
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Manage Users</title>

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

        <h1>Manage Users</h1>

        <div class="admin-info">

            <i class="fa-solid fa-user-shield"></i>

            <?php echo $_SESSION['admin_name']; ?>

        </div>

    </div>

    <div class="cards">

        <div class="card">

            <i class="fa-solid fa-users"></i>

            <h2>
                <?php echo $totalUsers; ?>
            </h2>

            <p>Total Users</p>

        </div>

    </div>

    <div class="section">

        <div class="section-header">

            <form method="GET">

                <div class="search-box">

                    <input
                    type="text"
                    name="search"
                    placeholder="Search User..."
                    value="<?php echo $search; ?>">

                    <button type="submit">

                        <i class="fa-solid fa-search"></i>

                    </button>

                </div>

            </form>

            <a
            class="add-btn"
            href="add_user.php">

                <i class="fa-solid fa-plus"></i>

                Add User

            </a>

        </div>

        <table>

            <tr>

                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Role</th>
                <th>Actions</th>

            </tr>

            <?php while($row=mysqli_fetch_assoc($users)){ ?>

            <tr>

                <td>
                    <?php echo $row['id']; ?>
                </td>

                <td>
                    <?php echo $row['fullname']; ?>
                </td>

                <td>
                    <?php echo $row['email']; ?>
                </td>

                <td>

                    <span class="status">

                        <?php echo ucfirst($row['status']); ?>

                    </span>

                </td>

                <td>

                    <span class="role">

                        <?php echo ucfirst($row['role']); ?>

                    </span>

                </td>

                <td>

                    <a
                    class="edit-btn"
                    href="edit_user.php?id=<?php echo $row['id']; ?>">

                        <i class="fa-solid fa-pen"></i>

                    </a>

                    <a
                    class="delete-btn"
                    onclick="return confirm('Delete this user?')"
                    href="delete_user.php?id=<?php echo $row['id']; ?>">

                        <i class="fa-solid fa-trash"></i>

                    </a>

                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>
