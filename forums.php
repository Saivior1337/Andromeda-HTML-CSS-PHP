<?php require('php/database.php'); ?>
<?php if (!isset($_SESSION['logged_user']) && !isset($_POST['logout'])) header('Location: access.php'); ?>
<?php if ($_SESSION['logged_user']->email_confirm == false) header('Location: access.php'); ?>

<?php


function countTopics($path)
{
    $dir = opendir ("$path");
    $count = 0; 
    while (false !== ($file = readdir($dir))) {
          if (strpos($file, '.php',1) ) {
          $count++;
      }
    }
    return $count;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forums | Andromeda</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/forum_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon" type="icon" href="media/icons/icon.png">
</head>

<body>
    <section class="page_header">
        <div class="header-navigation">
            <ul class="header-ul">
                <li class="header-li"><A href="index.php">Home <i class="fa-solid fa-house icon"></i></A></li>
                <!-- <?php // if ($_SESSION['logged_user']->email_confirm == true) { ?> <li class="header-li"><A href="#">Create Ticket <i class="fa-solid fa-ticket-simple icon"></i></A></li> <?php // } ?> -->
                <?php if ($_SESSION['logged_user']->email_confirm == true) { ?><li class="header-li"><A href="forums.php">Forums <i class="fa-solid fa-list icon"></i></A></li> <?php } ?>
                <li class="header-li">
                    <?php echo '<form method="POST"><button type="submit" name="logout">Exit <i class="fa-solid fa-arrow-right-from-bracket icon"></i></button></form>' ?>
                </li>
                
            </ul>
            <p class="header-right">
                <?php echo '<A href="user_page.php">'. $_SESSION['logged_user']->username .'</A>'; ?>
            </p>
        </div>
    </section>
    <section class="page_body">
        <div class="sections_container">
            <div class="sections_list">
            <div class="sections_logo">Sections</div>
                <div class="sections_items">
                    <div class="sections_row row1" onclick="redirect('forum/counter-strike-global-offensive/page.php')">
                        <div class="sections_name">Counter Strike: Global Offensive</div>
                        <div class="sections_topic-count"><?php echo countTopics('forum/counter-strike-global-offensive/topics/'); ?></div>
                        <div class="sections_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic dolorum veritatis repudiandae repellendus velit a cupiditate dolore veniam quis, nam consectetur quod suscipit fugiat. Vitae unde alias rem illum dolorem!</div>
                    </div>
                    <div class="sections_row row2">
                        <div class="sections_name">Dota 2</div>
                        <div class="sections_topic-count"><?php echo countTopics('forum/dota2/topics/'); ?></div>
                        <div class="sections_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic dolorum veritatis repudiandae repellendus velit a cupiditate dolore veniam quis, nam consectetur quod suscipit fugiat. Vitae unde alias rem illum dolorem!</div>
                    </div>
                </div>
                <div class="sections_items">
                <div class="sections_row row3">
                    <div class="sections_name">Developer Lab</div>
                    <div class="sections_topic-count"><?php echo countTopics('forum/develop/topics/'); ?></div>
                    <div class="sections_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic dolorum veritatis repudiandae repellendus velit a cupiditate dolore veniam quis, nam consectetur quod suscipit fugiat. Vitae unde alias rem illum dolorem!</div>
                </div>
                <div class="sections_row row4">
                    <div class="sections_name">Free communication</div>
                    <div class="sections_topic-count"><?php echo countTopics('forum/offtop/topics/'); ?></div>
                    <div class="sections_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic dolorum veritatis repudiandae repellendus velit a cupiditate dolore veniam quis, nam consectetur quod suscipit fugiat. Vitae unde alias rem illum dolorem!</div>
                </div>
                </div>

                <div class="sections_items">
                <div class="sections_row row5">
                    <div class="sections_name">General Section</div>
                    <div class="sections_topic-count"><?php echo countTopics('forum/general/topics/'); ?></div>
                    <div class="sections_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic dolorum veritatis repudiandae repellendus velit a cupiditate dolore veniam quis, nam consectetur quod suscipit fugiat. Vitae unde alias rem illum dolorem!</div>
                </div>
                <div class="sections_row row6">
                    <div class="sections_name">SMM</div>
                    <div class="sections_topic-count"><?php echo countTopics('forum/smm/topics/'); ?></div>
                    <div class="sections_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic dolorum veritatis repudiandae repellendus velit a cupiditate dolore veniam quis, nam consectetur quod suscipit fugiat. Vitae unde alias rem illum dolorem!</div>
                </div>
                </div>
        </div>
    </section>
    <section class="page_footer">
        <div class="footer_container">
            <div class="footer_items">
                <div class="footer_column">

                    <div class="footer_column-title">Forum</div>
                    <div class="footer_column-element"><A href="#">News</A></div>
                    <div class="footer_column-element"><A href="#">Report Bug</A></div>
                    <div class="footer_column-element"><A href="#">Advertising</A></div>
                    <div class="footer_column-element"><A href="#">Vacancies</A></div>

                </div>
                <div class="footer_column">

                    <div class="footer_column-title">Social</div>
                    <div class="footer_column-element"><A href="#">Discord</A></div>
                    <div class="footer_column-element"><A href="#">Telegram</A></div>
                    <div class="footer_column-element"><A href="#">Steam</A></div>
                    <div class="footer_column-element"><A href="#">VK group</A></div>

                </div>
                <div class="footer_column">

                    <div class="footer_column-title">Terms</div>
                    <div class="footer_column-element"><A href="#">Forum rules</A></div>
                    <div class="footer_column-element"><A href="#">Privacy Policy</A></div>
                    <div class="footer_column-element"><A href="#">Feedback</A></div>
                    <div class="footer_column-element"><A href="#">Administration</A></div>

                </div>
                <div class="footer_column">

                    <div class="footer_column-title">About us</div>
                    <div class="footer_column-element-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt necessitatibus exercitationem pariatur vel autem quaerat alias in vitae magni, molestiae totam consectetur sed architecto minus corporis ipsa libero nemo magnam.</div>

                </div>
            </div>
        </div>
    </section>
    <script src="js/main.js"></script>
    <script src="https://kit.fontawesome.com/25d6b5720b.js" crossorigin="anonymous"></script>
</body>

</html>