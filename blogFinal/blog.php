<?php 
    $con = mysqli_connect('localhost:3307', 'root', '', 'blog'); 

	$name = $_POST['Name'];
	$topic = $_POST['Topic'];
	$post = $_POST['Post'];
	
	$sql = "INSERT INTO `blogs` (`Name`, `Topic`, `Post`, `Likes`, `Date`) VALUES ('$name','$topic','$post','0', 'current_timestamp()')";
	$rs = mysqli_query($con, $sql);
	
	if ($rs) {
        header("Location: home.php");

	} else {
		echo "Enter failed please try again";
	}
?>