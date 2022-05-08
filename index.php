<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Evented</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/main.css">
	<!-- <link rel="stylesheet" href="css/fonts.css"> -->
</head>
<body onload="loadPage()">
<img src="img/main_gradient1.jpg" style="position: absolute; width: 100%; z-index: -1;" id="back1">
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
			<a href="index.php<?php if(isset($_GET['id'])) echo "?id=".$_GET['id']; ?>">
				<img src="../img/logoWName.png">
			</a>
			<!-- <b class=""><a href="#" style="font-size: 1.8em">Evented</a></b> -->
		</div>
		<?php if(isset($_GET['id'])) { ?>
			<div class="btns" style="">
				<a href="index.php"><button type="button" class="btn btn-default pos-right ml-2" style="">Выйти</button></a>
				<a href=""><button type="button" class="btn btn-lineless pos-right mr-2 px-3" style="padding: calc(0.3em + 0.10vw) calc(0.6em + 0.30vw);"><? echo $user["email"]; ?></button></a>
			</div>
		<?php }  else { ?>
			<div class="btns" style="">
				<a href="login/login.php"><button type="button" class="btn btn-blue-fill pos-right ml-2" style="">Войти</button></a>
				<a href="login/registration.php"><button type="button" class="btn btn-lineless pos-right mr-2 px-3" style="padding: calc(0.3em + 0.10vw) calc(0.6em + 0.30vw);">Создать аккаунт</button></a>
			</div>
		<?php } ?>
		<div class="d-flex mx-auto">
			<!--<p class="" style="margin-left: 0;"><a href="">Новости</a></p>-->
			<p><a style="" href="../events/events.php<?php if(isset($_GET['id'])) echo "?id=".$_GET['id']; ?>">Мероприятия</a></p>
			<!--<p><a style="" href="">Контакты</a></p>-->
		</div>
	</div>
</header>
<main id="main">
<div class="container" style="">
	<div id="first" class="d-flex mobBlock my-4">
		<div class="col-5 d-flex">
			<div class="my-auto px-auto containerInside">
				<h3 class="h"><b>Участвуйте в онлайн мероприятиях, а также создавайте их сами</b></h3>
				<div class="d-flex mt-3">
					<button type="button" class="btn btn-default" style="padding: calc(0.3em + 0.15vw) calc(1.0em + 0.45vw);">Посмотреть мероприятия</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="flex-column" id="make">
	<div id="sideMakeContainer" class="d-flex">
		<div id="sideMake" class="pos-right d-flex">
			<div class="d-flex py-3 flex-column box pointer" id="sideBtn">
				<div class="mx-auto" id="forMargin d-flex">
					<img src="img/black logo.png">
				</div>
				<div class="mx-auto my-auto">
					<h4><b>Создать мероприятие</b></h4>
				</div>
				<div class="mx-auto">
					<img src="img/+.png" class="mt-auto" id="plusImg">
				</div>
	  		</div>
	  		<div class="box ml-3 text-left p-3 w-100" style="display: none;" id="sideInputs">
	  			<form name="eventform" method="POST" action="../phpConnects/makeEvent.php" class="h-100">
	  				<p class="error" style="font-size: calc(0.7em + 0.55vw); color: red"><?php if(isset($_GET['error'])) {echo $_GET['error'];} ?></p>
					<p>О мероприятии</p>
					<textarea name="description"></textarea>
					<p>Название мероприятия<span style="color: red;">*</span></p>
					<input type="text" name="title">
					<div class="d-flex mt-3">
						<div class="col-6 mx-1">
							<p>Дата проведения<span style="color: red;">*</span></p>
							<input type="text" name="date" placeholder="дд.мм.гггг">
						</div>
						<div class="col-6 mx-1">
							<p>Стоимость</p>
							<input type="text" name="cost" placeholder="Введите число, ₽">
						</div>
					</div>
					<p class="mt-3">Формат мероприятия<span style="color: red;">*</span></p>
					<div class="form_toggle">
						<div class="form_toggle-item pr-2">
							<input id="fid-1" type="radio" name="format" value="Мастер-класс" checked>
							<label for="fid-1">Мастер-класс</label>
						</div>
						<div class="form_toggle-item pl-2 pr-2">
							<input id="fid-2" type="radio" name="format" value="Лекция">
							<label for="fid-2">Лекция</label>
						</div>
						<div class="form_toggle-item pl-2 pr-2">
							<input id="fid-3" type="radio" name="format" value="Конференция" checked>
							<label for="fid-3">Конференция</label>
						</div>
						<div class="form_toggle-item pl-2">
							<input id="fid-4" type="radio" name="format" value="Концерт" checked>
							<label for="fid-4">Концерт</label>
						</div>
					</div>
					<input type="hidden" name="idUser" value="<?php if(isset($_GET['id'])) if ($_GET['id']!="") {echo $_GET['id'];} ?>">
					<button class="btn btn-black mt-4" type="submit" <?php if(!isset($_GET['id'])) {echo "disabled";} ?>>Опубликовать</button>
				</form>
			</div>
  		</div>
	</div>
	<!-- <div class="d-flex mt-2 contentSizes scrolling-container">
		<div class="d-flex scrolling-content">
			<p>Lorem ipsum</p>
			<p>Lorem ipsum</p>
			<p>Lorem ipsum</p>
			<p>Lorem ipsum</p>
			<p>Lorem ipsum</p>
			<p>Lorem ipsum</p>
		</div>
	</div> -->
	<div class="py-2 fillSpace d-flex" id="parentForSider">
		<div class="col-5 d-flex">
			<div class="my-auto px-auto containerInside px-5">
				<h3 class="h"><b>Как создать свое мероприятие?</b></h3>
				<p>Нажав на кнопку справа, создайте собственное мероприятие, добавив соответствующее описание, а также дату и теги</p>
			</div>
		</div>
	</div>
