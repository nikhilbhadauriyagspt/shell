<?php
session_start();
include 'config.php';

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit();
}

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Database query to fetch user
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_user'] = $username;
            header('Location: dashboard.php');
            exit();
        } else {
            $error = "Invalid password! Please try again.";
        }
    } else {
        $error = "Invalid username! Please check your credentials.";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Shell Automotive</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            background-color: #0f172a;
            background-image: radial-gradient(circle at 20% 20%, rgba(225, 29, 72, 0.12), transparent 40%),
                              radial-gradient(circle at 80% 80%, rgba(59, 130, 246, 0.1), transparent 40%);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #0f172a;
        }

        .login-container {
            background: #ffffff;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.35);
            padding: 40px 36px;
            border-radius: 16px;
            width: 100%;
            max-width: 410px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .brand-logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f1f5f9;
        }

        .brand-logo img.logo-mark {
            width: 64px;
            height: auto;
        }

        .brand-title {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.02em;
        }

        .brand-subtitle {
            font-size: 13px;
            color: #64748b;
        }

        .error-alert {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 11px 14px;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 500;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            text-align: left;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 11px 14px 11px 38px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            color: #0f172a;
            transition: all 0.2s ease;
            background: #f8fafc;
        }

        input:focus {
            outline: none;
            border-color: #0f172a;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(15, 23, 42, 0.08);
        }

        button {
            background: #e11d48;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14.5px;
            font-weight: 600;
            transition: all 0.2s ease;
            margin-top: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        button:hover {
            background: #be123c;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(225, 29, 72, 0.25);
        }

        .back-site {
            display: inline-block;
            margin-top: 20px;
            font-size: 13px;
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            text-align: center;
            width: 100%;
        }

        .back-site:hover {
            color: #0f172a;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="brand-logo">
        <img class="logo-mark" src="../assets/images/logo-web/logo.png" alt="Shell Automotive">
        <div class="brand-title">Admin Portal</div>
        <div class="brand-subtitle">Sign in to manage Shell Automotive</div>
    </div>

    <?php if (!empty($error)) { ?>
        <div class="error-alert">
            <i class="fas fa-circle-exclamation"></i>
            <span><?= htmlspecialchars($error); ?></span>
        </div>
    <?php } ?>

    <form action="index.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <div class="input-wrapper">
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" placeholder="Enter your username" required autofocus>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-wrapper">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
        </div>

        <button type="submit" name="login">
            <span>Sign In</span>
            <i class="fas fa-arrow-right"></i>
        </button>
    </form>

    <a href="../index.php" class="back-site"><i class="fas fa-arrow-left me-1"></i> Back to Website</a>
</div>

</body>
</html>
