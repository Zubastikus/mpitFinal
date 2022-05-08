<?php
$connect = mysqli_connect("localhost","u1662000_default","G8inqQ5dBy5fTr4a","u1662000_default");
//name, email, password, telephone
//echo $_POST["login"]."<br>".$_POST["name"]."<br>".$_POST["email"]."<br>".$_POST["password"]."<br>".$_POST["password2"]."<br>".$_POST["volunteerOrInneed"]."<br>";
if ($_POST["title"]!= '' and $_POST["date"]!= '' and $_POST["format"]!= '') {
	$users_query = mysqli_query($connect,'SELECT * FROM users WHERE email="'.$_POST["email"].'"');
	$user = $users_query->fetch_assoc();
	if ($user["admin"]>0) $approved = 1; else $approved = 0;
	$ins = mysqli_query($connect,'INSERT INTO events (idAuthor, title, description, format, date, cost, type, approved) VALUES ("'.$_POST["idUser"].'","'.$_POST["title"].'","'.$_POST["description"].'","'.$_POST["format"].'","'.$_POST["date"].'","'.$_POST["cost"].'","1","'.$_POST["rewardName"].'")');
	header('Location: ../index.php?id='.$_POST["idUser"]);
} else {
	header('Location: ../index.php?error=Заполните+отмеченные+поля*&id='.$_POST["idUser"]);
}
