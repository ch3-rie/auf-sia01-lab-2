<?php
    session_start();
    $msg = $_SESSION['msg'] ?? "";
    unset($_SESSION['msg']);
    $formData = $_SESSION['form_data'] ?? [];
    unset($_SESSION['form_data']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | SIA Lab Activity 2</title>
    <style>
        :root{--bg:#f6f9fc;--card:#ffffff;--accent:#4f46e5;--muted:#6b7280}
        *{box-sizing:border-box;font-family:Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif}
        body{margin:0;background:var(--bg);color:#0f172a;padding:32px;display:flex;align-items:center;justify-content:center;min-height:100vh}
        .container{max-width:560px;margin:0 auto}
        .header{display:flex;align-items:center;justify-content:center;margin-bottom:24px}
        .logo{width:44px;height:44px;border-radius:10px;background:linear-gradient(135deg,#6366f1,#8b5cf6);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:20px}
        .card{background:var(--card);padding:48px;border-radius:12px;box-shadow:0 6px 18px rgba(15,23,42,0.06)}
        h2{text-align:center;font-size:20px;margin:0 0 8px 0;font-weight:600}
        .sub{text-align:center;color:var(--muted);font-size:13px;margin-bottom:24px}
        .form-group{margin-bottom:16px}
        label{display:block;color:#1f2937;font-size:13px;font-weight:500;margin-bottom:6px}
        input{width:100%;padding:10px 12px;border:1px solid #e5e7eb;border-radius:8px;font-size:14px;transition:all 0.2s;font-family:inherit}
        input:focus{outline:none;border-color:var(--accent);box-shadow:0 0 0 3px rgba(79,70,229,0.1)}
        .btn-register{background:var(--accent);color:#fff;border:none;padding:10px 16px;border-radius:8px;cursor:pointer;width:100%;font-size:14px;font-weight:600;transition:all 0.2s;margin-top:8px}
        .btn-register:hover{background:#4338ca;transform:translateY(-1px);box-shadow:0 4px 12px rgba(79,70,229,0.3)}
        .alert{padding:12px 14px;border-radius:8px;font-size:13px;margin-bottom:16px}
        .alert-success{background:#ecfdf5;color:#065f46;border:1px solid #d1fae5}
        .alert-danger{background:#fef2f2;color:#991b1b;border:1px solid #fee2e2}
        .link-text{text-align:center;margin-top:16px;font-size:13px}
        .link-text a{color:var(--accent);text-decoration:none;font-weight:500}
        .link-text a:hover{text-decoration:underline}
        @media(max-width:480px){.card{padding:24px}.header{margin-bottom:20px}}
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Create Your Account</h2>
            <div class="sub">Register a new account</div>
            <?php if ($msg != ""): ?>
                <div class="alert alert-<?php echo strpos($msg, 'successful') !== false ? 'success' : 'danger'; ?>">
                    <?php echo htmlspecialchars($msg); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="register.php">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" value="<?php echo htmlspecialchars($formData['fullname'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($formData['email'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Choose a username" value="<?php echo htmlspecialchars($formData['username'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Create a password" required>
                </div>
                <button type="submit" class="btn-register">Register</button>
            </form>

            <div class="link-text">
                Already have an account? <a href="login-form.php">Login here</a>
            </div>
        </div>
    </div>
</body>
</html>