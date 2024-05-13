<?php
require_once('terms/vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'contato@institutojedax.com.br';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define os campos do formulário
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST["phone"]);
    $message = trim($_POST["message"]);

    // Monta a mensagem do e-mail
    $message_body = "Nome: $name\n";
    $message_body .= "Email: $email\n";
    $message_body .= "Telefone: $phone\n";
    $message_body .= "Mensagem: $message\n";

    // Inicializa o objeto PHPMailer
    $mail = new PHPMailer(true);

    // Configura a codificação de caracteres do e-mail
    $mail->CharSet = 'UTF-8';

    // Configura o cabeçalho do e-mail
    $headers = "Content-type: text/plain; charset=UTF-8\r\n";

    // Envia o e-mail
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.uni5.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'financeiro@institutojedax.com.br';
        $mail->Password = 'Ijedax@2024';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('financeiro@institutojedax.com.br', 'Financeiro');
        $mail->addAddress($receiving_email_address);
        $mail->Subject = 'Novo Formulário de Contato';
        $mail->Body = $message_body;
        if ($mail->send()) {
          http_response_code(200);
          echo "sent-message";
      } else {
          http_response_code(500);
          echo "error-message";
      }
    } catch (Exception $e) {
        http_response_code(500);
        echo "Oops! Algo deu errado. Erro: {$e->getMessage()}";
    }
} else {
    http_response_code(403);
    echo "Houve um problema com o seu envio, por favor, tente novamente.";
}
?>
