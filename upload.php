<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploadDirectory = "uploads/";

    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $uploadDirectory . $fileName;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
        echo "<h1>File Uploaded Successfully!</h1>";
        echo "<p>File Name: " . $fileName . "</p>";
        echo "<p>Stored at: " . $targetFilePath . "</p>";
        echo '<a href="index.php">Upload Another File</a>';
    } else {
        echo "<h1>File Upload Failed!</h1>";
        echo '<a href="index.php">Try Again</a>';
    }
} else {
    echo "<h1>Invalid Request</h1>";
}
?>