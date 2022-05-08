<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
$connect = mysqli_connect("localhost","u1662000_default","G8inqQ5dBy5fTr4a","u1662000_default");
if(isset($_GET['id'])) {
	$user_query = mysqli_query($connect,'SELECT * FROM users WHERE idUser="'.$_GET["id"].'"');
	$user = $users_query->fetch_assoc();
	if ($user["admin"]==0) { 
		echo "вы не имеете прав модерировать мероприятия";
	} else {

		$notApproved_query = mysqli_query($connect,'SELECT * FROM events WHERE approved="0"');
		$notApproved_num = mysqli_num_rows($notApproved_query);
		$notApproved = [];
		for ($i=0; $i < $notApproved_num; $i++) { 
			$notApproved[$i] = $notApproved_query->fetch_assoc();
		};

		$private_query = mysqli_query($connect,'SELECT * FROM events WHERE approved="1" AND type="1"');
		$private_num = mysqli_num_rows($private_query);
		$private = [];
		for ($i=0; $i < $private_num; $i++) { 
			$private[$i] = $private_query->fetch_assoc();
		};

		?>
		<h3>предложенные, ещё не одобренные мероприятия:</h3>
		<?php
		for ($i=0; $i < $notApproved_num; $i++) { ?>
			<div style="margin-top: 20px;">
				<?php echo $notApproved[$i]["title"]."<br>".$notApproved[$i]["description"]."<br>".$notApproved[$i]["format"]."<br>".$notApproved[$i]["date"]; ?>
			</div>
			<a href="../phpConnects/approve.php?id"><button>одобрить</button></a>
		<?php }
		?>
		<h3>частные мероприятия:</h3>

	<?php }
} else {
	echo "Пожалуйста, войдите в аккаунт";
}?>
</body>
</html>
