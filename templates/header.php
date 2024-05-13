<?php 

require_once(__DIR__ . "/../globals.php");
require_once(__DIR__ . "/../db.php");
require_once(__DIR__ . "/../models/Message.php");
require_once(__DIR__ . "/../dao/UserDAO.php");

$message = new Message($BASE_URL);
$flashMessage = $message->getMessage();

if (!empty($flashMessage["msg"])) {
    $message->clearMessage();
}

$userDao = new UserDAO($conn, $BASE_URL);
$userData = $userDao->verifyToken(false);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Instituto Jedax</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/favicon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="index.php" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
               <img src="assets/img/logo.jpeg" alt="Jedax"> 
               
            </a>
            <?php if(!empty($flashMessage["msg"])): ?>
                <div class="msg-container">
                    <p class="msg <?= $flashMessage["type"] ?>"><?= $flashMessage["msg"] ?></p>
                </div>
            <?php endif; ?>
            <nav id="navmenu" class="navmenu">
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

                <ul>
                    
                    <li><a href="emotionTest.php" class="btn-getstarted-profile">Teste Emocional</a></li>
                    <!-- <li><a href="contact.php">Contato</a></li> -->
                    <li><a href="https://www.youtube.com/watch?v=pnZ4HZ0tCRA" class="btn-getstarted-profile">Live  21.03.2024</a></li>
                    <li><a href="contact.php" class="btn-getstarted-profile">Contato</a></li>
                    <li><a href="#" class="btn-getstarted-profile">Entrar</a></li>
                    
                </ul>
            </nav>
        </div>
    </header>
    

    <!-- Scroll Top -->
    <a href="https://api.whatsapp.com/send?phone=47933819532" id="scroll-top" class="scroll-top whatsapp-link d-flex align-items-center justify-content-center active"><i class="bi bi-whatsapp"></i></a>
    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>
</html>
