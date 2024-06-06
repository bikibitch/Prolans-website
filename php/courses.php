<?php
    $ages = [
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
        13 => '13',
        14 => '14+'
    ];
    $subjects = [
        'graphics' => '2D и 3D графика',
        'internet' => 'Интернет и сети',
        'programming' => 'Программирование',
        'all' => 'Все'
    ];

    // Category courses initialization
    $introductory_courses = [];
    $primary_courses = [];
    $specialized_courses = [];

    // Get current filter values
    $current_age = isset($_GET['age']) ? $_GET['age'] : null;
    $current_subject = isset($_GET['course_subject']) ? $_GET['course_subject'] : null;

    // Course filter
    if ($current_age) {
        $filter = intval($_GET['age']);
        $sql = "SELECT * FROM Courses WHERE age <= $filter";
    } else if ($current_subject && $current_subject != 'all') {
        $filter = $subjects[$_GET['course_subject']];
        $sql = "SELECT * FROM Courses WHERE subject = '$filter'";
    } else {
        $sql = "SELECT * FROM Courses";
    }
    $result = mysqli_query($db, $sql);
    
    // Request's result proccessing
    while ($row = mysqli_fetch_assoc($result)) {
        switch ($row['category']) {
            case 'Вводные': 
                $introductory_courses[] = $row;
                break;
            case 'Основные': 
                $primary_courses[] = $row;
                break;
            case 'Специализированные': 
                $specialized_courses[] = $row;
                break; 
            default:
                break;
        }
    }
?>
<!-- Show Courses Page -->

