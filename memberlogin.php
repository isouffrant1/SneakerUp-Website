<?php
 setcookie("userid", "", time() - 3600,"/");

  define( 'DB_NAME' , 'isouffrant1');
  define( 'DB_USER' , 'isouffrant1');
  define( 'DB_PASSWORD' , 'isouffrant1');
  define( 'DB_HOST' , 'localhost');

 if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $passwrd = $_POST['passwrd'];
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		
	if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
		
	$sql = "SELECT * FROM shoeuser WHERE username = '$username' AND passwrd = '$passwrd'";
		
	$result = mysqli_query($conn,$sql);
		
	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		$cookie_name = "userid";
		$cookie_value = $row['id'];
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		header("Location: member.php");
	}else{
		echo 'Incorrect username and password';
	}
		
	mysqli_close($conn);
}
 
?>

<html>
	<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SneakerUp</title>
        <link rel="stylesheet" href="home.css" />
        <script src="checklist.js" defer></script>
    </head>
	<div class="form">
		<form method="post">
			Username: <input type="text" name="username"><br>
    		Password: <input type="text" name="passwrd"><br>
    		<input type="submit" name="login" value="login">
		</form>
	<div>
</html>