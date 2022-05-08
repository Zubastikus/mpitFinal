<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Мероприятия</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/events.css">
	<!-- <link rel="stylesheet" href="css/fonts.css"> -->
</head>
<body onload="loadPage()">
<?php
$connect = mysqli_connect("localhost","u1662000_default","G8inqQ5dBy5fTr4a","u1662000_default");
$codepage = mysqli_set_charset($connect, "utf8");
if(isset($_GET['id'])) {
	$user_query = mysqli_query($connect,'SELECT * FROM users WHERE idUser="'.$_GET["id"].'"');
	$user = $user_query->fetch_assoc();
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

if(isset($_GET['id'])) {
	if ($user["admin"]>0) { ?>
		<div class="py-3" id="second">
			<div class="container">
				<div class="container92 py-5">
					<h3><b>Республиканские мероприятия, ожидающие проверки модерацией</b></h3>
					<?php
					$regionNotApproved_query = mysqli_query($connect,'SELECT * FROM events WHERE approved="0" AND type="0"');
					$regionNotApproved_num = mysqli_num_rows($regionNotApproved_query);
					$regionNotApproved = [];
					for ($i=0; $i < $regionNotApproved_num; $i++) { 
						$regionNotApproved[$i] = $regionNotApproved_query->fetch_assoc();
					};
					for ($i=0; $i < $regionNotApproved_num; $i+=3) { ?>
						<div class="d-flex mobBlock">
							<?php
							if ($regionNotApproved_num-$i>2) { $gr=3; } else { $gr=$regionNotApproved_num-$i; }
							for ($j=0; $j < $gr; $j++) { ?>
								<div class="col-4 px-2 my-2">
									<div class="w-100 p-3 event">
										<div class="d-flex">
											<div class="tag">
												<?php echo $regionNotApproved[$i+$j]["format"]; ?>
											</div>
										</div>
										<?php if ($regionNotApproved[$i+$j]["img"]!="") { ?>
											<img src="../img/<?php echo $regionNotApproved[$i+$j]["img"]; ?>" class="mt-2">
										<?php
										} ?>
										<h5 class="mt-2"><?php echo $regionNotApproved[$i+$j]["title"]; ?></h5>
										<p class="text-black-50"><?php echo $regionNotApproved[$i+$j]["description"]; ?></p>
										<div class="d-flex">
											<a href="../phpConnects/approveEvent.php?idEvent=<?php echo $regionNotApproved[$i+$j]["idEvent"]."&id=".$_GET['id']; ?>"><button class="btn btn-black">Опубликовать</button></a>
											<a href="../phpConnects/delEvent.php?idEvent=<?php echo $regionNotApproved[$i+$j]["idEvent"]."&id=".$_GET['id']; ?>" class="pos-right"><button class="btn btn-default">Отклонить</button></a>
										</div>
									</div>
								</div>
							<?php 
							}?>
						</div>
					<?php
					} ?>
					<h3 class="mt-4"><b>Частные мероприятия, ожидающие проверки модерацией</b></h3>
					<?php
					$privateNotApproved_query = mysqli_query($connect,'SELECT * FROM events WHERE approved="0" AND type="1"');
					$privateNotApproved_num = mysqli_num_rows($privateNotApproved_query);
					$privateNotApproved = [];
					for ($i=0; $i < $regionNotApproved_num; $i++) { 
						$privateNotApproved[$i] = $privateNotApproved_query->fetch_assoc();
					};
					for ($i=0; $i < $privateNotApproved_num; $i+=3) { ?>
						<div class="d-flex mobBlock">
							<?php
							if ($privateNotApproved_num-$i>2) { $gr=3; } else { $gr=$privateNotApproved_num-$i; }
							for ($j=0; $j < $gr; $j++) { ?>
								<div class="col-4 px-2 my-2">
									<div class="w-100 p-3 event">
										<div class="d-flex">
											<div class="tag">
												<?php echo $privateNotApproved[$i+$j]["format"]; ?>
											</div>
										</div>
										<?php if ($privateNotApproved[$i+$j]["img"]!="") { ?>
											<img src="../img/<?php echo $privateApproved[$i+$j]["img"]; ?>" class="mt-2">
										<?php
										} ?>
										<h5 class="mt-2"><?php echo $privateNotApproved[$i+$j]["title"]; ?></h5>
										<p class="text-black-50"><?php echo $privateNotApproved[$i+$j]["description"]; ?></p>
										<div class="d-flex">
											<a href="../phpConnects/approveEvent.php?idEvent=<?php echo $privateNotApproved[$i+$j]["idEvent"]."&id=".$_GET['id']; ?>"><button class="btn btn-black">Опубликовать</button></a>
											<a href="../phpConnects/delEvent.php?idEvent=<?php echo $privateNotApproved[$i+$j]["idEvent"]."&id=".$_GET['id']; ?>" class="pos-right"><button class="btn btn-default">Отклонить</button></a>
										</div>
									</div>
								</div>
							<?php 
							}?>
						</div>
					<?php
					} ?>
				</div>
			</div>
		</div>
	<?php 
	} 
}?>

		
<div class="w-100 pt-5 pb-4" style="background-image: url(../img/gradient_bg.jpg); background-position: center center;">
	<div class="container88">
		<div class="">
			<h3><b>Республиканские мероприятия</b></h3>
			<p>Ниже представлены все меропрития,  которые проводятся правительством Республики</p>
			<?php
			$regionApproved_query = mysqli_query($connect,'SELECT * FROM events WHERE approved="1" AND type="0"');
			$regionApproved_num = mysqli_num_rows($regionApproved_query);
			$regionApproved = [];
			for ($i=0; $i < $regionApproved_num; $i++) { 
				$regionApproved[$i] = $regionApproved_query->fetch_assoc();
			};
			for ($i=0; $i < $regionApproved_num; $i+=3) { ?>
				<div class="d-flex mobBlock">
					<?php
					if ($regionApproved_num-$i>2) { $gr=3; } else { $gr=$regionApproved_num-$i; }
					for ($j=0; $j < $gr; $j++) { ?>
						<div class="col-4 px-2 my-2">
							<div class="w-100 p-3 event">
								<div class="d-flex">
									<div class="tag">
										<?php echo $regionApproved[$i+$j]["format"]; ?>
									</div>
								</div>
								<?php if ($regionApproved[$i+$j]["img"]!="") { ?>
									<img src="../img/<?php echo $regionApproved[$i+$j]["img"]; ?>" class="mt-2">
								<?php
								} ?>
								<h5 class="mt-2"><?php echo $regionApproved[$i+$j]["title"]; ?></h5>
								<p class="text-black-50"><?php echo $regionApproved[$i+$j]["description"]; ?></p>
								<div class="d-flex">
									<a href="../events/about.php?idEvent=<?php echo $regionApproved[$i+$j]["idEvent"]; if (isset($_GET['id'])) echo "&id=".$_GET['id']; ?>"><button class="btn btn-black">Узнать больше</button></a>
									<p class="pos-right my-auto"><?php echo $regionApproved[$i+$j]["date"]; ?></p>
								</div>
							</div>
						</div>
					<?php 
					}?>
				</div>
			<?php
			} ?>
		</div>
	</div>
</div>
<div class="py-3" id="second">
	<div class="container">
		<div class="container92 py-5">
			<h3><b>Частные мероприятия</b></h3>
			<p>Ниже представлены все мероприятия,  которые будут проведены на платформе частными лицами</p>
			<?php
			$privateApproved_query = mysqli_query($connect,'SELECT * FROM events WHERE approved="1" AND type="1"');
			$privateApproved_num = mysqli_num_rows($privateApproved_query);
			$privateApproved = [];
			for ($i=0; $i < $privateApproved_num; $i++) { 
				$privateApproved[$i] = $privateApproved_query->fetch_assoc();
			};
			for ($i=0; $i < $privateApproved_num; $i+=3) { ?>
				<div class="d-flex mobBlock">
					<?php
					if ($privateApproved_num-$i>2) { $gr=3; } else { $gr=$privateApproved_num-$i; }
					for ($j=0; $j < $gr; $j++) { ?>
						<div class="col-4 px-2 my-2">
							<div class="w-100 p-3 event">
								<div class="d-flex">
									<div class="tag">
										<?php echo $privateApproved[$i+$j]["format"]; ?>
									</div>
								</div>
								<?php if ($privateApproved[$i+$j]["img"]!="") { ?>
									<img src="../img/<?php echo $privateApproved[$i+$j]["img"]; ?>" class="mt-2">
								<?php
								} ?>
								<h5 class="mt-2"><?php echo $privateApproved[$i+$j]["title"]; ?></h5>
								<p class="text-black-50"><?php echo $privateApproved[$i+$j]["description"]; ?></p>
								<div class="d-flex">
									<a href="../events/about.php?idEvent=<?php echo $privateApproved[$i+$j]["idEvent"]; if (isset($_GET['id'])) echo "&id=".$_GET['id']; ?>"><button class="btn btn-black">Узнать больше</button></a>
									<p class="pos-right my-auto"><?php echo $privateApproved[$i+$j]["date"]; ?></p>
								</div>
							</div>
						</div>
					<?php 
					}?>
				</div>
			<?php
			} ?>
		</div>
	</div>
</div>
</main>
<footer id="footer">
	<div class="d-flex mt-4 w-100">
		<div class="col-4">
			<h6><b>Evented</b></h6>
			<a href=""><p class="mt-4 mb-1">Как создать своё мероприятие?</p></a>
			<a href=""><p class="mb-1">Существующие мероприятия</p></a>
			<a href=""><p class="mb-4">Новости</p></a>
		</div>
		<div class="col-4">
			<h6><b>Ознакомиться</b></h6>
			<a href=""><p class="mt-4 mb-1">Часто задаваемые вопросы</p></a>
			<a href=""><p class="mb-4">О портале</p></a>
		</div>
		<div class="col-4">
			<h6><b>Связаться с нами</b></h6>
			<a href=""><p class="mt-4 mb-1">+7 (914) 828-13-83</p></a>
			<a href=""><p class="mb-4">+7 (924) 563-10-06</p></a>
		</div>
	</div>
</div>
</footer>








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