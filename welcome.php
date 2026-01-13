<?php
session_start();
require_once "db.php";


if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: login-form.php");
    exit();
}


if (!isset($_SESSION['login_time'])) {
    $_SESSION['login_time'] = date("Y-m-d H:i:s");
}


$user = $_SESSION['user'];


try {
    $result = $conn->query("SELECT fullname, username, email, created_at FROM users");
    if (!$result) {
        throw new Exception("Failed to fetch users");
    }
} catch (Exception $e) {
    error_log("FETCH_USERS_ERROR: " . $e->getMessage());
    die("Unable to load users at this time.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | SIA Lab Activity 2</title>
    <style>
        :root{--bg:#f6f9fc;--card:#ffffff;--accent:#4f46e5;--muted:#6b7280}
        *{box-sizing:border-box;font-family:Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif}
        body{margin:0;background:var(--bg);color:#0f172a;padding:32px}
        .container{max-width:1100px;margin:0 auto}
        .header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px}
        .brand{display:flex;align-items:center;gap:12px}
        .logo{width:44px;height:44px;border-radius:10px;background:linear-gradient(135deg,#6366f1,#8b5cf6);display:flex;align-items:center;justify-content:center;color:white;font-weight:700}
        h1{font-size:18px;margin:0}
        .sub{color:var(--muted);font-size:13px}
        .main{display:grid;grid-template-columns:320px 1fr;gap:20px}
        .card{background:var(--card);padding:18px;border-radius:12px;box-shadow:0 6px 18px rgba(15,23,42,0.06)}
        .profile .avatar{width:72px;height:72px;border-radius:10px;background:#eef2ff;color:var(--accent);display:flex;align-items:center;justify-content:center;font-size:28px;font-weight:700;margin-bottom:12px}
        .info-row{display:flex;justify-content:space-between;color:var(--muted);font-size:13px;margin-top:6px}
        .table-wrap{overflow:auto}
        table.table{width:100%;border-collapse:collapse}
        table.table th, table.table td{padding:12px 14px;text-align:left;border-bottom:1px solid #eef2f6}
        table.table th{background:#fbfdff;color:var(--muted);font-size:13px}
        table.table tr:nth-child(even){background:#ffffff}
        .logout-btn{background:var(--accent);color:#fff;border:none;padding:10px 14px;border-radius:10px;cursor:pointer}
        .actions{display:flex;gap:8px;align-items:center}
        .alert{padding:12px 14px;border-radius:8px;font-size:13px;margin-bottom:16px}
        .alert-success{background:#ecfdf5;color:#065f46;border:1px solid #d1fae5}
        .alert-info{background:#eff6ff;color:#1e40af;border:1px solid #bfdbfe}
        @media(max-width:880px){.main{grid-template-columns:1fr}.header{flex-direction:column;align-items:flex-start;gap:12px}}
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="brand">
            <div>
                <h1>Welcome back, <?php echo htmlspecialchars($user['fullname']); ?>!</h1>
                <div class="sub">Logged in as <?php echo htmlspecialchars($user['username']); ?> · <?php echo $_SESSION['login_time']; ?></div>
            </div>
        </div>
        <div class="actions">
            <form method="POST" action="logout.php" style="margin:0">
                <button class="logout-btn" type="submit">Logout</button>
            </form>
        </div>
    </div>

    <div id="notification" class="alert alert-info" style="display:none;position:fixed;top:20px;right:20px;max-width:400px;z-index:1000;box-shadow:0 4px 12px rgba(0,0,0,0.1)">
        <strong>Logging out...</strong> You will be redirected shortly.
    </div>

    <div class="main">
        <div class="card profile">
            <div class="avatar"><?php echo strtoupper(substr($user['fullname'],0,1)); ?></div>
            <h3 style="margin:0 0 6px 0">Profile</h3>
            <div class="sub">Basic details</div>
            <div class="info-row"><strong>Full Name</strong><span><?php echo htmlspecialchars($user['fullname']); ?></span></div>
            <div class="info-row"><strong>Username</strong><span><?php echo htmlspecialchars($user['username']); ?></span></div>
            <div class="info-row"><strong>Email</strong><span><?php echo htmlspecialchars($user['email']); ?></span></div>
            <div class="info-row"><strong>Login Time</strong><span><?php echo $_SESSION['login_time']; ?></span></div>
        </div>

        <div class="card">
            <h3 style="margin-top:0">Registered Users</h3>
            <div class="table-wrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                    </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Show logout notification when form is submitted
    document.querySelector('form[action="logout.php"]').addEventListener('submit', function() {
        document.getElementById('notification').style.display = 'block';
    });
</script>

</body>
</html>