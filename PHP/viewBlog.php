<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Phase2Assignment/CSS/reset.css">
    <link rel="stylesheet" href="/Phase2Assignment/CSS/stylesheet.css" type = "text/css" title="default">

    <title>Document</title>
</head>
<body  id="displaycedPost">
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

    <!-- get the month -->
    <?php
    $selectedMonth = isset($_GET['month']) ? $_GET['month'] : '';
    ?>
    <section>
        <form method="get">
            <label for="month">Filter by Month:</label>
            <select name="month" id="month" onchange="this.form.submit()">
                <option value="" <?php if ($selectedMonth === '') echo 'selected'; ?>>All Months</option>
                <option value="1" <?php if ($selectedMonth === '1') echo 'selected'; ?>>January</option>
                <option value="2" <?php if ($selectedMonth === '2') echo 'selected'; ?>>February</option>
                <option value="3" <?php if ($selectedMonth === '3') echo 'selected'; ?>>March</option>
                <option value="4" <?php if ($selectedMonth === '4') echo 'selected'; ?>>April</option>
                <option value="5" <?php if ($selectedMonth === '5') echo 'selected'; ?>>May</option>
                <option value="6" <?php if ($selectedMonth === '6') echo 'selected'; ?>>June</option>
                <option value="7" <?php if ($selectedMonth === '7') echo 'selected'; ?>>July</option>
                <option value="8" <?php if ($selectedMonth === '8') echo 'selected'; ?>>August</option>
                <option value="9" <?php if ($selectedMonth === '9') echo 'selected'; ?>>September</option>
                <option value="10" <?php if ($selectedMonth === '10') echo 'selected'; ?>>October</option>
                <option value="11" <?php if ($selectedMonth === '11') echo 'selected'; ?>>November</option>
                <option value="12" <?php if ($selectedMonth === '12') echo 'selected'; ?>>December</option>
            </select>
        </form>
    </section>

    <?php
        // connect to the database
        $mysqli = new mysqli("localhost", "root", "", "blogdb");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $selectedMonth = isset($_GET['month']) ? $_GET['month'] : '';

        $posts = [];

        if ($selectedMonth !== '') {
            // SQL to filter by month
            $stmt = $mysqli->prepare("SELECT title, content, created_at FROM posts WHERE MONTH(created_at) = ?");
            $stmt->bind_param("i", $selectedMonth);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            // No month selected then get all the posts
            $result = $mysqli->query("SELECT title, content, created_at FROM posts");
        }

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $posts[] = $row;
            }
        }

        // Sort posts using PHP by created_at DESC (newest first)
        usort($posts, function ($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });
    ?>
    <div id="postsContainer">
        <h1>All Posts</h1>

        <?php foreach ($posts as $post): ?>
            <article>
                <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                <aside><?php echo htmlspecialchars($post['created_at']); ?></aside>
            </article>
            <br>
        <?php endforeach; ?>
    </div>
    <footer>
        <p>
            <small><i>Copyright © Joana Rangelova</i></small>
        </p>
    </footer>

</body>
</html>

 