<?php
// Include the file that establishes the database connection
require('Connection.php');

// Initialize the variable to store the IP address
$ip_address = "";

// Check if the client IP address is available
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip_address = $_SERVER['REMOTE_ADDR'];
}

// Start the PHP session
session_start();

// Check if the session variable 'studentid' is set, indicating that the user is logged in
if(isset($_SESSION['studentid'])){
    // Retrieve the 'studentid' from the session
    $studentid = $_SESSION['studentid'];
    
    // Initialize the source variable (it seems unused in the provided code)
    $source = "";
    
    // Construct the SQL query to retrieve user data based on 'studentid'
    $query = "SELECT * FROM login WHERE studentid='$studentid'";
    
    // Execute the query
    $result = mysqli_query($con,$query);
    
    // Count the number of rows returned by the query
    $numrows = mysqli_num_rows($result);
    
    // Construct the URL of the current page
    $url = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
    $url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    
    // If the number of rows is 0, it means the user is not authenticated, so redirect to the login page
    if($numrows == 0){
        header("Location: Login.html");
        exit; // Terminate the script to prevent further execution
    }
} else {
    // If the 'studentid' session variable is not set, redirect to the login page
    header("Location: Login.html");
    exit; // Terminate the script
}
?>
