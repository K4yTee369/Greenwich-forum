<?php
	session_start();
	require_once 'conn.php';
 
	if(ISSET($_POST['register'])){
		if($_POST['username'] != "" || $_POST['password'] != "" || $_POST['email'] != "" || $_POST['user_type'] != ""){
			try{
				$username = $_POST['username'];
				$password = ($_POST['password']);
				$email = $_POST['email'];
				$user_type = $_POST['user_type'];
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `user` VALUES ('', '$username', '$email', '$password', '$user_type')";
				$conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"User successfully created.","alert"=>"info");
			$conn = null;
			header('location:index.php');
		}else{
			echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'templates/register.html.php'</script>
			";
		}
	}
?>