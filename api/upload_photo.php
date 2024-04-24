<?php
require('../util/Connection.php');

session_start();

$error_message = ""; // Initialize error message variable

if(isset($_SESSION["studentid"])) {
    $studentid = $_SESSION["studentid"];

    if(isset($_FILES["photo"])) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $error_message = "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["photo"]["size"] > 500000) {
            $error_message = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow only certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $error_message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script>alert('$error_message');</script>";
        // If everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                // Success message
                echo "<script>alert('The file ". basename( $_FILES["photo"]["name"]). " has been uploaded successfully.');</script>";

                // Store image path in database
                $photo_url = "uploads/" . basename($_FILES["photo"]["name"]);
                $query = "UPDATE profile SET photo_url='$photo_url' WHERE studentid='$studentid'";
                mysqli_query($con, $query);
                header("Location:../Profile.php");
            } else {
                // Error message
                echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
            }
        }
    }
}
?>