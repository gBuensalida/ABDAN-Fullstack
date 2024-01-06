<?php 
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login.view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abdan</title>
    <link rel="stylesheet" href="../scss/main.css">
    <link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/98333f930b.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- HEADER -->
    <header class="header">
        <div class="container">
            <div class="header__wrapper">
                <div class="branding">
                    <img src="../img/abdan-high-resolution-logo-black-transparent.png" alt="">
                </div>
                <?php 
                if (isset($_SESSION['errors_signup'])) { ?>
                <div class="signup__error__bg">
                    <div class="signup__error__msg">
                        <div class="error__title">
                            <h1>SIGN UP ERROR</h1>
                        </div>
                        <div class="error__msg">
                            <?php
                            check_signup_errors();
                            ?>
                        </div>
                        <div class="error__btn">
                            <p>Go back</p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php 
                if (isset($_GET['signup']) && $_GET['signup'] === "success") { ?>
                <div class="signup__success__bg">
                    <div class="signup__success__msg">
                        <div class="success__title">
                            <h1>SIGN UP SUCCESS</h1>
                        </div>
                        <div class="success__msg">
                            <?php 
                            check_signup_errors();
                            ?>
                        </div>
                        <div class="signup__success__btn">
                            <p>Go back</p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php
                if (!isset($_SESSION["user_id"])) {
                ?>
                <div class="header__login">
                    <div class="login__container">
                        <i class="fa-regular fa-user"></i>
                    </div>
                </div>
                <?php } ?>
                <?php if (isset($_SESSION["errors_login"])) {
                ?>
                <div class="login__error__bg">
                    <div class="login__error__msg">
                        <div class="login__title">
                            <h1>LOG IN ERROR</h1>
                        </div>
                        <div class="login__error__text">
                            <?php
                            check_login_errors();
                            ?>
                        </div>
                        <div class="login__error__btn">
                            <p>Go back</p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php
                if (isset($_GET['login']) && $_GET['login'] === "success") {
                ?>
                <div class="header__loggedin">
                    <form action="includes/logout.inc.php" method="post">
                        <button>Log Out</button>
                    </form>
                </div>
                <?php } ?>
                <div class="login__window__bg">
                    <div class="login__window">
                        <div class="login__title">
                            <h1>Log in or Sign up</h1>
                        </div>
                        <div class="login__body">
                            <div class="login__opening__msg">
                                <h2>Welcome to ABDAN</h2>
                            </div>
                            <form action="includes/login.inc.php" method="post">
                                <input type="text" name = "email" placeholder="Email">
                                <input type="password" name = "pwd" placeholder="Password">
                                <input type="submit" value="Continue" class="sbmt">
                            </form>
                            <div class="login__signup">
                                <div class="signup__question">
                                    <p>Don't have an account yet?</p>
                                </div>
                                <div class="signup__btn">
                                    <span>Create one <i class="fa-solid fa-arrow-right"></i></span>
                                </div>
                            </div>
                            <div class="login__closeBtn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="signup__window">
                        <div class="signup__title">
                            <h1>Sign up</h1>
                        </div>
                        <div class="signup__body">
                            <div class="signup__opening__msg">
                                <h2>Create an account</h2>
                            </div>
                            <form action="includes/signup.inc.php" method="post">
                                <input type="email" name="email" placeholder="Email">
                                <input type="password" name="pwd" placeholder="Password">
                                <input type="text" name="fname" placeholder="First Name">
                                <input type="text" name="lname" placeholder="Last Name">
                                <input type="text" name="addr" placeholder="Address">
                                <input type="number" name="pnumber" placeholder="Phone No.">
                                <input type="submit" name="sbmt" value="Continue" class="sbmt">
                            </form>

                            <div class="signup__closeBtn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header__nav">
                    <div class="header__preview">
                        <div class="header__preview__icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <div class="header__preview__texts">
                            <div class="header__preview__top">
                                <h3>Where?</h3>
                            </div>
                            <div class="header__preview__bot">
                                <span>When?</span>
                                <span></span>
                                <span>Who?</span>
                            </div>
                        </div>
                    </div>
                    <div class="header__view__bg">
                        <div class="header__view">
                            <div class="header__view__wrapper">
                                <div class="header__close__btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="header__bar" id="where">
                                    <h1>Where to?</h1>
                                    <div class="header__search__where">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                        <input type="text" placeholder="Search destinations">
                                    </div>
                                </div>
                                <div class="header__bar" id="when">
                                    <h1>When</h1>
                                    <a href="">Add dates</a>
                                </div>
                                <div class="header__bar" id="who">
                                    <h1>Who</h1>
                                    <a href="">Add guests</a>
                                </div>
                                <div class="header__search__btn">
                                    <a href=""><i class="fa-solid fa-magnifying-glass"></i> Search</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- BANNER -->
    <section class="banner">
        <div class="banner__overlay">
            <div class="container">
                <div class="banner__wrapper">
                    <div class="banner__text">
                        <?php 
                        output_username()
                        ?>
                        <h1>Find your next stay in Laguna with <span>ABDAN</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- LISTING -->
    <section class="listing">
        <div class="container">
            <div class="listing__wrapper">
                <div class="listing__item">
                    <div class="listing__img">
                        <img src="../img/trial.jpeg" alt="">
                    </div>
                    <div class="listing__details">
                        <div class="listing__title">
                            <h1>Sta Cruz, Laguna</h1>
                        </div>
                        <div class="listing__date">
                            <p>Dec 12-15</p>
                        </div>
                        <div class="listing__price">
                            <p><span>Php 7000</span> night</p>
                        </div>
                    </div>
                </div>
                <div class="listing__item">
                    <div class="listing__img">
                        <img src="../img/trial.jpeg" alt="">
                    </div>
                    <div class="listing__details">
                        <div class="listing__title">
                            <h1>Sta Cruz, Laguna</h1>
                        </div>
                        <div class="listing__date">
                            <p>Dec 12-15</p>
                        </div>
                        <div class="listing__price">
                            <p><span>Php 7000</span> night</p>
                        </div>
                    </div>
                </div>
                <div class="listing__item">
                    <div class="listing__img">
                        <img src="../img/trial.jpeg" alt="">
                    </div>
                    <div class="listing__details">
                        <div class="listing__title">
                            <h1>Sta Cruz, Laguna</h1>
                        </div>
                        <div class="listing__date">
                            <p>Dec 12-15</p>
                        </div>
                        <div class="listing__price">
                            <p><span>Php 7000</span> night</p>
                        </div>
                    </div>
                </div>
                <div class="listing__item">
                    <div class="listing__img">
                        <img src="../img/trial.jpeg" alt="">
                    </div>
                    <div class="listing__details">
                        <div class="listing__title">
                            <h1>Sta Cruz, Laguna</h1>
                        </div>
                        <div class="listing__date">
                            <p>Dec 12-15</p>
                        </div>
                        <div class="listing__price">
                            <p><span>Php 7000</span> night</p>
                        </div>
                    </div>
                </div>
                <div class="listing__item">
                    <div class="listing__img">
                        <img src="../img/trial.jpeg" alt="">
                    </div>
                    <div class="listing__details">
                        <div class="listing__title">
                            <h1>Sta Cruz, Laguna</h1>
                        </div>
                        <div class="listing__date">
                            <p>Dec 12-15</p>
                        </div>
                        <div class="listing__price">
                            <p><span>Php 7000</span> night</p>
                        </div>
                    </div>
                </div>
                <div class="listing__item">
                    <div class="listing__img">
                        <img src="../img/trial.jpeg" alt="">
                    </div>
                    <div class="listing__details">
                        <div class="listing__title">
                            <h1>Sta Cruz, Laguna</h1>
                        </div>
                        <div class="listing__date">
                            <p>Dec 12-15</p>
                        </div>
                        <div class="listing__price">
                            <p><span>Php 7000</span> night</p>
                        </div>
                    </div>
                </div>
                <div class="listing__item">
                    <div class="listing__img">
                        <img src="../img/trial.jpeg" alt="">
                    </div>
                    <div class="listing__details">
                        <div class="listing__title">
                            <h1>Sta Cruz, Laguna</h1>
                        </div>
                        <div class="listing__date">
                            <p>Dec 12-15</p>
                        </div>
                        <div class="listing__price">
                            <p><span>Php 7000</span> night</p>
                        </div>
                    </div>
                </div>
                <div class="listing__item">
                    <div class="listing__img">
                        <img src="../img/trial.jpeg" alt="">
                    </div>
                    <div class="listing__details">
                        <div class="listing__title">
                            <h1>Sta Cruz, Laguna</h1>
                        </div>
                        <div class="listing__date">
                            <p>Dec 12-15</p>
                        </div>
                        <div class="listing__price">
                            <p><span>Php 7000</span> night</p>
                        </div>
                    </div>
                </div>
                <div class="listing__item">
                    <div class="listing__img">
                        <img src="../img/trial.jpeg" alt="">
                    </div>
                    <div class="listing__details">
                        <div class="listing__title">
                            <h1>Sta Cruz, Laguna</h1>
                        </div>
                        <div class="listing__date">
                            <p>Dec 12-15</p>
                        </div>
                        <div class="listing__price">
                            <p><span>Php 7000</span> night</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   
    <script async src="../js/script.js"></script>
</body>
</html>