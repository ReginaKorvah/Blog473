<?php 
    $con = mysqli_connect('localhost', 'root', '', 'blog'); 
?>

<html>
	<body>
		<a href = "home.php"> Return to Homescreen </a>
	</body>
</html>

<?php
	$name = $_POST['userName'];
	$topic = $_POST['userTopic'];
	$post = $_POST['userPost'];
	
	$sql = "INSERT INTO `blogs`(`Name`, `Topic`, `Post`, `Likes`) VALUES ('$name','$topic','$post','0')";
	$rs = mysqli_query($con, $sql);
	
	if ($rs) {
		echo "Successfully entered";
	} else {
		echo "Enter failed please try again";
	}
?>