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
        header("Location: home");
        exit;
    } else {
        header("Location: login?error=invalidauth");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>
