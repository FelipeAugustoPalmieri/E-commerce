<?php
require_once(__DIR__ . "/../models/Message.php");
require_once(__DIR__ . "/../globals.php");

$message = new Message ($BASE_URL);

$flassMessage = $message->getMessage();

if(!empty($flassMessage["msg"])) {
    
    $message->clearMessage();

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">

    <!-- DATE-PICKER -->
    <link rel="stylesheet" href="vendor/date-picker/css/datepicker.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper">
    <form action="../auth_process.php" method="POST" id="wizard">
        <input type="hidden" name="type" value="register">

        <h4></h4>
        <section>
            <div class="inner-register">
                <a href="#" class="avartar">
                    <img src="images/avartar.png" alt="">
                </a>
                <div class="form-row form-group">
                    <div class="form-holder">
                    <label for="name">Nome:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome">
                    </div>
                    <div class="form-holder">
                    <label for="lastname">Sobrenome:</label>
                     <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Digite seu sobrenome">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder">
                    <label for="email">E-mail:</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail">
                        <i class="zmdi zmdi-email small"></i>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder">
                        <label for="phone">Número de Telefone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite seu número">
                        <i class="zmdi zmdi-smartphone-android"></i>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder">
                    <label for="password">Senha:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha">
                        <i class="zmdi zmdi-lock-open small"></i>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-holder">
                    <label for="confirmpassword">Confirmação de senha:</label>
                   <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirme sua senha">
                        <i class="zmdi zmdi-lock-open small"></i>
                    </div>
                </div>
                
                <div class="login-container">
                     <a href="login.php" class="faça-o-login">Faça o login</a>
                </div>

                    <div class="submit-button">
                    <input type="submit" value="Register">
                </div>
            </div>
        </section>
    </form>
</div>
<?php if(!empty($flassMessage["msg"])): ?>
    <div class="msg-container">
      <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?></p>
    </div>
  <?php endif; ?>
<!-- DATE-PICKER -->
<script src="vendor/date-picker/js/datepicker.js"></script>
<script src="vendor/date-picker/js/datepicker.en.js"></script>

</body>
</html>
