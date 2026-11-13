<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="/Phase2Assignment/CSS/reset.css">
    <link rel="stylesheet" href="/Phase2Assignment/CSS/stylesheet.css" type = "text/css" title="default">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- remeber to be logged in and redirect if logged in already -->
    <?php
        session_start();
        if (isset($_SESSION['email'])) {
            // User is already logged in
            header("Location: addEntry.php");
            exit();
        }
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
    <section id="blog">
        <form action="login.php" method="post">
            <fieldset>
                <label for="email">Email Address</label>
                <br>
                <input type="email" name="email" id="email" required>
            </fieldset>
            <br>
            <fieldset>
                <label for="password">Password</label>
                <br>
                <input type="password" name ="password" id="password" required>
            </fieldset>
            <br>
            <div class="button-container">
                <input type="submit" name="press to login" value="Login">
            </div>
        </form>
    </section>
    <br>
    <footer>
        <p>
            <small><i>Copyright © Joana Rangelova</i></small>
        </p>
    </footer>
</body>
</html>