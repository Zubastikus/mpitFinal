<?php
$connect = mysqli_connect("localhost","u1662000_default","G8inqQ5dBy5fTr4a","u1662000_default");
//email, password
if ($_POST["email"]!= '' and $_POST["password"]!= '') {
	$users_query = mysqli_query($connect,'SELECT * FROM users WHERE email="'.$_POST["email"].'"');
	$user = $users_query->fetch_assoc();
	if (password_verify($_POST["password"], $user["password"])) {
		//echo 'Location: ../index.php?id='.$user["idUser"].'&capacity='.$user["capacity"];
		header('Location: ../index.php?id='.$user["idUser"]);
	} else {
		header('Location: ../login/login.php?error=Введённые+данные+неверны');
	};	
} else {
	header('Location: ../login/login.php?error=Заполните+все+поля');
}
