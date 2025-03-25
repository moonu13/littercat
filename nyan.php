<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nyan - littercat.shop</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            border: 0;
            outline: 0;
            box-sizing: border-box;
        }

        body {
            background: black;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
        }

        video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <video src="https://ia801209.us.archive.org/29/items/NyanCatoriginal_201509/Nyan%20Cat%20%5Boriginal%5D.mp4" autoplay loop></video>
</body>
</html>
