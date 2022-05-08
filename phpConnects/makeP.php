<?php
$connect = mysqli_connect("localhost","u1662000_default","G8inqQ5dBy5fTr4a","u1662000_default");
//name, email, password, telephone
//echo $_POST["login"]."<br>".$_POST["name"]."<br>".$_POST["email"]."<br>".$_POST["password"]."<br>".$_POST["password2"]."<br>".$_POST["volunteerOrInneed"]."<br>";
if ($_POST["name"]!= '' and $_POST["description"]!= '' and $_POST["target"]!= '' and $_POST["end"]!= '' and $_POST["rate"]!= '') {
	$ins = mysqli_query($connect,'INSERT INTO projects (idUser, name, description, neededMoney, dateMade, dateDeadline, img, rewardName, rewardDescription, rewardCost, rewardHowToTake, rate) VALUES ("'.$_POST["idUser"].'","'.$_POST["name"].'","'.$_POST["description"].'","'.$_POST["target"].'","'.date("d.m.Y").'","'.$_POST["end"].'","'.$_POST["img"].'","'.$_POST["rewardName"].'","'.$_POST["rewardDescription"].'","'.$_POST["rewardCost"].'","'.$_POST["rewardWayToGet"].'","'.$_POST["rate"].'")');
	header('Location: ../project/list.php?id='.$_GET['id']);	
} else {
	header('Location: ../project/make.php?error=Заполните+все+поля&id='.$_POST["idUser"]);
}
