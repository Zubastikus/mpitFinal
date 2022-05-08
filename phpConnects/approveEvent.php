<?php
if ($_GET["idEvent"]!='') {
	$connect = mysqli_connect("localhost","u1662000_default","G8inqQ5dBy5fTr4a","u1662000_default");
	$upd = mysqli_query($connect,'UPDATE events SET approved="1" WHERE idEvent="'.$_GET["idEvent"].'"');
}
header('Location: ../events/events.php?id='.$_GET["id"]);