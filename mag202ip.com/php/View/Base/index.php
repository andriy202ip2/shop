<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <title>Shop Products</title>
        <!--<link href="http://fonts.googleapis.com/css?family=Bitter" rel="stylesheet" type="text/css" />-->

        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <script src="/js/jquery-1.12.1.min.js"></script>

        <script src="/js/jquery-ui-1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="/js/jquery-ui-1.11.4/jquery-ui.css">

            <script src="/js/myScript.js"></script>
            <?php
            if (isset($_SESSION['RightsAccess']) && $_SESSION['RightsAccess'] > 0) {
                ?>    
                <script src="/js/myAdmin.js"></script>
                <?php
            }
            ?>

            <script src='https://www.google.com/recaptcha/api.js'></script>

    </head>
    <body>
        <div id="bg">
            <div id="outer">
                <div id="header">
                    <div id="logo">
                        <h1>
                            <a href="#">Shop Products</a>
                        </h1>
                    </div>
                    <div id="search">
                        <?php
                        ControllerPartial::Get('User/UserInfo');
                        ?>
                    </div>
                    <div id="nav">
                        <ul>
                            <?php
                            if (isset($_SESSION['Id'])) {
                                ?>
                                <li> 
                                    <a href="/Orders/MyOrders">My Orders</a>
                                </li>
                                <li> 
                                    <a href="/User/MyProfile/">My Profile</a>
                                </li> 
                                <li> 
                                    <a href="/User/MyAddBalance/">Add Balance</a>
                                </li> 
                                <?php
                                if (isset($_SESSION['RightsAccess']) && $_SESSION['RightsAccess'] > 0) {
                                    ?>        

                                    <li> 
                                        <a href="/Admin/">Admin Panell</a>
                                    </li> 

                                    <?php
                                }
                                ?>

                                <?php
                            }
                            ?>

                            <!-- class="first active" -->
                            <!--                                     
                            <li>
                                    <a href="#">Категорії </a>
                            </li>
                            <li>
                                    <a href="#">Корзина</a>
                            </li>
                            <li>
                                    <a href="#">Реєстрація</a>
                            </li> -->

                        </ul>

                        <br class="clear" />
                    </div>
                </div>
                <div id="banner">
                    <img src="/images/pic1.jpg" width="932" height="172" alt="" />
                </div>
                <div id="main">
                    <div id="sidebar">
                        <?php
                        ControllerPartial::Get('Products/Categories');
                        ?>
                    </div>
                    <div id="content">
                        <?php
                        if (isset($ob_TPL_Sub)) {
                            echo $ob_TPL_Sub;
                        }
                        ?>
                        <br class="clear" />
                    </div>
                    <br class="clear" />
                </div>
            </div>
            <div id="copyright">
                &copy; Test
            </div>
        </div>

        <div id="dialog-message" style="display: none" title="Message !">
            <label class="dialog-message">

                <label for="message">Message:
                    <label name="message"></label>
                    <label class="E"></label>
                </label>

            </label>
        </div>

    </body>
</html>
