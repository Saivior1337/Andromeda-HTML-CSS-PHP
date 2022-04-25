<?php 

require('database.php');

if (htmlspecialchars($_GET['verification']) === htmlspecialchars($_SESSION['logged_user']->email_key))
{
    $user = R::load('users', $_SESSION['logged_user']->id);
    if (!$user) { exit('error'); }
    $user->email_confirm = true;
    $user->email_key = NULL;
    R::store($user);
    $_SESSION['logged_user']->email_confirm = 1;
    header('Location: ../user_page.php');
}

?>