<?php 

require_once("templates/header.php");
require_once("dao/UserDAO.php");
require_once("globals.php");


$userDao = new UserDAO($conn, $BASE_URL);

$userData = $userDao->verifyToken(true);
?>
<head>



</head>
<h1>Edição de perfil</h1>

<?php 

require_once("templates/footer.php")

?>