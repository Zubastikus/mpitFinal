<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Вход</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/login.css">
	<link rel="stylesheet" href="../css/style.css">

</head>
<body>

<main id="main">
<div class="bg d-flex">
	<div class="col-6 leftBig">
		
	</div>
	<div class="col-6 rightBig">
		
	</div>
</div>
<div class="bgBlured d-flex">
	<div class="col-6">
		
	</div>
</div>
<div class="window ">
	<div class="wrapper" style="">
		<div class="sheet d-flex">
			<div class="form-area col-6 left px-5">
				<img src="../img/logoWName.png">
				<h3 class="mt-5" style="font-size: calc(1.0em + 0.65vw);"><b>Вход</b></h3>
				<form name="logform" method="POST" action="../phpConnects/login.php" class="mt-2">
					<div class="inputs" style="">
		 				<div class="d-flex text_error">
							<p style="font-size: calc(0.6em + 0.55vw);">Введите ваши данные, чтобы войти</p>
							<div class="error" style="display: none;">
								<!-- <img src="../img/error.png"> -->
								<p>Заполните поле</p>
							</div>
						</div>
						<p class="error" style="font-size: calc(0.7em + 0.55vw); color: red"><?php if(isset($_GET['error'])) {echo $_GET['error'];} ?></p>
						<input type="email" name="email" placeholder="Электронная почта" class="inputs mt-5" />
						<input type="password" name="password" placeholder="Пароль" class="inputs" />
					</div>
					<input type="submit" class="buttons pointer mt-4" value="Войти" style="" />
					<p class="mb-0 mt-3">Нет учетной записи? <a href="registration.php">Создать аккаунт</a></p><!-- вставить ссылку -->				
				</form>
			</div>
			<div class="col-6 right">
				
			</div>
		</div>
	</div>
</div>

</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script type="text/javascript">
let frame = document.querySelector(".wrapper");
var img = new Image();
let widthBg1 = 0; let hightBg1 = 0;  
img.onload = function() {      
	widthBg1 = this.width;
   	hightBg1 = this.height;
   	document.querySelector(".right").style.height = (document.querySelector(".right").offsetWidth*this.height)/this.width-10+"px"
   	main.style.paddingTop = (document.documentElement.clientHeight-frame.offsetHeight)/2+'px'
}     
img.src = '../img/iphone_mockup_evented.png';

// var img = new Image();
// let widthBg2 = 0; let hightBg2 = 0;  
// img.onload = function() {      
// 	widthBg2 = this.width;
//    	hightBg2 = this.height;
//    	document.querySelector(".right").style.height = (document.querySelector(".right").offsetWidth*this.height)/this.width-10+"px"
//    	main.style.paddingTop = (document.documentElement.clientHeight-frame.offsetHeight)/2+'px'
// }     
// img.src = '../img/iphone_mockup_evented.png';

window.onresize = function(){ //изменение размеров окна
	document.querySelector(".right").style.height = (document.querySelector(".right").offsetWidth*hightBg1)/widthBg1-10+"px";
	main.style.paddingTop = (document.documentElement.clientHeight-frame.offsetHeight)/2+'px';
}
</script>
</body>
</html>