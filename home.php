<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login");
    exit;
}
$username = htmlspecialchars($_SESSION["username"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home - littercat.shop</title>
    <style>
        body {
            background: #100e0f url('content/background.svg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Outfit', sans-serif;
            color: #ffd5ea;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        .top-bar {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .logout-btn img {
            width: 35px;
            height: 35px;
            cursor: pointer;
        }

        .greeting {
            display: flex;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
            gap: 10px;
            margin-bottom: 20px;
        }

        .greeting img {
            width: 40px;
            height: 40px;
        }

        .nav-box {
            background: #1f181c;
            padding: 20px;
            border-radius: 15px;
            width: 300px;
            text-align: center;
            border: 0px solid #ff6eb6;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .nav-btn {
            background: #42323a;
            color: #ffd5ea;
            border: none;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            display: block;
        }

        .nav-btn:hover {
            background: #5a3f50;
        }
    </style>
</head>
<body>

    <div class="top-bar">
        <a href="logout.php" class="logout-btn">
            <img src="logout.svg" alt="Logout">
        </a>
    </div>

    <div class="greeting">
        <img src="peace-sign.svg" alt="👋">
        <span>, <?php echo $username; ?>!</span>
    </div>

    <div class="nav-box">
        <a href="nyan" class="nav-btn">nyan</a>
        <a href="files" class="nav-btn">files</a>
        <a href="nosleep" class="nav-btn">nosleep</a>
    </div>

</body>
</html>
