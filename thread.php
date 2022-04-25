<?php require('../../../php/database.php'); ?>
<?php if (!isset($_SESSION['logged_user']) && !isset($_POST['logout'])) header('Location: ../../../access.php'); ?>
<?php if ($_SESSION['logged_user']->email_confirm == false) header('Location: access.php'); ?>
<?php

$curr_thread_name = basename(__FILE__, ".php");

$thread_count = R::count('threads');
for ($i = 0; $i <= $thread_count; $i++)
{
$thread = R::getAll( 'SELECT * FROM Threads' );

    if ($thread[$i]['thread_title'] == $curr_thread_name)
    {
        $thread_id = $thread[$i]['id'];
        $thread_author = $thread[$i]['author'];
        $thread_date = $thread[$i]['date'];
        $thread_title = $thread[$i]['thread_title'];
        $thread_message = $thread[$i]['thread_message'];
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $thread_title; ?> | Andromeda</title>
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../css/forum_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon" type="icon" href="../../../media/icons/icon.png">
</head>

<body>
    <section class="page_header">
        <div class="header-navigation">
            <ul class="header-ul">
                <li class="header-li"><A href="../../../index.php">Home <i class="fa-solid fa-house icon"></i></A></li>
                <?php if ($_SESSION['logged_user']->email_confirm == true) { ?><li class="header-li"><A href="../../../forums.php">Forums <i class="fa-solid fa-list icon"></i></A></li> <?php } ?>
                <li class="header-li">
                    <?php echo '<form method="POST"><button type="submit" name="logout">Exit <i class="fa-solid fa-arrow-right-from-bracket icon"></i></button></form>' ?>
                </li>
                
            </ul>
            <p class="header-right">
                <?php echo '<A href="../../../user_page.php">'. $_SESSION['logged_user']->username .'</A>'; ?>
            </p>
        </div>
    </section>
    <section class="page_body">
    <div class="forums-panel_navigation">
            <a href="../../../forums.php">Forums</a> > <a href="../page.php">Counter Strike: Global Offensive</a> > <a href="<?php echo $thread_title; ?>.php"><?php echo $thread_title; ?></a>
            <div class="forum-thread_container">
                <div class="forum-thread_title"><i class="fa-solid fa-newspaper"></i> <?php echo $thread_title; ?></div>
                <div class="forum-thread_column">
                    <div class="forum-thread_profile">
                        <img src="../../../media/content/product.png" width="120px" height="120px">
                        <div class="forum-thread_author"><?php echo $thread_author; ?></div>
                    </div>
                    <div class="forum-thread_msgblock">
                        <div class="forum-thread_message"><?php echo $thread_message; ?></div>
                    </div>
                    <div class="forum-thread_date"><?php echo $thread_date; ?></div>
                </div>

<?php 
                    $answers_count = R::count('answers');
                    for ($i = 0; $i <= $answers_count; $i++)
                    {
                    $answer = R::getAll( 'SELECT * FROM Answers' );

                        if ($answer[$i]['msg_thread_title'] == $thread_title)
                        {
?>
                <div class="forum-thread_column">
                    <div class="forum-thread_profile">
                        <img src="../../../media/content/product.png" width="120px" height="120px">
                        <div class="forum-thread_author"><?php echo $answer[$i]['msg_author']; ?></div>
                    </div>
                    <div class="forum-thread_msgblock">
                        <div class="forum-thread_message"><?php echo $answer[$i]['msg_post'];; ?></div>
                    </div>
                    <div class="forum-thread_date"><?php echo $answer[$i]['msg_date'];; ?></div>
                </div>

                <?php } } ?>
                <div class="forum-thread-answer_container">
                    <form method="POST">
                        <input type="text" name="test" value="<?php echo $thread_title; ?>" style="display:none;">
                        <div class="forum-thread-post_textarea"><textarea name="forum_thread_textarea"></textarea></div>
                        <div class="forum-thread-post_button"><button type="submit" name="sumbit_thread_answer">Submit</button></div>
                    </form>
                </div>
            </div>
    </div>
    </section>
    <script src="../../../js/main.js"></script>
    <script src="https://kit.fontawesome.com/25d6b5720b.js" crossorigin="anonymous"></script>
</body>

</html>