<?php
    if(empty($_GET['ID'])) {
?>

<!-- Show course filter -->
<div class="body-wrap">
<div class = "banner courses-banner container">
    <div>
            <h1>Выберите <span style = "color: var(--accent-color)">курс</span> </h1>
            <p>Используйте фильтры ниже, чтобы подобрать идеальный курс для вас.</p>
        <div>
            <div class = "courses-filter-container">
                <h4 class = "regular">Выберите возраст:</h4>
                <ul>
                <?php
                foreach ($ages as $age => $label) { 
                    $selected = $age == $current_age ? 'selected' : '';
                    echo '
                        <li>
                            <a href = "index.php?page=courses&age='. $age .'">
                                <button class = "button filter-button ' . $selected . '"onclick = "selectButton(this)"  name = "age" value = "' .$age . '">' . $label . '
                                </button>
                            </a>
                        </li>
                    ';
                }
                ?>
                </ul>
            </div>
            <div class = "courses-filter-container">
                <h4 class = "regular">Выберите направление:</h4>
                <ul>
                <?php
                foreach ($subjects as $subject => $label) { 
                    $selected = $subject == $current_subject ? 'selected' : '';
                    echo '
                        <li>
                            <a href = "index.php?page=courses&course_subject='. $subject .'">
                                <button class = "button filter-button ' . $selected . '" onclick = "selectButton(this)" name="subject" value="' . $subject . '">' . $label . '
                                </button>
                            </a>
                        </li>
                    ';
                }
                ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- <div class="courses-banner-img-wrapper">
        <img src="./images/bannerImage_Courses.svg">
    </div> -->
    
</div>

<!-- Showing courses and categories -->
<div class="courses-container container">
<?php
    if (!empty($introductory_courses)) {
        echo '
        <h3 class = "courses-category">Вводные курсы</h3>
        <div class = "courses-wrap">
        ';
        foreach ($introductory_courses as $course) {
            print('
            <a href="index.php?page=courses&ID='.$course['ID'].'">
                <div class="course-item" style = "background-image: url(\''. $course['blockBG'] .'\')">
                    <div class="course-item-container">
                        <div class = "course-item-p">
                            <p>' . $course['code'] . '</p>
                        </div>
                        <img src="' . $course['blockImage'] . '" alt="Изображение курса">
                    </div>
                    <h4>' . $course['name'] . '</h4>
                </div>
            </a>
            ');
        }
        echo '
        </div>
        ';
    }

    if (!empty($primary_courses)) {
        echo '
        <h3 class = "courses-category">Основные курсы</h3>
        <div class = "courses-wrap">
        ';
        foreach ($primary_courses as $course) {
            print('
            <a href="index.php?page=courses&ID='.$course['ID'].'">
                <div class="course-item" style = "background-image: url(\''. $course['blockBG'] .'\')">
                    <div class="course-item-container">
                        <div class = "course-item-p">
                            <p>' . $course['code'] . '</p>
                        </div>
                        <img src="' . $course['blockImage'] . '" alt="Изображение курса">
                    </div>
                    <h4>' . $course['name'] . '</h4>
                </div>
            </a>');
        }
        echo '
        </div>
        ';
    }

    if (!empty($specialized_courses)) {
        echo '
        <h3 class = "courses-category">Специализированные курсы</h3>
        <div class = "courses-wrap">
        ';
        foreach ($specialized_courses as $course) {
            print('
            <a href="index.php?page=courses&ID='.$course['ID'].'">
                <div class="course-item" style = "background-image: url(\''. $course['blockBG'] .'\')">
                    <div class = "course-item-container">
                    <div class = "course-item-p">
                        <p>' . $course['code'] . '</p>
                    </div>
                        <img src="' . $course['blockImage'] . '" alt="Изображение курса">
                    </div>
                    <h4>' . $course['name'] . '</h4>
                </div>
            </a>');
        }
        echo '
        </div>
        ';
    }

echo '</div>';
    }
else {
    // Show one Course Page

    $sqltext="select * from Courses where ID=".$_GET['ID'];
    if($r=mysqli_query($db,$sqltext)) {
        if($i=mysqli_fetch_array($r)) {
            print('
            <div class="course container">
                <div class="welcome-screen">
                    <div class="text">
                        <h1 class="title">
                            '.$i['name'].'
                        </h1>
                        <p class="regular welcome-screen-subtitle course-aboutShort">
                            '.$i['aboutShort'].'
                        </p>
                        <div class = "course-text-container">
                            <p class="welcome-screen-subtitle">
                                <span class="bold">Возраст:</span>
                                '.$i['age'].'+ лет
                            </p>
                            <p class="welcome-screen-subtitle">
                                <span class="bold">Направление:</span>
                                '.$i['subject'].'
                            </p>
                            <p class="welcome-screen-subtitle">
                                <span class="bold">Длительность:</span>
                                '.$i['duration'].'
                            </p>
                            <p class="welcome-screen-subtitle">
                                <span class="bold">Стоимость:</span>
                                '.$i['price'].' рублей в месяц
                            </p>
                        </div>
                        <a href="index.php?page=registration_form"">
                            <div class="welcome-screen-button h4 regular">
                                Записаться
                            </div>
                        </a>
                    </div>
                    <div class="image">
                        <img src="'.$i['bannerImage'].'" alt="">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="about-course-container">
                    <h2 class="line-header">Описание курса</h2>
                    <div class="about-course-text">
                        '.$i['about'].'
                    </div>
                </div>
            </div>
            
            
            <div class="programs">
                <div class="container">
                    <h2 class="line-header">Что будет изучаться на курсе</h2>
                    <h4 class="subtitle why-we-subtitle regular">
                    Список программ, которыми ученики будут пользоваться на курсе
                    </h4>
                    <div class="cards">');

            $sqlCP="select * from CoursesPrograms where courseID=".$_GET['ID']." order by showOrder";
            if($rCP=mysqli_query($db,$sqlCP)) {
                while($j = mysqli_fetch_array($rCP)) {
                    $sqlP="select * from Programs where ID=".$j['programID'];
                    if($rP=mysqli_query($db,$sqlP)) {
                        if($k=mysqli_fetch_array($rP)) {
                            print('
                            <div class="card">
                                <div class="card-image">
                                    <img src="'.$k['image'].'" alt="">
                                </div>
                                <div class="card-title h4">'.$k['name'].'</div>
                                <div class="card-subtitle">'.$k['about'].'</div>
                            </div>');
                        }
                    }
                }
            }
            print('
                    </div>
                </div>
            </div>


            <div class="questions">
                <div class="container">
                    <div class="card">
                        <div class="text">
                            <h2 class="title">Остались вопросы?</h2>
                            <div class="subtitle h4 regular">Найдите здесь ответы на самые часто задаваемые вопросы</div>
                            <a href = "index.php?page=faq">
                                <button class="button">
                                    <svg class="arrow" width="13" height="12" viewBox="0 0 13 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.999837 6H11.4165M11.4165 6L6.4165 1M11.4165 6L6.4165 11" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Показать все
                                </button>
                            </a>
                        </div>
                        <div class="accordeon-wrapper">
                            <div id="faq">
                                <ul>');
                                $sqlFAQ = "SELECT * FROM FAQ order by showOrder LIMIT 8";
                                $rFAQ = mysqli_query($db, $sqlFAQ);
                                while($j = mysqli_fetch_array($rFAQ)) {
                                    print('
                                    <li class="accordeon-item">
                                        <input type="checkbox" checked>
                                        <i></i>
                                        <h4 class="title">'.$j['heading'].'</h4>
                                        <p class="subtitle">
                                            '.$j['about'].'
                                        </p>
                                    </li>
                                    ');
                                }
                                print('
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class = "courses-container container">
        <h2>Другие курсы</h2>
            ');
        $sqlC = "select * from Courses where subject = '".$i['subject']."' and ID != ".$_GET['ID']." limit 3";
        if($rC = mysqli_query($db,$sqlC)) {
            print('
            <div class="courses-wrap">');

            while($k = mysqli_fetch_array($rC)) {
                print('
                <a href="index.php?page=courses&ID='.$k['ID'].'">
                    <div class="course-item" style = "background-image: url(\''. $k['blockBG'] .'\')">
                        <div class = "course-item-container">
                        <div class = "course-item-p">
                            <p>' . $k['code'] . '</p>
                        </div>
                            <img src="' . $k['blockImage'] . '" alt="Изображение курса">
                        </div>
                        <h4>' . $k['name'] . '</h4>
                    </div>
                </a>');
            }
        }
    print('
            </div>
    </div>
            ');


        }
    }

    // Footer credits
    switch ($_GET['ID']) {
        case 1:
            print('
            <div id="photo-credits" data-url="https://www.freepik.com/free-vector/tiny-graphic-designer-drawing-with-big-pen-computer-screen-creators-work-creative-woman-working-laptop-flat-vector-illustration-digital-design-concept-banner-landing-web-page_28480869.htm#&position=7&from_view=user&uuid=ee5128d0-8ba6-4cff-8365-2e31a02ea841" data-text="Image by pch.vector on Freepik" style="display: none;"></div>');
            break;
        case 2:
            print('
            <div id="photo-credits" data-url="https://www.freepik.com/free-vector/flat-internet-day-illustration_13184265.htm" data-text="Image by Freepik" style="display: none;"></div>');
            break;
        case 3:
            print('
            <div id="photo-credits" data-url="https://www.freepik.com/free-vector/printed-circuit-board-concept-illustration_12704360.htm#fromView=search&page=1&position=0&uuid=ff3218ba-aaf6-4241-8db9-cc518142ee87" data-text="Image by storyset on Freepik" style="display: none;"></div>');
            break;           
    }
}
?>
