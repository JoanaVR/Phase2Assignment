<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>

    <?php

        // Get form values safely
        $email = $_POST['email'];
        $password = $_POST['password'];

        // connect to the database
        $servername = "localhost";
        $username = "root"; 
        $dbpassword = "";  
        $dbname = "blogdb";

        $conn = new mysqli($servername, $username, $dbpassword, $dbname);

        //check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND PASSWORD = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        $result = $stmt->get_result();

        // Check if a match was found
        if ($result->num_rows > 0) {
            //start seeion and redirect to addpost
            session_start();
            $_SESSION['email'] = $email;
            header("Location: addEntry.php");
            exit();
        } else {
            // Redirect back with error
            header("Location: blog.php?error=1");
            console.log("Invalid email or password.");
            exit();
        }

        $stmt->close();
        $conn->close();
    ?>
</body>
</html>