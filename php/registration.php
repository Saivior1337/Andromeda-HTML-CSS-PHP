<?php

require('database.php');

$user_ip = getUserIP();

if (isset($_POST['submit_registration']))
{
    $error = [];
    if (R::count('users', "username = ?", array($_POST['username'])) or R::count('users', "email = ?", array($_POST['email'])))
    {
        $error[0] = 'User already registered!';

        echo '<div class="error-alert_container" id="alert-check"> <div class="error-alert"> <div class="error-icon_container"> <div class="error-icon"><i class="fa-solid fa-triangle-exclamation error-icon"></i></div> </div> <div class="error-item"> <div class="error-title">Error</div> <div class="error-subtitle">'.$error[0].'</div> </div> </div> </div>';

    }
    else
    {
        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']))
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
                $create_user->ip = htmlspecialchars($user_ip);
                R::store($create_user);
                echo '<div class="error-alert_container" id="alert-check"> <div class="error-alert"> <div class="error-item"> <div class="error-title">Successful</div> <div class="error-subtitle">User '.htmlspecialchars($_POST['username']).' successfully created!</div> </div> </div> </div>';
            }
        }
    }

}


?>