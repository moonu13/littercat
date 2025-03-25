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
    <title>files - littercat.shop</title>
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
        }

        .container {
            background: #1f181c;
            padding: 20px;
            border-radius: 15px;
            width: 300px;
            text-align: center;
            border: 3px solid #ff6eb6;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 20px;
        }

        .header img {
            width: 30px;
            height: 30px;
        }

        .upload-section {
            margin-top: 15px;
        }

        .upload-btn {
            background: #42323a;
            color: #ffd5ea;
            border: none;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
        }

        .upload-btn:hover {
            background: #5a3f50;
        }

        .drop-zone {
            margin-top: 15px;
            border: 2px dashed #ff6eb6;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: #ffd5ea;
        }

        .file-list {
            margin-top: 15px;
            max-height: 200px;
            overflow-y: auto;
        }

        .file-item {
            background: #42323a;
            padding: 10px;
            margin: 5px 0;
            border-radius: 10px;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .file-item img {
            width: 30px;
            height: 30px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <img src="peace-sign.svg" alt="👋">
            <span>Hello, <?php echo $username; ?>!</span>
        </div>

        <div class="upload-section">
            <button class="upload-btn" onclick="document.getElementById('fileInput').click()">Upload File</button>
            <input type="file" id="fileInput" style="display: none;">
        </div>

        <div class="drop-zone" id="dropZone">
            Drag & Drop files here
        </div>

        <div class="file-list">
            <?php
            $files = array_diff(scandir("uploads"), array('.', '..'));
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
            ?>
        </div>
    </div>

    <script>
        document.getElementById("dropZone").addEventListener("dragover", function(event) {
            event.preventDefault();
            event.dataTransfer.dropEffect = "copy";
        });

        document.getElementById("dropZone").addEventListener("drop", function(event) {
            event.preventDefault();
            let files = event.dataTransfer.files;
            let formData = new FormData();
            formData.append("file", files[0]);

            fetch("upload.php", {
                method: "POST",
                body: formData
            }).then(response => response.text()).then(data => {
                location.reload();
            });
        });

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
