<?php
session_start();

$users = [
    "kat" => "qwerty123",
    "admin" => "8bfe7bb0",
    "test" => "wefuckit938475"
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("Location: files.php");
        exit;
    } else {
        header("Location: login.php?error=invalid");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>
