<?php
    date_default_timezone_set('Europe/Moscow');

    // Change message
    if($admin && !empty($_GET['action']) && 
    ($_GET['action']=='update_message' && !empty($_GET['ID']))) {
        $sqltext='update Messages set 
                name="'.$_POST['name'].'", 
                surname="'.$_POST['surname'].'", 
                number="'.$_POST['number'].'",
                email="'.$_POST['email'].'",
                date="'.$_POST['date'].'" 
                where ID='.$_POST['ID'];
        mysqli_query($db,$sqltext);
        header("Location: index.php?page=contacts");
    }

    // Delete message
    if($admin && !empty($_GET['action']) 
    && ($_GET['action']=='delete_message') && !empty($_GET['ID'])) {
        $sqltext="DELETE FROM Messages WHERE ID=".$_GET['ID'];
        print('<p">Сообщение удалено<br/></p>');
        mysqli_query($db,$sqltext); 
        header("Location: index.php?page=contacts");
    }

    // Send Message

    if(!empty($_GET['action'])&&($_GET['action']=='send_message')) {
        $number = preg_replace('/\D/', '', $_POST['number']);
        $sqltext = 'INSERT INTO Messages 
        (name, surname, number, email, theme, messageText, date) 
            VALUES ("'.
            $_POST['name'] .'","'.
            $_POST['surname'].'","'.
            $number.'","'.
            $_POST['email'].'","'.
            $_POST['theme'].'","'.
            $_POST['messageText'].'","'.
            date("Y-m-d H:i:s").'");';

        mysqli_query($db,$sqltext);  
        header("location: index.php?page=contacts&showModal=true");
    }
?>

<div class="contacts body-wrap">
    <div class="container">
        <div class="welcome-screen">
            <div class="text">
                <h1 class="title">
                    <span class="accent-color">Свяжитесь</span>
                    с нами
                </h1>
                <h4 class="regular welcome-screen-subtitle">
                    Если у вас есть вопросы, предложения или замечания, свяжитесь с нами и мы обязательно вам ответим.
                </h4>
            </div>
            <div class="image">
                <img src="../images/contacts/welcome.png" alt="">
            </div>
        </div>
    </div>

    <div class="form-container container">
    <p class="contacts-form-title">
        Есть вопросы? Напишите нам
    </p>
    <div class = "form-wrap">
        <div class="form-wrap-inner">
            <form  id="send-form" action = "index.php?page=contacts&action=send_message" method="POST">

                <label for="name" class = "h4" >Ваше имя <span class="red">*</span></label>
                <input type="text" name="name" id="name" placeholder="Введите ваше имя">
                <span class="error-message" id="name-error"></span>

                <label for="surname" class = "h4">Ваша фамилия <span class="red">*</span></label>
                <input type="text" name="surname" id="surname" placeholder="Введите вашу фамилию">
                <span class="error-message" id="surname-error"></span>

                <label for="email" class = "h4">Email <span class="red">*</span></label>
                <input type="email" name="email" id="email" placeholder="Введите ваш email">
                <span class="error-message" id="email-error"></span>

                <label for="number" class = "h4">Телефон <span class="red">*</span></label>
                <input type="number" name="number" id="number" placeholder="Введите ваш телефон">
                <span class="error-message" id="number-error"></span>

                <label for="theme" class = "h4">Тема</label>
                <input type="text" name="theme" id="theme" placeholder="Введите тему сообщения">
                <span class="error-message" id="theme-error"></span>

                <label for="messageText" class = "h4">Сообщение <span class="red">*</span></label>
                <textarea name="messageText" id="messageText" placeholder="Введите ваше сообщение..."></textarea>
                <span class="error-message" id="messageText-error"></span>

                <input type="submit" value="Отправить" class= "button">

            </form>
            <p class="form-police">
                Отправляя настоящую форму, Вы даете согласие на обработку персональных данных 
                <a href="./files/ITMOpolice.doc" download>
                    (Форма согласия)
                </a>
            </p>
        </div>
        
        <div class="form-links">
            <div class="link-card">
                <img src="./images/contacts/contacts_icon_geo.png" alt="Address">
                <p>
                    Университет ИТМО, 197101, Россия, Санкт-Петербург,
                </p>
                <h4>
                    Кронверкский п-кт, д. 49
                </h4>
            </div>
            <div class="link-card">
                <img src="./images/contacts/contacts_icon_phone.png" alt="Phone">
                <h4>
                    +7 (911) 764-41-52 
                </h4>
                <p>
                    (с 12 до 18) диспетчер
                </p>
                <h4>
                    +7 (921) 903-70-24 
                </h4>
                <p>
                    (после 12.00) зам.руководителя Prolans Климов Игорь Викторович, ст.преподаватель ФПИиКТ Университета ИТМО.
                </p>
            </div>
            <div class="link-card">
                <img src="./images/contacts/contacts_icon_mail.png" alt="Mail">
                <h4>
                    prolans@mail.ru
                </h4>
                <p>
                    Вопросы по набору в группы и обучению.
                </p>
                <h4>
                    lokalov@itmo.ru  
                </h4>
                <p>
                    Вопросы по методике преподавания. Предложения о сотрудничестве. - к.п.н., доц., руководитель Prolans Локалов Владимир Анатольевич
                </p>
            </div>
            <div class="link-card">
                <div class="link-icons">
                    <img src="./images/contacts/contacts_icon_vk.png" alt="VK">
                    <img src="./images/contacts/contacts_icon_yt.png" alt="Youtube">
                </div>
                
                <p>
                    Мы в социальных сетях
                </p>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3119.6250585383436!2d30.305035369855737!3d59.95621687549506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696314112326f7d%3A0x63ef01af3f1f273b!2z0JrRgNC-0L3QstC10YDQutGB0LrQuNC5INC_0YAuLCA0OSwg0KHQsNC90LrRgi3Qn9C10YLQtdGA0LHRg9GA0LMsIDE5NzE5OA!5e0!3m2!1sru!2sru!4v1716857016445!5m2!1sru!2sru" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
       
</div>

     <!-- Footer credits -->
    <div id="photo-credits" data-url="https://www.freepik.com/free-vector/email-marketing-internet-chatting-24-hours-support_12084798.htm" data-text="Image by vectorjuice on Freepik" style="display: none;"></div>
</div>

<?php
    if($admin) {
    $sql = "select * from Messages";

		if($admin && $r = mysqli_query($db,$sql)) {
				print('
					<div class="applications-container container">
						<h3 class="text">Сообщения:</h3>');
                if($admin && !empty($_GET['action']) && 
                ($_GET['action']=='update_message' && !empty($_GET['ID']))) {
                    print('<br/><br/><p>Сообщение изменено</p><br/>');
                }
                if($admin && !empty($_GET['action']) && 
                ($_GET['action']=='delete_message' && !empty($_GET['ID']))) {
                    print('<br/><br/><p>Сообщение удалено</p><br/>');
                }
				while($k = mysqli_fetch_array($r)) {
					print('
                        <div class = "application-card-wrap">
                            <div class="application-card" style: "display: block;">
                                <p><span>Дата отправки:</span> '.$k['date'].'</p>
                                <p><span>Имя:</span> '.$k['name'].'</p>
                                <p><span>Фамилия :</span> '.$k['surname'].'</p>
                                <p><span>Email:</span> '.$k['email'].'</p>
                                <p><span>Телефон:</span> +7'.$k['number'].'</p>
                                </p>
                                <p><span>Тема сообщения:</span> '.$k['theme'].'</p>
                                <p><span>Сообщение:</span> '.$k['messageText'].'</p>
                            </div>
                            </div>');
                            if(empty($_GET['action']) || (!empty($_GET['action']) && $_GET['action'] != 'update_message_form')) {
                                print('
                                <div class = "admin-post-page-buttons">
                                    <a href="index.php?page=contacts&action=update_message_form&ID='.$k['ID'].'">
                                        Изменить
                                    </a>
                                </div>');
                            }
					if($admin && !empty($_GET['action']) && ($_GET['action']=='update_message_form' && !empty($_GET['ID'])&&($_GET['ID']==$k['ID']))) {
				         print(' 
				         		<div class="update-application-form">
                                    <h3 class="text">Изменение заявки:</h3>
								    <form action="index.php?page=contacts&action=update_message&ID='.$k['ID'].'" method="POST"> 
                                        <div class = "update-application-form-wrap">
                                            <div class = "update-application-container">
                                                <label for="name">Имя:</label>
                                                <input type="text" name="name" value="'.$k['name'].'"/>
                                                <label for="surname">Фамилия:</label>
                                                <input type="text" name="surname" value="'.$k['surname'].'"/>
                                                <label for="number">Телефон:</label>
                                                <input type="number" name="number" value="'.$k['number'].'">
                                                <label for="email">Email:</label>
                                                <input type="text" name="email" value="'.$k['email'].'">
                                                <label for="date">Дата отправки:</label>
                                                <input type="text" name="date" value="'.$k['date'].'"/>
                                                <input type="hidden" name="ID" value="'.$k['ID'].'"/>
                                            </div>
                                        </div>
                                        <input type="submit" value="Изменить"/>
				                	</form>
                                    <form action="index.php?page=contacts&action=delete_message&ID='.$k['ID'].'" method="POST">
                                        <input type="hidden" name="deleteID" value="'.$k['ID'].'">
                                        <input type="submit" value="Удалить" onclick="return confirm(\'ВЫ ДЕЙСТВИТЕЛЬНО ХОТИТЕ БЕЗВОЗВРАТНО УДАЛИТЬ ЭТО СООБЩЕНИЕ?\');" id = "admin-post-delete-button">
                                    </form>
				                </div>');
				    }
				}
				print('
					</div>');
		}
    }
?>

<!-- Modal window -->
<div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>
                Спасибо! Сообщение успешно отправлено
            </h3>
            <div class="line"></div>
            <p>
                Мы свяжемся с вами в ближайшее время
            </p>
        </div>
    </div>
