<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: home");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login - littercat.shop</title>
    <link rel="stylesheet" href="style.css">
    <style>
body {
    background: #100e0f;
    font-family: 'Outfit', sans-serif;
    color: #ffd5ea;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    position: relative;
}

body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('content/background.svg') no-repeat center center fixed;
    background-size: cover;
    opacity: 0.2; /* only affects the svg */
    z-index: -1;
}

        .login-container {
            background: #1f181c;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            width: 300px;
        }
        .login-container h2 {
            margin-bottom: 30px;
            font-weight: 400;
        }
        .input-box {
            width: calc(100% - 20px);
            padding: 10px;
            background: transparent;
            border: 2px solid #ff6eb6;
            color: #ffd5ea;
            outline: none;
            border-radius: 10px;
            margin-bottom: 10px;
            text-align: left;
            font-size: 16px;
            font-family: 'Outfit', sans-serif;
        }
        .input-box::placeholder {
            color: rgba(255, 231, 243, 0.5);
        }
        .login-btn {
            background: #42323a;
            color: #ffd5ea;
            border: none;
            padding: 8px;
            width: 60%;
            border-radius: 10px;
            cursor: grab;
            transition: 0.3s;
            font-size: 14px;
            font-family: 'Outfit', sans-serif;
        }
        .login-btn:hover {
            background:rgb(63, 56, 60);
        }
        .footer {
            margin-top: 10px;
            font-size: 12px;
            color: #ffd5ea;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>littercat.shop</h2>
        <form action="auth.php" method="post">
            <input type="text" name="username" class="input-box" placeholder="user">
            <input type="password" name="password" class="input-box" placeholder="token">
            <button type="submit" class="login-btn">Authenticate</button>
        </form>
        <div class="footer">littercat.shop © 2025 rights reversed</div>
    </div>

</body>
</html>
