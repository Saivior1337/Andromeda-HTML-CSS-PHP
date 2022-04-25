<?php require('../../php/thread_handler.php'); ?>
<?php if (!isset($_SESSION['logged_user']) && !isset($_POST['logout'])) header('Location: ../../access.php'); ?>
<?php if ($_SESSION['logged_user']->email_confirm == false) header('Location: access.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forums CSGO | Andromeda</title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/forum_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon" type="icon" href="../../media/icons/icon.png">
</head>

<body>
    <section class="page_header">
        <div class="header-navigation">
            <ul class="header-ul">
                <li class="header-li"><A href="../../index.php">Home <i class="fa-solid fa-house icon"></i></A></li>
                <?php if ($_SESSION['logged_user']->email_confirm == true) { ?><li class="header-li"><A href="../../forums.php">Forums <i class="fa-solid fa-list icon"></i></A></li> <?php } ?>
                <li class="header-li">
                    <?php echo '<form method="POST"><button type="submit" name="logout">Exit <i class="fa-solid fa-arrow-right-from-bracket icon"></i></button></form>' ?>
                </li>
                
            </ul>
            <p class="header-right">
                <?php echo '<A href="../../user_page.php">'. $_SESSION['logged_user']->username .'</A>'; ?>
            </p>
        </div>
    </section>
    <section class="page_body">
        <div class="forums-panel_container">
            <div class="forums-panel_title">Counter Strike: Global Offensive</div>
            <div class="forums-panel_button"><button onclick="showModal('openModalThread')">Create thread <i class="fa-solid fa-pen forums-panel-button_icon"></i></button></div>
        </div>
        <div class="forums-panel_navigation">
            <a href="../../forums.php">Forums</a> > <a href="page.php">Counter Strike: Global Offensive</a> 
        </div>
        <div class="forums-list_container">
            <div class="forums-list_pinned"><i class="fa-solid fa-circle-exclamation"></i> Pinned threads</div>
            <div class="forums-list_column">
                <span class="forums-row_avatar"><img src="../../media/content/product.png" alt="profile-avatar"></span>
                <span class="forums-row_author">Saivior1337</span>
                <span class="forums-row_title">Lorem ipsum dolor sit amet consectetura </span>
                <span class="forums-row_msg">22 <br> <span class="forums-row_date">22.04.2022</span></span>
            </div>
            <div class="forums-list_column">
                <span class="forums-row_avatar"><img src="../../media/icons/icon.png" alt="profile-avatar"></span>
                <span class="forums-row_author">Saivior1337</span>
                <span class="forums-row_title">Lorem ipsum dolor sit amet consectetura </span>
                <span class="forums-row_msg">22 <br> <span class="forums-row_date">22.04.2022</span></span>
            </div>
            <div class="forums-list_pinned pin-mod"><i class="fa-solid fa-list"></i> Threads</div>
<?php
        $thread_count = R::count('threads');
        for ($i = 0; $i <= $thread_count; $i++)
        {
        $thread = R::getAll( 'SELECT * FROM Threads' );

            if ($thread[$i]['id'] != false)
            {
                $thread_link = 'redirect("topics/'.$thread[$i]['thread_title'].'.php")';
?>
                <div class="forums-list_column" onclick='<?php echo $thread_link; ?>'>
                <span class="forums-row_avatar"><img src="../../media/icons/icon.png" alt="profile-avatar"></span>
                <span class="forums-row_author"><?php echo $thread[$i]['author']; ?></span>
                <span class="forums-row_title"><?php echo $thread[$i]['thread_title'] ?></span>
                <span class="forums-row_msg">22 <br> <span class="forums-row_date"><?php echo $thread[$i]['date'] ?></span></span>
                </div>
<?php
            }
        } 

?>
        </div>
    </section> 
    <div id="openModalThread" class="modal">
        <div class="modal-dialog modal-auth">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Create Thread <i class="fa-solid fa-arrow-right-to-bracket modal-icon"></i>
                    </h3>
                    <span title="Close" class="close" onclick="eraseModal('openModalThread')">×</a>
                </div>
                <div class="modal-body">
                <form method="POST">
                <div class="modal-body-title">Title</div>
                <div class="modal-body-input"><input type="text" name="threadTitle" required></div>
                <br>
                <div class="modal-body-title">Message</div>
                        <div class="modal-body_items">
                            <textarea name="threadMessage" required></textarea>
                        </div>
                        <button class="modal-body-button" type="submit" name="submit_threadMessage">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/main.js"></script>
    <script src="https://kit.fontawesome.com/25d6b5720b.js" crossorigin="anonymous"></script>
</body>

</html>