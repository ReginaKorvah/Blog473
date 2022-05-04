<?php 
    $con = mysqli_connect('localhost:3307', 'root', '', 'blog'); 

    $topic = $_GET['Topic'];
    echo "$topic";

	$sql = "SELECT * FROM `blogs` WHERE Topic = '$topic'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
    $likes = $row['Likes'];

    $likes += 1;

	$sql = "UPDATE `blogs` SET `Likes`='$likes' WHERE Topic = '$topic'";
	$rs = mysqli_query($con, $sql);
	
	if ($rs) {
        header("Location: ");

	} else {
		echo "Enter failed please try again";
	}
?>