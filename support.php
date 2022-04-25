<?php

require_once('php/database.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andromeda</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon" type="icon" href="media/icons/icon.png">
</head>

<body>
    <section class="page_header">
        <div class="header-container">
            <div class="header-logo">
                <div class="header-title">Andromeda</div>
                <div class="header-subtitle">unique code style & undetectable functional</div>
            </div>
            <div class="header-image">
                <img src="media/content/header-logo.jpg" alt="header-image">
            </div>

            <div class="header-navigation">
                <ul class="header-ul">
                    <li class="header-li"><A href="index.php">Home <i class="fa-solid fa-house icon"></i></A></li>
                    <li class="header-li"><A href="support.php">Support <i class="fa-solid fa-circle-question icon"></i></A></li>
                    <li class="header-li"><A href="#">Discord <i class="fa-brands fa-discord icon"></i></A></li>
                    <li class="header-li"><?php if (isset($_SESSION['logged_user'])) {echo '<A href="user_page.php">'. $_SESSION['logged_user']->username .' <i class="fa-solid fa-user icon"></i></A></form>';} else { ?> <span onclick="showModal('openModalAuthorization')">Account <i class="fa-solid fa-user icon"></i></span> <?php } ?></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="page_body">
        <div class="support-title">How can we help?</div>
        <div class="support-items">
            <span onclick="showModal('openModalSupportStart')">
                <div class="support-column">
                    <div class="support-item_icon"><i class="fa-solid fa-gears support-icon"></i></div>
                    <div class="support-item_title">Getting Started</div>
                </div>
            </span>
            <span onclick="showModal('openModalSupportAccount')">
                <div class="support-column">
                    <div class="support-item_icon"><i class="fa-solid fa-user support-icon"></i></div>
                    <div class="support-item_title">Account</div>
                </div>
            </span>
            <span onclick="showModal('openModalSupportErrors')">
                <div class="support-column">
                    <div class="support-item_icon"><i class="fa-solid fa-triangle-exclamation support-icon"></i></div>
                    <div class="support-item_title">Errors</div>
                </div>
            </span>
            <span onclick="showModal('openModalSupportEcommerce')">
                <div class="support-column">
                    <div class="support-item_icon"><i class="fa-solid fa-cart-shopping support-icon"></i></div>
                    <div class="support-item_title">Ecommerce</div>
                </div>
            </span>
        </div>
        <div class="support-extended_container">
            <div class="support-extended_items">
                <div class="support-extended_column">
                    <div class="support-extended_title">Need more help?</div>
                    <div class="support-extended_subtitle">Get in touch with us, support is provided daily contact us:
                        <font color="#b375ea">contact@gmail.com</font>
                    </div>
                </div>
                <div class="support-extended_column">
                    <div class="support-extended_icon ext-mod"><i class="fa-solid fa-envelope ext-icon"></i></div>
                </div>
            </div>
        </div>
    </section>
    <section class="page__footer">
        <div class="page__footer-container">
            <div class="page__footer-items">
                <div class="page__footer-author">Designed and created by <A href="https://yougame.biz/members/54042/" target="blank">Saivior1337</A></div>
                <div class="page__footer-payment">
                    We accept: <i class="fa-brands fa-cc-visa icon-pay"></i> <i
                        class="fa-brands fa-cc-mastercard icon-pay"></i> <i class="fa-brands fa-cc-paypal icon-pay"></i>
                </div>
            </div>
        </div>
    </section>
    <div id="openModalSupportStart" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Getting Started <i class="fa-solid fa-gears modal-icon"></i></h3>
                    <span title="Close" class="close" onclick="eraseModal('openModalSupportStart')">×</span>
                </div>
                <div class="modal-body">
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 1</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 2</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 3</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 4</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="openModalSupportAccount" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Account <i class="fa-solid fa-user modal-icon"></i></h3>
                    <span title="Close" class="close" onclick="eraseModal('openModalSupportAccount')">×</span>
                </div>
                <div class="modal-body">
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 1</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 2</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 3</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 4</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="openModalSupportErrors" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Errors <i class="fa-solid fa-triangle-exclamation modal-icon"></i></h3>
                    <span title="Close" class="close" onclick="eraseModal('openModalSupportErrors')">×</span>
                </div>
                <div class="modal-body">
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 1</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 2</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 3</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 4</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="openModalSupportEcommerce" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Ecommerce <i class="fa-solid fa-cart-shopping modal-icon"></i></h3>
                    <span title="Close" class="close" onclick="eraseModal('openModalSupportEcommerce')">×</span>
                </div>
                <div class="modal-body">
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 1</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 2</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 3</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                    <div class="modal-body-column">
                        <div class="modal-body-title">Title 4</div>
                        <div class="modal-body-subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Veniam illum sapiente fugit consequuntur illo sed, facilis eligendi similique quod molestias
                            natus officia voluptas perspiciatis quaerat, velit quisquam corrupti alias quam?</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="openModalAuthorization" class="modal">
        <div class="modal-dialog modal-auth">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Authorization <i class="fa-solid fa-arrow-right-to-bracket modal-icon"></i>
                    </h3>
                    <span title="Close" class="close" onclick="eraseModal('openModalAuthorization')">×</span>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="modal-body-column">
                            <div class="modal-body-title">Username</div>
                            <div class="modal-body-input"><input type="text" name="username_l" required></div>
                        </div>
                        <div class="modal-body-column">
                            <div class="modal-body-title">Password</div>
                            <div class="modal-body-input"><input type="password" name="password_l" required></div>
                        </div>
                        <div class="modal-body-buttons">
                            <button class="modal-body-button" type="submit" name="submit_login">Login</button>
                        </div>
                        <div class="modal-body-text">Don't have an account? <A href="#openModalRegistration">Sign Up</A>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="openModalRegistration" class="modal">
        <div class="modal-dialog modal-auth">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Registration <i class="fa-solid fa-address-card modal-icon"></i></h3>
                    <span title="Close" class="close" onclick="eraseModal('openModalRegistration')">×</span>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="modal-body-column">
                            <div class="modal-body-title">Username</div>
                            <div class="modal-body-input"><input type="text" name="username" required></div>
                        </div>
                        <div class="modal-body-column">
                            <div class="modal-body-title">Email</div>
                            <div class="modal-body-input"><input type="email" name="email" required></div>
                        </div>
                        <div class="modal-body-column">
                            <div class="modal-body-title">Password</div>
                            <div class="modal-body-input"><input type="password" name="password" required></div>
                        </div>
                        <div class="modal-body-column">
                            <div class="modal-body-title">Confirm password</div>
                            <div class="modal-body-input"><input type="password" name="confirm_password" required></div>
                        </div>
                        <div class="modal-body-buttons">
                            <button class="modal-body-button" type="submit" name="submit_registration">Sign Up</button>
                        </div>
                        <div class="modal-body-text">Already registered? <A href="#openModalAuthorization">Sign In</A>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/25d6b5720b.js" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>