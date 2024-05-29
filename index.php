<html lang = "ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Prolans</title>
    <link rel="icon" type="image/x-icon" href="./images/headerLogo.png">
	<link rel="stylesheet" type ="text/css" href ="./css/style.css">
    <script src="./js/script.js"></script>
    <script src="./js/burger-menu.js" type="module" defer></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body> 
    
	<?php
	session_start();
	
		// Admin Log Out
 		if(!empty($_GET['action'])&&($_GET['action']=='logout')&&(!empty($_SESSION['admin']))) {
 			$_SESSION['admin']='no';
 		}

 		//Admin Log In
	 	if(!empty($_POST['username']) && !empty($_POST['userpassword'])) {
	 		if(($_POST['username'] == 'admin') && ($_POST['userpassword'] == '123')) { 
				$_SESSION['admin'] = 'yes'; 
				print('<p></br>Добро пожаловать, '.$_POST['username'].'!</p>');
			}
			else {
				print('<p></br>Неправильно введен логин и/или пароль!</p>
					<div>
						<form action="index.php'.(!empty($_GET['page'])?'?page='.$_GET['page']:'').
                        '&adminAccess=1"method="POST">
							<input type="submit" value="Попробовать еще раз">
						</form>
					</div>');

			}
		}

		if(!empty($_SESSION['admin']) && ($_SESSION['admin']=="yes")) {
			$admin = 1;
		} 
		else {
			$admin = 0;
		}

		if($admin) {
 			print('
            <a href="index.php'.(!empty($_GET['page'])?'?page='.$_GET['page'].'&':'?').'action=logout" id="logout-href">
                </br>Выйти</br>
            </a>');
 		}
 		else if (!empty($_GET['adminAccess'])&&$_GET['adminAccess']){
		 	print('<form action="index.php'.(!empty($_GET['page'])?'?page='.$_GET['page']:'').'"method="POST">
		  	<label for="fname">Логин:</label>
		  	<input type="text" name="username">
		  	<label for="password">Пароль:</label>
		  	<input type="password" name ="userpassword">
		  	<input type="submit" class="button">
		  	</form></div>');
	 	}

        // MySQL connection
        $db = mysqli_connect("127.0.0.1", "root", "1234567890", "db_prolans");

        //  Header
        $sqltext = 'SELECT engTitle, rusTitle FROM Pages 
        WHERE showOrder '.($admin ? '>=' : '>').' 0 ORDER BY showOrder';?>

        <header class = "header">
            <div class = "header-wrapper">
                <div class="header-inner">
                    <a href = "index.php?page=home" class = "logo">
                        <img src = "./images/header/headerLogo.png">
                        <span>Prolans</span>
                    </a>
                    <burger-menu max-width = "740">
                        <nav class = "header-nav">
                            <ul>
        <?php 
            if($result = mysqli_query($db,$sqltext)) {
                while($i = mysqli_fetch_array($result)) {
                print('
                                <li>
                                    <a href = "index.php?page=' .$i['engTitle']. '" >
                                        '.$i['rusTitle'].'
                                    </a>
                                </li> ');
            }
        } ?>
                                <li>
                                    <a href = "index.php?page=registration_form"> 
                                        <button class = "button"><span>Записаться</span></button>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </burger-menu>
                </div>
            </div>
        </header>

    <main>
    <?php
        //  Main Body
        if(!empty($_GET['page'])) {
            $page = $_GET['page'];
        } 
        else {
            $page = 'home';
        }

        $sqltext = 'select * from Pages where engTitle="'.$page.'"';

        if ($r = mysqli_query($db, $sqltext)) {
            if($i = mysqli_fetch_array($r)) {
                include($i['content']);
            }
            else {
                print('Такой страницы нет!');
            }
        } ?>
    </main>

    <footer>
        <div class="container">
            <div class="footer-inner">
                <div class="footer-container">
                    <a href="index.php?page=home" class="logo">
                        <img src="./images/footer/footerLogo.png" alt="Logo">
                        <span>
                            Prolans
                        </span>
                    </a>
                    <nav class = "footer-nav">
                            <ul>
                    <?php 
                        $sqltext = 'SELECT engTitle, rusTitle FROM Pages WHERE showOrder >= -1 and showOrder != 0 ORDER BY showOrder';
                        if($result = mysqli_query($db,$sqltext)) {
                            while($i = mysqli_fetch_array($result)) {
                            print('
                                <li>
                                    <a href = "index.php?page=' .$i['engTitle']. '" class="h4 regular">
                                        '.$i['rusTitle'].'
                                    </a>
                                </li> ');
                        }
                    } ?>
                            </ul>
                    </nav>
                    <div class="icons-container">
                        <img src="./images/footer/footer_icon_VK.png" alt="VK">
                        <img src="./images/footer/footer_icon_YT.png" alt="YouTube">
                    </div>
                </div>
                <div class="footer-wrap">
                    <div class="footer-container">
                        <h4>Документы</h4>
                        <h4 class="regular">
                            <a href="./files/ITMOpolice.doc" download>
                                Обработка</br>персональных данных
                            </a>
                        </h4>
                        <h4 class="regular">
                            <a href="index.php?page=instructions">
                                Шаблон договора
                            </a>
                        </h4>
                        <h4 class="regular">
                            <a href="index.php?page=instructions">
                                Квитанция
                            </a>
                        </h4>
                        <a id="photo-credit-link" href="#" target="_blank" class="photo-credit-link"></a>
                    </div>

                    <div class="footer-container">
                        <a href="mailto:prolans@mail.ru" download class="footer-links">
                            <img src="./images/footer/footer_icon_mail.png" alt="mail">
                            <h4 class="regular">
                                prolans@mail.ru
                            </h4>
                        </a>
                        <a href="tel:+79117644152" download class="footer-links">
                            <img src="./images/footer/footer_icon_phone.png" alt="number">
                            <h4 class="regular">
                                +7(911)764-41-52
                            </h4>
                        </a>
                        <a href="https://maps.app.goo.gl/iEFkzgxPZZq4UbdY9" download class="footer-links">
                            <img src="./images/footer/footer_icon_geo.png" alt="address">
                            <h4 class="regular"> 
                                Кронверкский пр-т, 49
                            </h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>