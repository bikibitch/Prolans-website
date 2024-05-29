<?php

    // Add new post
    if($admin && !empty($_GET['action'])&&($_GET['action'] =='add_post')) {
        $sqltext = 'insert into News (heading, image, about, date) values ("'.
        $_POST['heading'].'", "'.
        $_POST['image'].'","'.
        $_POST['about'].'","'.
        date("Y-m-d").'")';
        mysqli_query($db,$sqltext);
        header("Location: index.php?page=news");
    }

    // Change post
    if($admin && !empty($_GET['action']) && ($_GET['action'] == 'update_post' && !empty($_GET['ID']))) {
        $inputDate = $_POST['date'];
        $date = DateTime::createFromFormat('d.m.Y', $inputDate);
        $formattedDate = $date->format('Y-m-d');

        $sqltext='update News set 
                heading = "'.$_POST['heading'].'", 
                image = "'.$_POST['image'].'", 
                about = "'.$_POST['about'].'", 
                date = "'.$formattedDate.'"
                where ID='.$_POST['ID'];
        mysqli_query($db,$sqltext);
        header("Location: index.php?page=news&ID=".$_GET['ID']."");
    }

    // Delete post
    if($admin&&!empty($_GET['action']) && ($_GET['action']=='delete_post') && !empty($_GET['ID'])) {
        $sqltext="DELETE FROM News WHERE ID=".$_GET['ID'];
        mysqli_query($db,$sqltext);
        header("Location: index.php?page=news");
    }

?>

<div class="body-wrap">
    
<?php
// Show all posts

if(empty($_GET['ID'])) {
    
    print('
    <div class="container">
        <div class="welcome-screen">
            <div class="text">
                <h1 class="title">
                    Будьте в курсе
                    наших
                    <span class="accent-color">новостей!</span>
                </h1>
                <h4 class="regular welcome-screen-subtitle">
                    Здесь мы будем делиться всеми интересными событиями, происходящими в нашей школе Prolans
                </h4>
            </div>
            <div class="image">
                <img src="../images/news/welcome.png" alt="">
            </div>
        </div>
    </div>');

    $sqltext = "select ID, heading, image, about, DATE_FORMAT(date, '%d.%m.%Y') as date from News order by date desc";

    if($r = mysqli_query($db,$sqltext))
    {
        if ($admin) {
            print('
                <div class="news-admin-create-post-container">

                    <form action="index.php?page=news&action=add_post"method="POST">

                        <h3>Добавить новый пост:</h3>			
                        <input type="hidden" name="ID"/>

                        <h4><br/>Заголовок:</h4>
                        <input type="text" name="heading"/>

                        <h4>Изображение:</h4>
                        <input type="text" name="image"/>

                        <h4>Описание поста:</h4>
                        <textarea name="about"></textarea>

                        <input type="submit" value="Добавить">

                    </form>

                </div>');
        }
        print('<div class="news-container">');
        while($i = mysqli_fetch_array($r)) {
            print('
                <a href="index.php?page=news&ID='.$i['ID'].'">
                    <div class="news-post-container">
                        <img src="'.$i['image'].'" alt="Изображение новости">
                        <p class="post-date">'.$i['date'].'</p>
                        <h4 class="post-heading">'.$i['heading'].'</h4>
                    </div>
                </a>
                ');
        }
    }
    
    //Footer credits
    print('
        <div id="photo-credits" data-url="https://www.freepik.com/free-vector/noisy-big-megaphone_9650130.htm" data-text="Image by pch.vector on Freepik" style="display: none;"></div>');

}
else {

    //Show post page
    $sqltext="select ID, heading, image, about, DATE_FORMAT(date, '%d.%m.%Y') as date from News where ID=".$_GET['ID'];
    if($r=mysqli_query($db,$sqltext)) {
        if($i=mysqli_fetch_array($r)) {
            print('
                <div class = "post-page-container">
                    <a href="index.php?page=news">
                        <img src="./images/news/news_post_arrow.svg" id="post-page-arrow">
                        Ко всем новостям
                    </a>
                    <h2>'.$i['heading'].'</h2>
                    <img src = "'.$i['image'].'" id = "post-page-image">
                    <p>'.$i['about'].'</p>
                    <a href="index.php?page=news" class="h4" >
                        <img src="./images/header/headerLogo.png" id="post-page-logo">
                        Prolans
                    </a>
                    <p>'.$i['date'].'</p>
                
            ');
            if ($admin) {
                if(empty($_GET['action']) || (!empty($_GET['action']) && $_GET['action'] != 'update_post_form')) {
                    print('
                    <div class = "admin-post-page-buttons">
                        <a href="index.php?page=news&action=update_post_form&ID='.$i['ID'].'">
                            Изменить
                        </a>
                    </div>');
                }
                if($admin && !empty($_GET['action']) && ($_GET['action']=='update_post_form' && !empty($_GET['ID'])&&($_GET['ID']==$i['ID']))) {
                    print('
                  <div>

                    <form action="index.php?page=news&ID='.$_GET['ID'].'&action=update_post" method="POST">

                        <input type="hidden" name="ID" value="'.$i['ID'].'"/>

                        <label for="heading" class = "h4" >Заголовок</label>
                        <input type="text" name="heading" value="'.$i['heading'].'"/>

                        <label for="image" class = "h4" >Изображение</label>
                        <input type="text" name="image" value="'.$i['image'].'"/>

                        <label for="about" class = "h4" >Описание поста:</label>
                        <textarea name="about">'.$i['about'].'</textarea>

                        <label for="date">Дата публикации:</label>
						<input type="text" name="date" value="'.$i['date'].'"/>

                        <input type="submit" value="Изменить">

                    </form>
                    
                    <form action="index.php?page=news&action=delete_post&ID='.$i['ID'].'" method="POST">
                        <input type="hidden" name="deleteID" value="'.$i['ID'].'">
                        <input type="submit" value="Удалить" onclick="return confirm(\'ВЫ ДЕЙСТВИТЕЛЬНО ХОТИТЕ БЕЗВОЗВРАТНО УДАЛИТЬ ЭТОТ ПОСТ?\');" id = "admin-post-delete-button">
                    </form>
                </div>' );
                }
            }
            print('
            </div>
            <div class = "post-page-other-container">
                <h3>Смотрите также</h3>
            ');
            $sqltext = "select ID, heading, image, about, DATE_FORMAT(date, '%d.%m.%Y') as date from News where ID != ".$_GET['ID']." order by date desc limit 3";
            if($r = mysqli_query($db,$sqltext)) {
                print('<div class="news-container">');
                while($i = mysqli_fetch_array($r)) {
                    print('
                        <a href="index.php?page=news&ID='.$i['ID'].'">
                            <div class="news-post-container">
                                <img src="'.$i['image'].'" alt="Изображение новости">
                                <p class="post-date">'.$i['date'].'</p>
                                <h4 class="post-heading">'.$i['heading'].'</h4>
                            </div>
                        </a>
                    ');
                }
            }
            print('
            </div>
            ');
        }
    }
}


?>

</div>
</div>
