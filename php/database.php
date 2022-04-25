<?php 

require('rb.php');
require('getip.php');


if (!R::setup( 'mysql:host=localhost;dbname=andromeda','root', ''))
{
    echo '<div class="php_error">Failed to connect to database!</div>';
}

    session_start();

    $user_ip = getUserIP();
    $error = [];

    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

function generate_key($input, $strength = 36) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}

if (isset($_POST['submit_registration']))
{
    if (R::count('users', "username = ?", array($_POST['username'])) or R::count('users', "email = ?", array($_POST['email'])))
    {
        $error[0] = 'User already registered!';

        echo '<div class="error-alert_container" id="alert-check"> <div class="error-alert"> <div class="error-icon_container"> <div class="error-icon"><i class="fa-solid fa-triangle-exclamation error-icon"></i></div> </div> <div class="error-item"> <div class="error-title">Error</div> <div class="error-subtitle">'.$error[0].'</div> </div> </div> </div>';
    }
    else
    {
        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']))
        {
            if (strlen($_POST['username']) >= 15)
            {
                $error[3] = 'Username is too long.';
                    echo '<div class="error-alert_container" id="alert-check"> <div class="error-alert"> <div class="error-icon_container"> <div class="error-icon"><i class="fa-solid fa-triangle-exclamation error-icon"></i></div> </div> <div class="error-item"> <div class="error-title">Error</div> <div class="error-subtitle">'.$error[3].'</div> </div> </div> </div>';
            }
            else
            {
                if (htmlspecialchars($_POST['password']) !== htmlspecialchars($_POST['confirm_password']))
                { 
                    $error[1] = 'Password do not match!';
                    echo '<div class="error-alert_container" id="alert-check"> <div class="error-alert"> <div class="error-icon_container"> <div class="error-icon"><i class="fa-solid fa-triangle-exclamation error-icon"></i></div> </div> <div class="error-item"> <div class="error-title">Error</div> <div class="error-subtitle">'.$error[1].'</div> </div> </div> </div>';
                }
                else
                {
                    $create_user = R::dispense('users');
                    $create_user->username = htmlspecialchars(trim($_POST['username']));
                    $create_user->email = htmlspecialchars(trim($_POST['email']));
                    $create_user->password = htmlspecialchars(trim($_POST['password']));
                    $create_user->date = htmlspecialchars(date(DATE_RSS));
                    $create_user->birthday_date = htmlspecialchars(0);
                    $create_user->ip = htmlspecialchars($user_ip);
                    $create_user->email_key = htmlspecialchars(generate_key($permitted_chars, 36));
                    $create_user->email_confirm = htmlspecialchars(0);
                    $create_user->shortinf = htmlspecialchars(0);
                    R::store($create_user);
                    echo "<script>showModal('openModalAuthorization');</script>";
                    echo '<div class="error-alert_container" id="alert-check"> <div class="error-alert"> <div class="error-item"> <div class="error-title">Successful</div> <div class="error-subtitle">User '.htmlspecialchars($_POST['username']).' successfully created!</div> </div> </div> </div>';
                }
            }
        }
    }
}

if (isset($_POST['submit_login']))
{
    if (!empty($_POST['username_l']) && !empty($_POST['password_l']))
    {
        $user = R::findOne('users', 'username = ?', array(htmlspecialchars(trim($_POST['username_l']))));

            if (htmlspecialchars(trim($_POST['username_l'])) === $user->username && htmlspecialchars(trim($_POST['password_l'])) === $user->password)
            {
                $_SESSION['logged_user'] = $user;
                echo '<div class="error-alert_container" id="alert-check"> <div class="error-alert"> <div class="error-item"> <div class="error-title">Successful</div> <div class="error-subtitle">Logined as '.$user->username.'!</div> </div> </div> </div>';
                echo "<script>eraseModal('openModalAuthorization');</script>";
            }
            else
            {
                $error[2] = 'Wrong password or username';
                echo '<div class="error-alert_container" id="alert-check"> <div class="error-alert"> <div class="error-icon_container"> <div class="error-icon"><i class="fa-solid fa-triangle-exclamation error-icon"></i></div> </div> <div class="error-item"> <div class="error-title">Error</div> <div class="error-subtitle">'.$error[2].'</div> </div> </div> </div>';
            }
    }
}

if (isset($_POST['logout']))
{
    unset($_SESSION['logged_user']);
    session_destroy();
    header('Location: ../index.php');
}

