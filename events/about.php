<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Мероприятие</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/events.css">
	<!-- <link rel="stylesheet" href="css/fonts.css"> -->
</head>
<body onload="loadPage()" style="background: linear-gradient(264.42deg, #E3E3E3 0%, #F2F2F2 100%);">
<?php
$connect = mysqli_connect("localhost","u1662000_default","G8inqQ5dBy5fTr4a","u1662000_default");
$codepage = mysqli_set_charset($connect, "utf8");
if(isset($_GET['id'])) {
	$user_query = mysqli_query($connect,'SELECT * FROM users WHERE idUser="'.$_GET["id"].'"');
	$user = $user_query->fetch_assoc();
	$registered_query = mysqli_query($connect,'SELECT * FROM registrated WHERE idUser="'.$_GET["id"].'" AND idEvent="'.$_GET["idEvent"].'"');
	if (mysqli_num_rows($registered_query)>0) {
		$registered = true;
	} else {
		$registered = false;
	}
	
}
?>
<header class="navbar navbar-expand-md fixed-top p-0" id="header">
	<div class="container-fluid text-center text-black-50" id="headerInside">
		<div class="name">
			<a href="../index.php<?php if(isset($_GET['id'])) echo "?id=".$_GET['id']; ?>">
				<img src="../img/logoWName.png">
			</a>
			<!-- <b class=""><a href="#" style="font-size: 1.8em">Evented</a></b> -->
		</div>
		<?php if(isset($_GET['id'])) { ?>
			<div class="btns" style="">
				<a href="events.php"><button type="button" class="btn btn-default pos-right ml-2" style="">Выйти</button></a>
				<a href=""><button type="button" class="btn btn-lineless pos-right mr-2 px-3" style="padding: calc(0.3em + 0.10vw) calc(0.6em + 0.30vw);"><? echo $user["email"]; ?></button></a>
			</div>
		<?php } else { ?>
			<div class="btns" style="">
				<a href="../login/login.php"><button type="button" class="btn btn-blue-fill pos-right ml-2" style="">Войти</button></a>
				<a href="../login/registration.php"><button type="button" class="btn btn-lineless pos-right mr-2 px-3" style="padding: calc(0.3em + 0.10vw) calc(0.6em + 0.30vw);">Создать аккаунт</button></a>
			</div>
		<?php } ?>
		<div class="d-flex mx-auto">
			<!--<p class="" style="margin-left: 0;"><a href="">Новости</a></p>-->
			<p><a style="" href="">Мероприятия</a></p>
			<!--<p><a style="" href="">Контакты</a></p>-->
		</div>
	</div>
</header>
<main id="main">
<?php 
$event_query = mysqli_query($connect,'SELECT * FROM events WHERE idEvent="'.$_GET["idEvent"].'"');
$event = $event_query->fetch_assoc();
?>
<div class=" w-100" id="upbg">
	<div class="container68 maxWmob90 p-3" id="up">
		<div class="d-flex">
			<div class="tag">
				<?php echo $event["format"]; ?>
			</div>
			<p class="pos-right my-auto"><?php echo $event["date"]; ?></p>
		</div>
		<h5 class="mt-2"><?php echo $event["title"]; ?></h5>
		<?php if ($event["cost"]!="" and $event["cost"]!="0") {echo "<p>Цена за вход: ".$event["cost"]." руб</p>";} ?>
		<?php if (isset($_GET['id'])) { ?>
			<form action="../phpConnects/registrationOnEvent.php">
				<input type="submit" class="btn btn-blue-fill" value="<?php if ($registered or isset($_GET['registered'])) {echo "Вы уже записались";} else {echo "Записаться";} ?>" <?php if ($registered or isset($_GET['registered'])) {echo "disabled";} ?>>
				<input type="hidden" name="idEvent" value="<?php echo $_GET['idEvent']; ?>">
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
			</form>
		<?php
		} 
		if(isset($_GET['id'])) {
			if($user["admin"]>0) { ?>
				<form action="../events/usersOnEvent.php" class="mt-2">
					<input type="submit" class="btn btn-blue-fill" value="Список зарегистрированных пользователей">
					<input type="hidden" name="idEvent" value="<?php echo $_GET['idEvent']; ?>">
					<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
				</form>
			<?php }
		}
		?>
	</div>
</div>
<div class=" w-100" id="downbg">
	<div class="container68 maxWmob90 p-3" id="down">
		<h5>О мероприятии</h5>
		<p class="text-black-50"><?php echo $event["description"]; ?></p>
	</div>
</div>
</main>








<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script type="text/javascript">
document.getElementById("main").style.paddingTop = (document.getElementById("headerInside").offsetHeight)+"px";

// var img = new Image();
// let widthBg1 = 0; let hightBg1 = 0;  
// img.onload = function() {      
// 	widthBg1 = this.width;
//    	hightBg1 = this.height;
//    	document.getElementById("first").style.height = (document.getElementById("first").offsetWidth*this.height)/this.width-10+"px";
// }     
// img.src = 'img/main_bg1.jpg';

window.onresize = function(){ //изменение размеров окна
	document.getElementById("main").style.paddingTop = (document.getElementById("headerInside").offsetHeight)+"px";

}

function loadPage(){

}

</script>
</body>
</html>