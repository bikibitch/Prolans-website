<?php

    // Add new post
    if($admin && !empty($_GET['action']) && ($_GET['action'] =='add_post')) {
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
            $target_dir = "./images/news/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $imagePath = $target_file;
            } else {
                $imagePath = "./images/news/default_pic.png";
            }
        } else {
            $imagePath = "./images/news/default_pic.png";
        }

        $heading = mysqli_real_escape_string($db, $_POST['heading']);
        $about = mysqli_real_escape_string($db, $_POST['about']);
        $date = date("Y-m-d");

        $sqltext = "INSERT INTO News (heading, image, about, date) VALUES ('$heading', '$imagePath', '$about', '$date')";

        mysqli_query($db, $sqltext);
        echo '
            <script>
                window.location.replace("index.php?page=news")
            </script>';
    }

    // Change post
    if($admin && !empty($_GET['action']) && ($_GET['action'] == 'update_post' && !empty($_GET['ID']))) {

        $inputDate = $_POST['date'];
        $date = DateTime::createFromFormat('d.m.Y', $inputDate);
        $formattedDate = $date->format('Y-m-d');
        $heading = mysqli_real_escape_string($db, $_POST['heading']);
        $about = mysqli_real_escape_string($db, $_POST['about']);
        $id = (int) $_POST['ID'];

        $imagePath = $_POST['oldimage'];

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
            $target_dir = "./images/news/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $imagePath = $target_file;
            }
        }

        $sqltext = "UPDATE News SET 
                heading = '$heading', 
                image = '$imagePath', 
                about = '$about', 
                date = '$formattedDate'
                WHERE ID = $id";

        mysqli_query($db, $sqltext);
        echo '
            <script>
                window.location.replace("index.php?page=news&ID="' . $_GET['ID'].'")
            </script>';
    }

    // Delete post
    if($admin&&!empty($_GET['action']) && ($_GET['action']=='delete_post') && !empty($_GET['ID'])) {
        $sqltext="SELECT image FROM News WHERE ID=".$_GET['ID'];
        $result = mysqli_query($db, $sqltext);
        $row = mysqli_fetch_assoc($result);
        $imagePath = $row['image'];
        unlink($imagePath); 
        $sqltext="DELETE FROM News WHERE ID=".$_GET['ID'];
        mysqli_query($db,$sqltext);
        echo '
            <script>
                window.location.replace("index.php?page=news")
            </script>';
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
                <img src="./images/news/welcome.png" alt="">
            </div>
        </div>
    </div>');

    $sqltext = "select ID, heading, image, about, DATE_FORMAT(date, '%d.%m.%Y') as date from News order by date desc";

    if($r = mysqli_query($db,$sqltext))
    {
        if ($admin) {
            print('
                <div class="news-admin-create-post-container container">

                    <form action="index.php?page=news&action=add_post" method="POST" enctype="multipart/form-data">

                        <h3>Добавить новый пост:</h3>			
                        <input type="hidden" name="ID"/>

                        <label for="heading" class="h4">Заголовок:</label>
                        <input type="text" name="heading"/>

                        <label for="image" class="h4">Изображение:</label>
                        <input name="image" class="form-control" accept="image/jpeg" type="file">

                        <label for="about" class="h4">Описание поста:</label>
                        <textarea name="about"></textarea>

                        <input type="submit" value="Добавить">

                    </form>

                </div>');
        }
        print('<div class="news-container">');
        while($i = mysqli_fetch_array($r)) {
            print('
                <a href="index.php?page=news&ID=' . $i['ID'] . '">
                    <div class="news-post-container">
                        <img src = "' . $i["image"] . '" alt="Изображение новости">
                        <p class="post-date">' . $i['date'] . '</p>
                        <h4 class="post-heading">' . $i['heading'] . '</h4>
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
                    <div class = "post-img">
                        <img src = "' . $i["image"] . '" id = "post-page-image">
                    </div>
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
                        <a href="index.php?page=news&action=update_post_form&ID='.$i['ID'].'#update_form">
                            Изменить
                        </a>
                    </div>');
                }
                if ($admin && !empty($_GET['action']) && ($_GET['action'] == 'update_post_form' && !empty($_GET['ID']) && ($_GET['ID'] == $i['ID']))) {
                    print('
                        <div>
                            <form action="index.php?page=news&ID=' . $_GET['ID'] . '&action=update_post" method="POST" enctype="multipart/form-data" id ="update_form">
                                <input type="hidden" name="ID" value="' . $i['ID'] . '"/>

                                <label for="heading" class="h4">Заголовок</label>
                                <input type="text" name="heading" value="' . $i['heading'] . '"/>

                                <label for="image" class="h4">Изображение</label>
                                <input type="hidden" name="oldimage" value="' . $i['image'] . '"/>
                                <input name="image" class="form-control" accept="image/jpeg" type="file">

                                <label for="about" class="h4">Описание поста:</label>
                                <textarea name="about">' . $i['about'] . '</textarea>

                                <label for="date">Дата публикации:</label>
                                <input type="text" name="date" value="' . $i['date'] . '"/>

                                <input type="submit" value="Изменить">
                            </form>

                            <form action="index.php?page=news&action=delete_post&ID=' . $i['ID'] . '" method="POST">
                                <input type="hidden" name="deleteID" value="' . $i['ID'] . '">
                                <input type="submit" value="Удалить" onclick="return confirm(\'ВЫ ДЕЙСТВИТЕЛЬНО ХОТИТЕ БЕЗВОЗВРАТНО УДАЛИТЬ ЭТОТ ПОСТ?\');" id="admin-post-delete-button">
                            </form>
                        </div>
                    ');
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
                                <img src = "' . $i["image"] . '" alt="Изображение новости">
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