</div>
<div class="container" style="">
	<div id="third" class="mobBlock my-4">
		<div class="containerInside">
			<div class="d-flex py-auto my-auto">
				<div class="my-auto d-flex col-7 mob100">
					<h4>Количество проведенных информационно-образовательных мероприятий</h4>
				</div>
				<p class="pos-right">729</p>
			</div>
			<div class="hor-line-special"></div>
			<div class="d-flex">
				<p>80</p>
				<div class="my-auto d-flex col-7 mob100 pos-right">
					<h4>Количество проведенных образовательных мероприятий в очной и дистанционной формах</h4>
				</div>
			</div>
			<div class="hor-line-special"></div>
			<div class="d-flex">
				<div class="my-auto d-flex col-7 mob100">
					<h4>Человек приняло участие в 2021 году на мероприятиях в очной и дистанционной формах</h4>
				</div>
				<p class="pos-right">6358</p>
			</div>
		</div>
	</div>
	<div id="fourth" class="d-flex mobBlock my-4">
		<div class="col-5 d-flex pos-right">
			<div class="my-auto px-auto mr">
				<div class="containerInside">
					<h3 class="h"><b>Новости</b></h3>
					<p>Узнавайте о прошедших мероприятиях за последнеее время</p>
					<p>Наш портал собирает новости о всех проходящих на территории республики мероприятиях. С ними вы можете ознакомиться, нажав на кнопку “Новости” на шапке канала</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="fifth" class="w100">
	<div class="containerInside maxWmob90">
		<h3>“Evented - это сервис, с помощью которого люди смогут сделать организацию и проведение мероприятий комфортнее”.</h3>
		<p>- Давыдов Василий Васильевич<br>менеджер “Microwave”</p>
	</div>