if (isset($_POST['submit_email_confirmation']))
{
    if (mail(htmlspecialchars($_SESSION['logged_user']->email), htmlspecialchars('Email verification'), htmlspecialchars('To verificate your email follow this link: http://andromeda.local.com/php/email_verification.php?verification='.$_SESSION['logged_user']->email_key).''))
    {
        $error[4] = 'Verification link was sended to your email - ';
        echo '<div class="error-alert_container" id="alert-check"> <div class="error-alert"> <div class="error-icon_container"> </div> <div class="error-item"> <div class="error-title">Success</div> <div class="error-subtitle">'.$error[4].' '.$_SESSION['logged_user']->email.'</div> </div> </div> </div>';
    }
    else
    {
        $error[5] = 'Failed to send verification code!';
        echo '<div class="error-alert_container" id="alert-check"> <div class="error-alert"> <div class="error-icon_container"> </div> <div class="error-item"> <div class="error-title">Error</div> <div class="error-subtitle">'.$error[5].'</div> </div> </div> </div>';
    }
}

if (isset($_POST['submit_birthday']))
{
    if ($_SESSION['logged_user']->email_confirm == false)
    {
        $error[7] = 'Email not confirmed!';
        echo '<div class="error-alert_container" id="alert-check"> <div class="error-alert"> <div class="error-icon_container"> </div> <div class="error-item"> <div class="error-title">Error</div> <div class="error-subtitle">'.$error[7].'</div> </div> </div> </div>';
    }
    else
    {
        $user = R::load('users', $_SESSION['logged_user']->id);
        if (!$user) { exit('error'); }
        if ($user->birthday_date == false)
        {
            $bth_day = htmlspecialchars($_POST['birthday_day']);
            $bth_month = htmlspecialchars($_POST['birthday_month']);
            $bth_year = htmlspecialchars($_POST['birthday_year']);
            $bth_buffer = $bth_day .'/'. $bth_month .'/'. $bth_year;
            $user->birthday_date = trim($bth_buffer);
            R::store($user);
            $_SESSION['logged_user']->birthday_date = trim($bth_buffer);
            header('Refresh');
        }
        else
        {
            $error[6] = 'Birthday date already changed!';
            echo '<div class="error-alert_container" id="alert-check"> <div class="error-alert"> <div class="error-icon_container"> </div> <div class="error-item"> <div class="error-title">Error</div> <div class="error-subtitle">'.$error[6].'</div> </div> </div> </div>';
        }
    }
}

if (isset($_POST['submit_shortinf']))
{
    if ($_SESSION['logged_user']->email_confirm == false)
    {
        $error[7] = 'Email not confirmed!';
        echo '<div class="error-alert_container" id="alert-check"> <div class="error-alert"> <div class="error-icon_container"> </div> <div class="error-item"> <div class="error-title">Error</div> <div class="error-subtitle">'.$error[7].'</div> </div> </div> </div>';
    }
        else
        {
        if (strlen(htmlspecialchars($_POST['shortinf'])) >= 250)
        {
            $error[8] = 'Message too long! Max symbols is 250!';
            echo '<div class="error-alert_container" id="alert-check"> <div class="error-alert"> <div class="error-icon_container"> </div> <div class="error-item"> <div class="error-title">Error</div> <div class="error-subtitle">'.$error[8].'</div> </div> </div> </div>';
        }
        else
        {
            $user = R::load('users', $_SESSION['logged_user']->id);
            if (!$user) { exit('error'); }
            $user->shortinf = trim(htmlspecialchars($_POST['shortinf']));
            R::store($user);
            $_SESSION['logged_user']->shortinf = trim(htmlspecialchars($_POST['shortinf']));
            header('Refresh');
        }
    }
}

if (isset($_POST['sumbit_thread_answer']) && isset($_SESSION['logged_user']) && $_SESSION['logged_user']->email_confirm == true)
{
    $thread_answer = R::dispense('answers');
    $thread_answer->msg_author = htmlspecialchars($_SESSION['logged_user']->username);
    $thread_answer->msg_date = date('d.m.Y');
    $thread_answer->msg_thread_title = htmlspecialchars($_POST['test']);
    $thread_answer->msg_post = htmlspecialchars($_POST['forum_thread_textarea']);
    R::store($thread_answer);
    header("Location: ".$_SERVER['HTTP_REFERER']);
}
    
?>