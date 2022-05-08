<?php
$connect = mysqli_connect("localhost","u1662000_default","G8inqQ5dBy5fTr4a","u1662000_default");
$ins = mysqli_query($connect,'INSERT INTO registrated (idEvent, idUser) VALUES ("'.$_GET["idEvent"].'","'.$_GET["id"].'")');
header('Location: ../events/about.php?idEvent='.$_GET['idEvent']."&id=".$_GET['id']."&registered=true");