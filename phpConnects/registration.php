<?php
$connect = mysqli_connect("localhost","u1662000_default","G8inqQ5dBy5fTr4a","u1662000_default");
//name, email, password, sex
//echo $_POST["login"]."<br>".$_POST["name"]."<br>".$_POST["email"]."<br>".$_POST["password"]."<br>".$_POST["password2"]."<br>".$_POST["volunteerOrInneed"]."<br>";
	
if ($_POST["name"]!= '' and $_POST["password"]!= '' and $_POST["email"]!= '') {
	$users_query = mysqli_query($connect,'SELECT * FROM users WHERE email="'.$_POST["email"].'"');
	if (mysqli_num_rows($users_query)>0) {
		header('Location: ../login/registration.php?error=Почта+занята');
	} else {
		$hashed = password_hash($_POST["password"], PASSWORD_DEFAULT);
		$ins = mysqli_query($connect,'INSERT INTO users (name, email, password, sex) VALUES ("'.$_POST["name"].'","'.$_POST["email"].'","'.$hashed.'","'.$_POST["sex"].'")');
		header('Location: ../login/login.php');
	}
} else {
	header('Location: ../login/registration.php?error=Заполните+все+поля');
}
