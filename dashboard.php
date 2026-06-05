
<?php
include 'auth.php';

$totalUsers = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM users")
);

$activeUsers = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM users WHERE status='active'")
);

$newUsers = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM users
WHERE DATE(created_at)=CURDATE()")
);

$recentUsers = mysqli_query(
$conn,
"SELECT * FROM users
ORDER BY id DESC
LIMIT 5"
);
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Admin Dashboard</title>

<link rel="stylesheet" href="admin.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<div class="sidebar">

<div class="logo">
<i class="fa-solid fa-route"></i>
<span>Route Rover</span>
</div>

<a class="active" href="dashboard.php">
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

<h1>Dashboard Overview</h1>

<div class="admin-info">

<i class="fa-solid fa-user-shield"></i>

<?php echo $_SESSION['admin_name']; ?>

</div>

</div>

<div class="cards">

<div class="card">

<i class="fa-solid fa-users"></i>

<h2><?php echo $totalUsers; ?></h2>

<p>Total Users</p>

</div>

<div class="card">

<i class="fa-solid fa-user-check"></i>

<h2><?php echo $activeUsers; ?></h2>

<p>Active Users</p>

</div>

<div class="card">

<i class="fa-solid fa-user-plus"></i>

<h2><?php echo $newUsers; ?></h2>

<p>Today's Users</p>

</div>

</div>

<div class="section">

<h3>Recent Users</h3>

<table>

<tr>
<th>Name</th>
<th>Email</th>
<th>Status</th>
<th>Role</th>
</tr>

<?php while($row=mysqli_fetch_assoc($recentUsers)){ ?>

<tr>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['email']; ?></td>

<td>
<span class="status">
<?php echo ucfirst($row['status']); ?>
</span>
</td>

<td>
<?php echo ucfirst($row['role']); ?>
</td>

</tr>

<?php } ?>

</table>

</div>

<div class="section">

<h3>System Status</h3>

<div class="status-box">

<p>🟢 Database Connected</p>

<p>🟢 Server Running</p>

<p>🟢 Admin Panel Active</p>

</div>

</div>

</div>

</body>
</html>
