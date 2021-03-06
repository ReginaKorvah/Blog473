<?php 
    $con = mysqli_connect('localhost', 'root', '', 'blog');
    $query = mysqli_query($con, "SELECT * FROM `blogs`");  
?>

<html>

<head>
	<link href="blog.css" rel="stylesheet" type="text/css">
	<script src="blog.js" type="text/javascript"></script>
</head>

<body>
	<h1 id="site-title">Movie Blog</h1>
	<div id="display">
		<!--When you clik this buttom then the new blog form is revealed-->
		<div id="open-form">
			<button id="open-form-button" class="button">Post Your Review Here!</button>
		</div>
		<div id="new-blog-form">
			<form id="blog-form" action = "blog.php" method = "POST">

			<label id="name-label" class="input" for="Name">Name<br>
				<input type="text" name="userName" placeholder="Your name" 
				id="name" class="input-val" form="blog-form" value="" required>
			</label><br>

			<label id="topic-laabel" class="input" for="Topic">Topic<br>
				<input type="text" name="userTopic" placeholder="Title of blog post"
				id="topic"class="input-val" form="blog-form" value="" required>
			</label><br>

			<label id="post-label" class="input" for="Post">Post<br>
				<textarea type="text" name="userPost" maxlength="800" 
				placeholder="Start writing your blog post here! 250 word limit"
				id="post" class="input-val" form="blog-form" value="" required></textarea>
			</label><br>

		<!--When you click submit the data is added to the json and the open-form
			button comes back instead of this form-->
			<label id="submit-label" class="input button">
				<input type="submit" name="submit" value="Submit" 
				id="submit" class="button" form="blog-form" >
			</label>
			</form>
		</div>
	</div>
	<h1>Recent Blog Posts</h1>
	<div id="blog">
		<?php
			while ( $row = mysqli_fetch_array($query) ) {
		?>
		<div class = "blog-post">
			<a class = "blog-title"> <?php echo $row['Topic'] ?> </a>
			<div class = "blog-content">
				<div class = "blog-head">
					<img src = "userimage.png" class = "user-icon">
					<h4 class = "user-name"> <?php echo $row['Name'] ?> </h4>
				</div>
				<p class = "blog-text"> <?php echo $row['Post'] ?> </p>
			</div>
		</div>
		<?php } ?>
	</div>
</body>
<html>