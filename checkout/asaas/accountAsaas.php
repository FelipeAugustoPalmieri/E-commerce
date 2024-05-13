<?php

// Função para enviar cadastro de cliente para Asaas
function enviarCadastroClienteAsaas($data) {
    // Verifica se os dados do formulário foram enviados
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        // Se o formulário não foi enviado corretamente, retorna erro
        return ['error' => true, 'message' => 'Método de solicitação não é POST.'];
    }

    $access_token = '$aact_YTU5YTE0M2M2N2I4MTliNzk0YTI5N2U5MzdjNWZmNDQ6OjAwMDAwMDAwMDAwMDA0MDE2MjA6OiRhYWNoXzc4MjVhYzJkLWY0NDYtNDllMC04YTBlLTFhN2FlMmZmNDJmOA==';
    $endpoint = 'https://www.asaas.com/api/v3/customers';

    // Configuração do comando cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'accept: application/json',
        'access_token: ' . $access_token,
        'content-type: application/json'
    ));

    // Executa o comando cURL
    $response = curl_exec($ch);

    // Verifica se houve erro na execução do comando cURL
    if ($response === false) {
        return ['error' => true, 'message' => 'Erro na requisição: ' . curl_error($ch)];
    }


    // Fecha a conexão cURL
    curl_close($ch);

    // Decodifica a resposta JSON
    $responseData = json_decode($response, true);

    // Verifica se houve erro ao decodificar a resposta JSON
    if ($responseData === null && json_last_error() !== JSON_ERROR_NONE) {
        return ['error' => true, 'message' => 'Erro ao decodificar a resposta JSON: ' . json_last_error_msg()];
    }

    return $responseData;
}

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os dados do formulário estão definidos antes de acessá-los
    $nome = isset($_POST['name']) ? $_POST['name'] : '';
    $cpf_cnpj = isset($_POST['cnpj_cpf']) ? $_POST['cnpj_cpf'] : '';
    $fone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Monta os dados da solicitação
    $data = [
        'name' => $nome,
        'cpfCnpj' => $cpf_cnpj,
        'mobilePhone' => $fone,
        'email' => $email,
    ];

    // Envia o cadastro do cliente para Asaas
    $response = enviarCadastroClienteAsaas($data);
 
    // Verifica se a requisição foi bem-sucedida
    if (!isset($response['error'])) {
        if (isset($response['id']) && $response['id']) {
            // Armazena o ID do cliente retornado pelo Asaas na sessão
            session_start();
            $_SESSION['customer_id'] = $response['id'];
        } else {
            $errorMessage = $response['errorMessage'] ?? 'Erro desconhecido ao cadastrar cliente.';
            echo "Erro ao cadastrar cliente: " . $errorMessage;
        }
    } else {
         echo "Erro ao enviar requisição: " . $response['message'];
    }
} else {
    // Se o formulário não foi enviado corretamente, redireciona para o index
    header("Location: index.php");
    exit();
}
?>
