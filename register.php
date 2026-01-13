<?php
    session_start();
    require_once "db.php";

    try {

        $fullname = trim($_POST['fullname']);
        $email = trim($_POST['email']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $checkEmail = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $checkEmail->store_result();

        if ($checkEmail->num_rows > 0) {
            $_SESSION['msg'] = "Email already exists.";
            $_SESSION['form_data'] = $_POST;
            header("Location: registration-form.php");
            exit();
        }

        $checkUsername = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $checkUsername->bind_param("s", $username);
        $checkUsername->execute();
        $checkUsername->store_result();

        if($checkUsername->num_rows > 0){
            $_SESSION['msg'] = "Username already exists.";
            $_SESSION['form_data'] = $_POST;
            header("Location: registration-form.php");
            exit();
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (fullname, email, username, passwd) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fullname, $email, $username, $hashedPassword);

        if ($stmt->execute()) {
            error_log("REGISTRATION_SUCCESS: $username");
            $_SESSION['msg'] = "Registration successful. Please login.";
            header ("Location: login-form.php");
            exit();
        } else {
            throw new Exception("Insert to database failed!");
        }
    }
    catch (Exception $e){
        error_log("REGISTRATION_ERROR: " . $e-> getMessage());
        $_SESSION['msg'] = "Registration failed! Please try again.";
        $_SESSION['form_data'] = $_POST;
        header("Location: registration-form.php");
    }
?>