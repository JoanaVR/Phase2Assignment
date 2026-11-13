<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="/Phase2Assignment/CSS/reset.css">
    <link rel="stylesheet" href="/Phase2Assignment/CSS/stylesheet.css" type = "text/css" title="default">
    <script src="/Phase2Assignment/handlepost.js" defer></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- make sure the user is logged in to access this page -->
    <?php
        session_start();
        if (!isset($_SESSION['email'])) {
            // User is not logged in
            header("Location: blog.php"); // redirect to login
            exit();
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
    }
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
?>

    <header>
        <h1><ins>Joana Rangelova</ins></h1>
        <nav>
            <ul>
                <li><a href="/Phase2Assignment/my_homepage.html">Abount Me</a></li>
                <li><a href="/Phase2Assignment/myEducation.html">Education</a></li>
                <li><a href="/Phase2Assignment/workAndSkills.html">Experience/Skills</a></li>
                <li><a href="/Phase2Assignment/contact.html">Contact Me</a></li>
                <li><a href="viewBlog.php">My Blog</a></li>
                <li><a href="blog.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <section id="blogEntry">
        <form action="postEntry.php" method="post" id = "form">
            <fieldset>
                <label for="title">Title</label>
                <br>
                <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>">
            </fieldset>
            <br>
            <fieldset >
                <label for="content">Content to post</label>
                <br>
                <textarea name="content" id="content"><?php echo htmlspecialchars($content); ?></textarea>
            </fieldset>
            <br>
            <div class="button-container">
                <input type="submit" name="press to post blog" value="Post">
                <input type="reset" name="clear" value="Clear">
                <input type="submit" name="preview" value="Preview" formaction="preview.php">
            </div>
        </form>
        
    </section>
    <br>
    <aside id="logoutButtonLink">
        <a id="logoutbutton" href="logout.php" >Logout</a>
    </aside>
    <br>
    <br>
    <footer>
        <p>
            <small><i>Copyright © Joana Rangelova</i></small>
        </p>
    </footer>
</body>
</html>