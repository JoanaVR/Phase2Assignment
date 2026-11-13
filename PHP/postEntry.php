<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>post entry and redirect to viewblog</p>
    <?php
        // Get form values safely
        $title = $_POST['title']; 
        $content = $_POST['content'];  

        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "blogdb";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $content);

        // Execute and check
        if ($stmt->execute()) {
            echo "✅ Post saved successfully!";
            header("Location: viewBlog.php"); // Redirect to a page to show posts
            exit();
        } else {
            echo "❌ Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    ?>
</body>
</html>