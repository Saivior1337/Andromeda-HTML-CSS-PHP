<?php require('php/database.php'); ?>
<?php if (!isset($_SESSION['logged_user']) && !isset($_POST['logout'])) header('Location: access.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['logged_user']->username . ' | Andromeda'; ?></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
        <?php if ($_SESSION['logged_user']->email_confirm == false) { ?>
        <div class="email-confirmation_container">
            <div class="email-confirmation_items">
                <div class="email-confirmation_title">Confirm your email address</div>
                <div class="email-confirmation_subtitle">Thanks for joining Andromeda!</div>
                <div class="email-confirmation_text">To finish signing up, please confirm your email address. This
                    ensures we have the right email in case we need to contact you.</div>
                <div class="email-confirmation_button">
                    <form method="POST"><button type="submit" name="submit_email_confirmation">Confirm my email
                            address</button></form>
                </div>
            </div>
        </div>
        <?php } else { ?>
        <div class="profile_container">
            <div class="profile_items">
                <div class="profile_logo">Profile details:</div>
                <div class="profile_username">Username: <font color="#D1DF07">
                        <?php echo $_SESSION['logged_user']->username; ?></font>
                </div>
                <div class="profile_email">Email: <font color="#D1DF07"><?php echo $_SESSION['logged_user']->email; ?>
                    </font>
                </div>
                <div class="profile_id">Account ID: <font color="#D1DF07"><?php echo $_SESSION['logged_user']->id; ?>
                    </font>
                </div>
                <div class="profile_registration_date">Registration date: <font color="#D1DF07">
                        <?php echo $_SESSION['logged_user']->date; ?></font>
                </div>
                <div class="profile_birthday_date">Birthday date:
                    <?php if ($_SESSION['logged_user']->birthday_date == false) { ?> <span
                        onclick="showModal('openModalBirthdayDate')"><i
                            class="fa-solid fa-file-pen span-icon"></i></span></span>
                    <?php } else echo "<font color='#D1DF07'>".$_SESSION["logged_user"]->birthday_date."</font>";  ?>
                </div>
                <div class="profile_shortinf">About me:
                    <?php if ($_SESSION['logged_user']->shortinf == false) { ?> <span
                        onclick="showModal('openModalShortInformation')"><i
                            class="fa-solid fa-file-lines span-icon"></i></span></span>
                    <?php } else { echo "<font color='#D1DF07'>".$_SESSION["logged_user"]->shortinf."</font>"; ?>
                    <span onclick="showModal('openModalShortInformation')"><i
                            class="fa-solid fa-file-pen span-icon"></i></span> <?php } ?>
                </div>
            </div>
            <?php } ?>
    </section>

    <div id="openModalBirthdayDate" class="modal">
        <div class="modal-dialog modal-auth">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Birthday <i class="fa-solid fa-cake-candles modal-icon"></i></h3>
                    <span title="Close" class="close" onclick="eraseModal('openModalBirthdayDate')">×</span>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="modal-body_items">
                            <input type="number" min="1" max="31" maxlength="2" placeholder="Day" name="birthday_day"
                                value="Day" required>
                            <select name="birthday_month">
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>April</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>November</option>
                                <option>December</option>
                            </select>
                            <input type="number" min="1910" max="2021" name="birthday_year" placeholder="Year" required>
                        </div>
                        <button class="modal-body-button" type="submit" name="submit_birthday">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="openModalShortInformation" class="modal">
        <div class="modal-dialog modal-auth">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">About me <i class="fa-solid fa-file-pen modal-icon"></i></h3>
                    <span title="Close" class="close" onclick="eraseModal('openModalShortInformation')">×</span>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="modal-body_items">
                            <textarea name="shortinf"><?php echo $_SESSION['logged_user']->shortinf; ?></textarea>
                        </div>
                        <button class="modal-body-button" type="submit" name="submit_shortinf">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
    <script src="https://kit.fontawesome.com/25d6b5720b.js" crossorigin="anonymous"></script>
</body>

</html>