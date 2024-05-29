<?php
    date_default_timezone_set('Europe/Moscow');
    
    // Inserting a new record into Applications
    if(!empty($_GET['action'])&&($_GET['action']=='add_application')) {
        $sqltext = 'INSERT INTO applications 
        (stName, stSurname, stPatronym, stBirthyear,
         stNumber, prName, prSurname, prPatronym, prNumber, prEmail, date) 
            VALUES ("'.
            $_POST['stName'] .'","'.
            $_POST['stSurname'].'","'.
            $_POST['stPatronym'].'","'.
            intval($_POST['stBirthyear']).'","'. 
            intval($_POST['stNumber']).'","'.
            $_POST['prName'].'","'.
            $_POST['prSurname'].'","'.
            $_POST['prPatronym'].'","'.
            intval($_POST['stNumber']).'","'.
            $_POST['prEmail'].'","'.
            date("Y-m-d H:i:s").'");';

        $result = mysqli_query($db,$sqltext);   

        if ($result) {
            // Inserting a new record into CoursesApplications
            $applicationID = mysqli_insert_id($db);
            foreach ($_POST['chosen_courses'] as $courseCode) {

                $sqltext = "SELECT ID FROM Courses WHERE code = '{$courseCode}'";
                $result = mysqli_query($db, $sqltext);
                $row = mysqli_fetch_assoc($result);
                $courseID = $row['ID'];

                $sql = "INSERT INTO CoursesApplications (applicationID, courseID) VALUES ({$applicationID}, {$courseID})";
                mysqli_query($db, $sql);

                header("location: index.php?page=registration_form&showModal=true");
            }
        }
    }
?>

<div class="body-wrap">
    <div class="registration-heading">
        <h2>Регистрация</h2>
        <h4 class = "regular">Оставьте заявку и мы обязательно с Вами свяжемся!</h4>
    </div>
    <form id="send-form" action="index.php?page=registration_form&action=add_application" class="registration form-container container"  method="POST">
        <div class = "form-wrap">
            <div class="form-container-inner">
                <h3>Учащийся</h3>

                <label for="stName" class = "h4">Ваше имя <span class="red">*</span></label>
                <input  type="text" name="stName" id="stName"  placeholder="Введите ваше имя">
                <span class="error-message" id="stName-error"></span>

                <label for="stSurname" class = "h4">Ваша фамилия <span class="red">*</span></label>
                <input  type="text" name="stSurname" id="stSurname" placeholder="Введите вашу фамилию">
                <span class="error-message" id="stSurname-error"></span>

                <label for="stPatronym" class = "h4">Ваше отчество</label>
                <input  type="text" name="stPatronym"  placeholder="Введите ваше отчество">

                <label for="stBirthyear" class = "h4">Год рождения <span class="red">*</span></label>
                <select name="stBirthyear" class="select-birthyear">
                    <?php
                    $end_year = date("Y") - 8;
                    $start_year = date("Y") - 25;
                    for ($year = $end_year; $year >= $start_year; $year--) {
                        echo '
                        <option value="' . $year . '">' . $year . '
                        </option>';
                    }
                    ?>
                </select>

                <label for="chosen_courses" class = "h4">Выберите курс: <span class="red">*</span></label>
                <select id="chosen_courses" name="chosen_courses[]" multiple >
                    <?php
                    $sqltext = "SELECT ID, code, name FROM Courses";
                    $result = mysqli_query($db, $sqltext);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <option value = "' .$row["code"] . '"> 
                            [' . $row["code"]. '] 
                            ' . $row["name"]. '
                        </option>';
                    }
                    ?>
                </select>
                <span class="error-message" id="chosen_courses-error"></span>

                <label for="stNumber" class = "h4">Телефон <span class="red">*</span></label>
                <input  type="number" name="stNumber" id="stNumber" placeholder="Введите ваш телефон">
                <span class="error-message" id="stNumber-error"></span>

                </div>
                <div class="form-container-inner">
                <h3>Родитель</h3>

                <label for="prName" class = "h4">Ваше имя <span class="red">*</span></label>
                <input  type="text" name="prName" id="prName"placeholder="Введите ваше имя">
                <span class="error-message name-error" id="prName-error"></span>

                <label for="prSurname" class = "h4">Ваша фамилия <span class="red">*</span></label>
                <input  type="text" name="prSurname" id="prSurname" placeholder="Введите вашу фамилию">
                <span class="error-message" id="prSurname-error"></span>

                <label for="prPatronym" class = "h4">Ваше отчество</label>
                <input  type="text" name="prPatronym" placeholder="Введите ваше отчество">

                <label for="prNumber" class = "h4" >Телефон <span class="red">*</span></label>
                <input  type="number" name="prNumber" id="prNumber" placeholder="Введите ваш телефон" >
                <span class="error-message" id="prNumber-error"></span>

                <label for="prEmail" class = "h4">Email <span class="red">*</span></label>
                <input type="email" name="prEmail" id="email" placeholder="Введите ваш email">
                <span class="error-message" id="email-error"></span>

            </div>
        </div>
        <input type="submit" value="Отправить" class= "button">
    </form>

    <!-- Modal window -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>
                Спасибо! Данные успешно отправлены
            </h3>
            <div class="line"></div>
            <p>
                Мы свяжемся с вами в ближайшее время для подтверждения
            </p>
        </div>
    </div>
</div>
       
