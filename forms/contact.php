<?php
require_once('terms/vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'vendas@institutojedax.com.br';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define os campos do formulário
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST["phone"]);
    $dob = trim($_POST["dob"]);
    $address = trim($_POST["address"]);
    $relacionamento = isset($_POST["relacionamento"]) ? $_POST["relacionamento"] : [];
    $financas = isset($_POST["financas"]) ? $_POST["financas"] : [];
    $familiar = isset($_POST["familiar"]) ? $_POST["familiar"] : [];
    $saudeFisica = isset($_POST["saudeFisica"]) ? $_POST["saudeFisica"] : [];
    $saudeEmocional = isset($_POST["saudeEmocional"]) ? $_POST["saudeEmocional"] : [];
    $trauma = isset($_POST["trauma"]) ? $_POST["trauma"] : '';
    $abandono = isset($_POST["abandono"]) ? $_POST["abandono"] : '';
    $rejeicao = isset($_POST["rejeicao"]) ? $_POST["rejeicao"] : '';
    $abusada = isset($_POST["abusada"]) ? $_POST["abusada"] : '';
    $perda = isset($_POST["perda"]) ? $_POST["perda"] : '';
    $depressao = isset($_POST["depressao"]) ? $_POST["depressao"] : '';
    $ansiedade = isset($_POST["ansiedade"]) ? $_POST["ansiedade"] : '';
    $indeciso = isset($_POST["indeciso"]) ? $_POST["indeciso"] : '';
    $medo = isset($_POST["medo"]) ? $_POST["medo"] : '';
    $vinganca = isset($_POST["vinganca"]) ? $_POST["vinganca"] : '';
    $conhecimento = isset($_POST["conhecimento"]) ? $_POST["conhecimento"] : '';
    $expressar = trim($_POST["expressar"]);
    $terapia = trim($_POST["terapia"]);

    // Monta a mensagem do e-mail
    $message = "Nome: $name\n";
    $message .= "Email: $email\n";
    $message .= "Telefone: $phone\n";
    $message .= "Data de Nascimento: $dob\n";
    $message .= "Cidade e Estado que mora: $address\n";
    $message .= "1 - Seu relacionamento (casamento, namoro, divórcio) está: " . implode(', ', (array)$relacionamento) . "\n";
    $message .= "2 - Suas finanças estão: " . implode(', ', (array)$financas) . "\n";
    $message .= "3 - Seu relacionamento familiar está: " . implode(', ', (array)$familiar) . "\n";
    $message .= "4 - Como está sua saúde física? " . implode(', ', (array)$saudeFisica) . "\n";
    $message .= "5 - Como está sua saúde emocional? " . implode(', ', (array)$saudeEmocional) . "\n";
    $message .= "6 - Você sente algum trauma de relacionamento? $trauma\n";
    $message .= "7 - Você tem sentimento de Abandono? $abandono\n";
    $message .= "8 - Você tem sentimento de rejeição? $rejeicao\n";
    $message .= "9 - Você tem sentimento de ter sido abusada? $abusada\n";
    $message .= "10 - Você carrega sentimento de Perda? $perda\n";
    $message .= "11 - Você tem sentimentos de depressão? $depressao\n";
    $message .= "12 - Você tem sentimentos de Ansiedade? $ansiedade\n";
    $message .= "13 - Você tem sentimentos de ser indecisa? $indeciso\n";
    $message .= "14 - Você tem sentimentos de medo? $medo\n";
    $message .= "15 - Você carrega sentimento de raiva, desejo de vingança? $vinganca\n";
    $message .= "16 - Qual seu nível de conhecimento sobre saúde emocional? $conhecimento\n";
    $message .= "17 - Descreva neste campo o que não conseguiu expressar nas respostas marcadas, acrescente pontos que precisa melhorar ou deseja conhecer: $expressar\n";
    $message .= "18 - Você já fez algum tipo de terapia ou mentoria? Se fez qual? $terapia\n";

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
        $mail->Body = $message;
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
