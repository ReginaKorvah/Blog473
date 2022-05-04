<?php
$con = mysqli_connect('localhost:3307', 'root', '', 'blog');
$query = mysqli_query($con, "SELECT * FROM `blogs`");
?>

<html>

<head>
    <title id="title">The Movie Club</title>
    <link href="blog.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
    <script src="blog.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js" type="text/javascript"></script>

</head>

<body>
    <a href="">
        <div id="header">
            <img src="movieclub_logo.png" id="site-logo">
            <h1 id="site-title">The <span class="crimson">Movie</span> Club</h1>
        </div>
    </a>
    <div id="display">
        <div id="open-form">
            <button id="open-form-button" class="button">Start Your Own Thread!</button>
        </div>
        <div id="new-blog-form">
            <form id="blog-form" action="blog.php" method="POST">

                <label id="name-label" class="input" for="Name">Name<br>
                    <input type="text" name="Name" placeholder="Your name" id="name" class="input-val" form="blog-form" required>
                </label><br>

                <label id="topic-laabel" class="input" for="Topic">Topic<br>
                    <input type="text" name="Topic" placeholder="Title of blog post" id="topic" class="input-val" form="blog-form" required>
                </label><br>

                <label id="post-label" class="input" for="Post">Post<br>
                    <textarea type="text" name="Post" maxlength="500" placeholder="Start writing your blog post here! 250 word limit" id="post" class="input-val" form="blog-form" required></textarea>
                </label><br>

                <label id="submit-label" class="input button">
                    <input type="submit" name="submit" value="Submit" id="submit" class="button" form="blog-form">
                </label>
        </div>
    </div>
    <h1>Recent Blog Posts</h1>
    <div id="blog">
        <?php
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <div class="blog-post">
                <div class="blog-header">
                    <div class="not-blog-head">
                        <a class="blog-title"> <?php echo $row['Topic'] ?></a>
                    </div>
                    <div class="blog-head" id="blog-head">
                        <img src="userimage.png" class="user-icon">
                        <h4 class="user-name"> <?php echo $row['Name'] ?> </h4>
                    </div>
                </div>
                <div class="blog-content">
                    <p class="blog-text" id="dateTime"><?php echo $row['Date'] ?></p>
                    <p class="blog-text"> <?php echo $row['Post'] ?> </p>
                </div>
            </div>
            </form>
        <?php
        } ?>
    </div>
</body>
<html>