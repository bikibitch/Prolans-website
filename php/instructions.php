<div class="instructions">
    <div class="container">
        <div class="">
            <h2 class="line-header">
                <span class = "accent-color">|</span> 
                Инструкции и бланки</h2>
            <p class="subtitle regular">
                По орг.вопросам (договор, квитанция, оплата) обращайтесь к руководителю по орг.вопросам ДЮКЦ Климову Игорю Викторовичу: igor@itmo.ru, тел./WhatsApp +7-921-903-70-24 (после 12:00)
            </p>
        </div>
        <div class="accordeon-wrapper">
            <div id="faq" class="faq-info">
                <ul>
                    <li class="accordeon-item">
                        <h3 class="title">
                            Оплата ежемесячно равными долями от общей стоимости курса:
                        </h3>
                        <div class="subtitle">
                            <?php
                            $prices = [6600, 6900, 7200];
                            $lastPrice = key(array_slice($prices, -1, 1, true));

                            foreach ($prices as $key => $price) {
                                echo "
                                <h4>
                                    ".$price." руб. в месяц для курсов
                                    </br></br>
                                </h4>";

                                $sqltext = "SELECT code, name FROM Courses WHERE price = $price";
                                $result = mysqli_query($db, $sqltext);
                                    echo "
                                <ul>";
                                    while ($course = mysqli_fetch_assoc($result)) {
                                        echo "
                                    <li>
                                    [" . $course['code'] . "] " . $course['name'] . "
                                    </li>";
                                    }
                                    echo "
                                </ul>";
                                if ($key !== $lastPrice) {
                                    echo "</br></br>";
                                }
                            }
                            ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="accordeon-wrapper">
            <div id="faq" class="faq-info">
                <ul>
                    <li class="accordeon-item">
                        <h3 class="title">
                            Договор-оферта и бланки на 2023-2024 учебный год
                        </h3>
                        <div class="subtitle">
                            <p>
                                <span class="h4">
                                    ОБУЧЕНИЕ В ОЧНОЙ ФОРМЕ 2023/24 уч.год
                                </span>
                                (по адресу г. СПб, Кронверкский пр., д.49)
                                </br></br>
                            </p>
                            <p>
                                <a href="https://cccp.itmo.ru/info/oferta_ochnaya_forma_2023.doc">
                                    Договор-оферта на обучение в очной форме (doc)
                                </a>
                                </br>
                                <a href="https://cccp.itmo.ru/info/kvit2023.pdf">
                                    Квитанция (pdf), 
                                </a>
                                <a href="https://cccp.itmo.ru/info/kvit2023.doc">
                                    Квитанция (doc)
                                </a>
                                </br></br>
                                Если вам нужен бумажный договор: 
                                </br>
                                <a href="https://cccp.itmo.ru/info/pam2023.doc">
                                    Памятка по заполнению бумажного договора (doc)
                                </a>
                                </br>
                                <a href="https://cccp.itmo.ru/info/dog2023.doc">
                                    Договор для заполнения в электронной форме и печати (doc)
                                </a>
                                </br></br>
                                <div class="line"></div>
                                </br>
                                <span class="h4">
                                    ОБУЧЕНИЕ В ЗАОЧНОЙ ФОРМЕ 2023/24 уч.год
                                </span>
                                </br></br>
                                (с применением электронного обучения и дистанционных образовательных технологий)
                                </br>
                                <a href="https://cccp.itmo.ru/info/oferta_zaochnaya_forma_2023.doc">
                                    Договор-оферта на обучение в очной форме (doc)
                                </a>
                                </br>
                                <a href="https://cccp.itmo.ru/info/kvit2023.pdf">
                                    Квитанция (pdf), 
                                </a>
                                <a href="https://cccp.itmo.ru/info/kvit2023.doc">
                                    Квитанция (doc)
                                </a>
                                </br></br>
                                <span class="bold">
                                    Требования к организации рабочего места
                                </span>
                                для обучения в заочной форме с применением электронного обучения и дистанционных образовательных технологий:
                                </br></br>
                                <ul class="list-style-type-decimal">
                                    <li>
                                        компьютер с ОС Windows 7 и старше или MacOS
                                    </li>
                                    <li>
                                        подключение к Интернет со скоростью не менее 10 Мбит/с
                                    </li>
                                    <li>
                                        наличие следующего оборудования: микрофон, наушники, монитор, мышка, клавиатура, веб-камера
                                    </li>
                                    <li>
                                        наличие установленного программного обеспечения для коммуникации с преподавателем: браузер Google Chrome и система вмдеоконференцсвязи (определяет преподаватель)
                                    </li>
                                    <li>
                                        для курсов [GM] "Введение в разработку 3D-игр" и [GS] "Студия разработки компьютерных игр" - оборудование: 64 битный процессор с минимум 2 ядрами и частотой от 2Ггц, не менее 4 Гб оперативной памяти, дисплей с разрешением не менее 1280х768, видеокарта с не менее 1 Гб видеопамяти и с поддежкой OpenGL 3.3 и DX10, DX11, или DX12, операционная система: Windows 8 / 10, 64-разрядная, установленные программы Blender 2.93 и Unity 2020.3.3f1 и выше
                                    </li>
                                    <li>
                                        для курса [P] "Основы программирования (Pascal)" - PascalABC.NET
                                    </li>
                                    <li>
                                        для курса [M] "Основы трехмерного моделирования" - учебная версия Autodesk 3dsMax 2014 и старше рекомендуется наличие второго монитора или отдельного планшета на Android
                                    </li>
                                </ul>
                            </p>    
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <button id="toggleButton" class="button">
            <span id="arrow" class="arrow down"></span>
            <span id="buttonText">Архив</span>
        </button>
        <div id="toggleContent" class="hidden">
            <div class="accordeon-wrapper">
                <div id="faq" class="faq-info">
                    <ul>
                        <li class="accordeon-item">
                            <h3 class="title">
                                Архив! Договор-оферта и бланки на 2019-2023 учебный год
                            </h3>
                            <div class="subtitle">
                                <p>
                                    <span class="h4">
                                        ОБУЧЕНИЕ В ОЧНОЙ ФОРМЕ 2022/23 уч.год
                                    </span>
                                    (по адресу г. СПб, Кронверкский пр., д.49)
                                    </br></br>
                                </p>
                                <p>
                                    <a href="https://cccp.itmo.ru/info/oferta_ochnaya_forma_2022.doc">
                                        Договор-оферта на обучение в очной форме (doc)
                                    </a>
                                    </br>
                                    <a href="https://cccp.itmo.ru/info/kvit2022.pdf">
                                        Квитанция (pdf), 
                                    </a>
                                    <a href="https://cccp.itmo.ru/info/kvit2022.doc">
                                        Квитанция (doc)
                                    </a>
                                    </br></br>
                                    Если вам нужен бумажный договор: 
                                    </br>
                                    <a href="https://cccp.itmo.ru/info/pam2022.doc">
                                        Памятка по заполнению бумажного договора (doc)
                                    </a>
                                    </br>
                                    <a href="https://cccp.itmo.ru/info/dog2022.doc">
                                        Договор для заполнения в электронной форме и печати (doc)
                                    </a>
                                    </br></br>
                                    <span class="h4">
                                        ОБУЧЕНИЕ В ЗАОЧНОЙ ФОРМЕ 2022/23 уч.год
                                    </span>
                                    </br></br>
                                    (с применением электронного обучения и дистанционных образовательных технологий)
                                    </br>
                                    <a href="https://cccp.itmo.ru/info/oferta_zaochnaya_forma_2022.doc">
                                        Договор-оферта на обучение в очной форме (doc)
                                    </a>
                                    </br>
                                    <a href="https://cccp.itmo.ru/info/kvit2022.pdf">
                                        Квитанция (pdf), 
                                    </a>
                                    <a href="https://cccp.itmo.ru/info/kvit2022.doc">
                                        Квитанция (doc)
                                    </a>
                                    </br></br>
                                    <div class="line"></div>
                                    </br>
                                    <span class="h4">
                                        ОБУЧЕНИЕ В ОЧНОЙ ФОРМЕ 2021/22 уч.год
                                    </span>
                                    (по адресу г. СПб, Кронверкский пр., д.49)
                                    </br></br>
                                    <a href="https://cccp.itmo.ru/info/oferta_ochnaya_forma_2022.doc">
                                        Договор-оферта на обучение в очной форме (doc)
                                    </a>
                                    </br>
                                    <a href="https://cccp.itmo.ru/info/kvit2022.pdf">
                                        Квитанция (pdf), 
                                    </a>
                                    <a href="https://cccp.itmo.ru/info/kvit2022.doc">
                                        Квитанция (doc)
                                    </a>
                                    </br></br>
                                    Если вам нужен бумажный договор: 
                                    </br>
                                    <a href="https://cccp.itmo.ru/info/pam2022.doc">
                                        Памятка по заполнению бумажного договора (doc)
                                    </a>
                                    </br>
                                    <a href="https://cccp.itmo.ru/info/dog2022.doc">
                                        Договор для заполнения в электронной форме и печати (doc)
                                    </a>
                                    </br></br>
                                    <span class="h4">
                                        ОБУЧЕНИЕ В ЗАОЧНОЙ ФОРМЕ 2021/22 уч.год
                                    </span>
                                    </br></br>
                                    (с применением электронного обучения и дистанционных образовательных технологий)
                                    </br>
                                    <a href="https://cccp.itmo.ru/info/oferta_zaochnaya_forma_2022.doc">
                                        Договор-оферта на обучение в очной форме (doc)
                                    </a>
                                    </br>
                                    <a href="https://cccp.itmo.ru/info/kvit2022.pdf">
                                        Квитанция (pdf), 
                                    </a>
                                    <a href="https://cccp.itmo.ru/info/kvit2022.doc">
                                        Квитанция (doc)
                                    </a>
                                    </br></br>
                                    
                                </p>    
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>