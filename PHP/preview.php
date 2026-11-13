<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Phase2Assignment/CSS/reset.css">
    <link rel="stylesheet" href="/Phase2Assignment/CSS/stylesheet.css" type = "text/css" title="default">
    <title>Preview</title>
</head>
<body id="previewBody">
    <?php
        // Get form values safely
        $title = $_POST['title']; 
        $content = $_POST['content'];  
    ?>
    <!-- Display the title and content -->
    <article id= "displaycedPost">
        <h2><?php echo htmlspecialchars($_POST['title']); ?></h2>
        <p><?php echo nl2br(htmlspecialchars($_POST['content'])); ?></p>
        <aside><?php echo date("Y-m-d H:i:s"); ?></aside>
    </article>
    <br>

    <div id="previewButtons">
        <!-- Form to confirm and post -->
        <form action="postEntry.php" method="post">
            <input type="hidden" name="title" value="<?php echo htmlspecialchars($title); ?>">
            <input type="hidden" name="content" value="<?php echo htmlspecialchars($content); ?>">
            <input type="submit" value="Post" class="styledButton">
        </form>

        <!-- Form to go back and edit -->
        <form action="addEntry.php" method="post">
            <input type="hidden" name="title" value="<?php echo htmlspecialchars($title); ?>">
            <input type="hidden" name="content" value="<?php echo htmlspecialchars($content); ?>">
            <input type="submit" value="Edit" class="styledButton">
        </form>
    </div>

</body>
</html>