</div>
<div class="container">
	<div id="sixth" class="d-flex my-4">
		<div class="containerInside d-flex">
			<div class="col-3">
				<img src="img/mail.svg" class="w-100">
			</div>
			<div class="col-9 my-auto">
				<div class="ml-4">
					<h3>Подпишитесь на нашу рассылку уведомлений, чтобы знать, когда будут проходить новые мероприятия </h3>
					<div class="d-flex inp mt-3">
						<input type="text" name="bruh" class=""><button class="py-auto">></button>
					</div>
				</div>
			</div>
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








<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script type="text/javascript">
document.getElementById("main").style.paddingTop = (document.getElementById("headerInside").offsetHeight)+"px";
document.getElementById("back1").style.marginTop = (document.getElementById("headerInside").offsetHeight*(-1))+"px";
document.getElementById("sideMake").style.height = window.innerHeight-document.getElementById("header").offsetHeight-25+"px";
document.getElementById("sideMake").style.top = document.getElementById("header").offsetHeight+"px";
// document.getElementById("sideMake").style.paddingTop = document.getElementById("forMargin").style.marginLeft;

var img = new Image();
let widthBg1 = 0; let hightBg1 = 0;  
img.onload = function() {      
	widthBg1 = this.width;
   	hightBg1 = this.height;
   	document.getElementById("first").style.height = (document.getElementById("first").offsetWidth*this.height)/this.width-10+"px";
}     
img.src = 'img/main_bg1.jpg';

var img = new Image();
let widthBg2 = 0; let hightBg2 = 0;  
img.onload = function() {      
	widthBg2 = this.width;
   	hightBg2 = this.height;
   	document.getElementById("make").style.height = (document.getElementById("make").offsetWidth*this.height)/this.width+"px"
}     
img.src = 'img/main_bg2.jpg';

var img = new Image();
let widthBg3 = 0; let hightBg3 = 0;  
img.onload = function() {      
	widthBg3 = this.width;
   	hightBg3 = this.height;
   	document.getElementById("fourth").style.height = (document.getElementById("fourth").offsetWidth*this.height)/this.width+"px"
}     
img.src = 'img/main_bg3.png';

window.onresize = function(){ //изменение размеров окна
	document.getElementById("main").style.paddingTop = (document.getElementById("headerInside").offsetHeight)+"px";
	document.getElementById("back1").style.marginTop = (document.getElementById("headerInside").offsetHeight*(-1))+"px";
	document.getElementById("first").style.height = (document.getElementById("first").offsetWidth*hightBg1)/widthBg1-10+"px"
	document.getElementById("make").style.height = (document.getElementById("make").offsetWidth*hightBg2)/widthBg2+"px"
	document.getElementById("fourth").style.height = (document.getElementById("fourth").offsetWidth*hightBg3)/widthBg3+"px"
	document.getElementById("third").style.height = document.getElementById("fourth").offsetHeight+"px";

	document.getElementById("sideMakeContainer").style.height = document.body.scrollHeight-document.getElementById("first").offsetHeight-document.getElementById("header").offsetHeight-document.getElementById("footer").offsetHeight-110+"px";
	document.getElementById("sideMake").style.height = window.innerHeight-document.getElementById("header").offsetHeight-25+"px";
	document.getElementById("sideMake").style.top = document.getElementById("header").offsetHeight+"px";

}

function loadPage(){
	document.getElementById("third").style.height = document.getElementById("fourth").offsetHeight+"px";

	document.getElementById("sideMakeContainer").style.height = document.body.scrollHeight-document.getElementById("first").offsetHeight-document.getElementById("header").offsetHeight-document.getElementById("footer").offsetHeight-110+"px";
}

let sidePosition = true;
document.getElementById("sideBtn").onclick = function(){
	if (sidePosition) {
		document.getElementById("sideMake").style.width = "51vw";
		document.getElementById("sideInputs").style.display = "block";
		document.getElementById("plusImg").src = "img/x.png"
	} else {
		document.getElementById("sideMake").style.width = "7vw";
		document.getElementById("sideInputs").style.display = "none";
		document.getElementById("plusImg").src = "img/+.png"
	}
	sidePosition = !sidePosition;
}
</script>
</body>
</html>