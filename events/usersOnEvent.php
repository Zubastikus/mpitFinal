<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Люди</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/events.css">
</head>
<body>
<?php
$connect = mysqli_connect("localhost","u1662000_default","G8inqQ5dBy5fTr4a","u1662000_default");
$codepage = mysqli_set_charset($connect, "utf8");
$query = mysqli_query($connect,"SELECT * FROM users INNER JOIN registrated ON users.idUser=registrated.idUser WHERE idEvent='".$_GET['idEvent']."'");
$num = mysqli_num_rows($query);
$users = [];
for ($i=0; $i < $num; $i++) { 
	$users[$i] = $query->fetch_assoc();
	//echo $users[$i]["email"]."<br>";
};

?>
<div class="container68">
	<div class="p-3">
		<?php 
		if ($num==0) {
		    echo "<h4>Никто ещё не зарегистрировался на мероприятие</h4>";
		}
		for ($i=0; $i < $num; $i++) { ?>
			<div class="mx-auto mt-5">
				<h4>Имя: <?php echo $users[$i]["name"]; ?></h4>
				<p>Mail: <?php echo $users[$i]["email"]; ?></p>
				<p>Телефон: <?php echo $users[$i]["number"]; ?></p>
				<p>Компания: <?php echo $users[$i]["organization"]; ?></p>
				<p>Должность: <?php echo $users[$i]["position"]; ?></p>
				<p>Страна: <?php echo $users[$i]["country"]; ?></p>
				<p>Гражданство: <?php echo $users[$i]["citizenship"]; ?></p>
				<p>Дата рождения: <?php echo $users[$i]["birthDate"]; ?></p>
				<p>Документ: <?php echo $users[$i]["passportType"]; ?></p>
				<p>Номер паспорта: <?php echo $users[$i]["passportNumber"]; ?></p>
			</div>
		<?php
		}
		?>
	</div>
</div>
</body>
</html>