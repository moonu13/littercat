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
    <title>files, littercat</title>
    <style>
        body {
            background: #100e0f url('content/background.svg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Outfit', sans-serif;
            color: #ffd5ea;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .user-info img {
            width: 30px;
            height: 30px;
        }

        .logout-btn img {
            width: 40px;
            height: 40px;
            display: block;
        }

        .upload-btn {
            background:rgb(44, 37, 41);
            border-radius: 16px;
            border: none;
            cursor: pointer;
            padding: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 45px;
            height: 45px;
            margin-top: 10px;
        }

        .upload-btn img {
            width: 30px;
            height: 30px;
            display: block;
        }

        .file-list {
            margin-top: 20px;
            flex-grow: 1;
            overflow-y: auto;
        }

        .file-item {
            background:rgb(32, 29, 30);
            padding: 10px;
            margin: 5px 0;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .file-item img {
            width: 30px;
            height: 30px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="user-info">
            <img src="peace-sign.svg" alt="👋">
            <span>, <?php echo $username; ?>!</span>
        </div>
        <a href="logout.php" class="logout-btn">
            <img src="logout.svg" alt="Logout">
        </a>
    </div>

    <button class="upload-btn" onclick="document.getElementById('fileInput').click()">
        <img src="upload.svg" alt="Upload">
    </button>
    <input type="file" id="fileInput" style="display: none;">

    <div class="file-list">
        <?php
        $files = array_diff(scandir("uploads"), array('.', '..'));
        if (empty($files)) {
            echo "<p>No files found. >:c</p>";
        } else {
            foreach ($files as $file) {
                echo '<div class="file-item">';
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                if (in_array($ext, ['png', 'jpg', 'gif', 'jpeg'])) {
                    echo '<img src="uploads/' . $file . '" alt="file">';
                } else {
                    echo '<img src="content/file-icon.svg" alt="file">';
                }
                echo '<span>' . htmlspecialchars($file) . '</span></div>';
            }
        }
        ?>
    </div>

    <script>
        document.getElementById("fileInput").addEventListener("change", function() {
            let formData = new FormData();
            formData.append("file", this.files[0]);

            fetch("upload.php", {
                method: "POST",
                body: formData
            }).then(response => response.text()).then(data => {
                location.reload();
            });
        });
    </script>

</body>
</html>
