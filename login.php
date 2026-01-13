<?php
    session_start();
    require_once "db.php";
    
    try {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $stmt = $conn->prepare("SELECT id, username, email, fullname, passwd FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1){
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['passwd']))
            {
                $_SESSION ['is_logged_in'] = true;
                $_SESSION ['user'] = $user;

                error_log("LOGIN_SUCCESS: " . $username);

                $_SESSION['msg'] = "Login successful!";
                header("Location: welcome.php");
                exit();
            }
        }

        error_log("LOGIN_FAILED: " . $username);
        $_SESSION['msg'] = "Invalid username or password";
        $_SESSION['form_data'] = $_POST;
        header("Location: login-form.php");
    
    } catch (Exception $e) {
        error_log("LOGIN_ERROR: " . $e->getMessage());
        $_SESSION['msg'] = "System error! Please try again.";
        $_SESSION['form_data'] = $_POST;
        header("Location: login-form.php");
    }
?>