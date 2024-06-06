 <div class = "faq">
    <div class="container">
        <div class="welcome-screen">
            <div class="text">
                <h1 class="title">
                    Правила организации</br>
                    <span class="accent-color">занятий</span>
                    в нашей школе 
                </h1>
                <h4 class="regular welcome-screen-subtitle">
                    Тут собрана вся информация, необходимая Вам перед началом обучения
                </h4>
                <a href="index.php?page=registration_form"">
                    <div class="welcome-screen-button h4 regular">
                        Записаться
                    </div>
                </a>
            </div>
            <div class="image">
                <img src="./images/faq/welcome.png" alt="">
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="line-header">
            <span class = "accent-color">|</span> 
            Часто задаваемые вопросы
        </h2>
        <h4 class="subtitle regular">
            Здесь собраны ответы на самые часто задаваемые вопросы касательно организации занятий
        </h4>
        <div class="accordeon-wrapper">
            <div id="faq" class="faq-info">
                <ul>
                    <?php
                        $sqlFAQ = "SELECT * FROM FAQ order by showOrder";
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
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer credits -->
    <div id="photo-credits" data-url="https://www.freepik.com/free-vector/online-survey-analysis-electronic-data-collection-digital-research-tool-computerized-study-analyst-considering-feedback-results-analyzing-info_11669168.htm" data-text="Image by vectorjuice on Freepik" style="display: none;"></div>

</div>