<?php
require_once('../asaas/accountAsaas.php');
// Inicia a sessão para acessar o ID do cliente
session_start();

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica o método de pagamento selecionado
    $payment_method = $_POST['payment_method'];

    // Processa os dados de acordo com o método de pagamento
    switch ($payment_method) {
        case 'cartao':
            processarPagamentoCartao($_POST);
            break;

        case 'boleto':
            processarPagamentoBoleto($_POST);
            break;

    
        default:
            // Método de pagamento inválido
            die("Método de pagamento inválido.");
    }
} else {
    // Se o formulário não foi enviado corretamente, redirecionar para a página de pagamento
    header("Location: index.php");
    exit();
}

function processarPagamentoCartao($dados) {
    // Substitua 'SEU_ACCESS_TOKEN' pela sua chave de acesso (access token) do Asaas
    $access_token = '$aact_YTU5YTE0M2M2N2I4MTliNzk0YTI5N2U5MzdjNWZmNDQ6OjAwMDAwMDAwMDAwMDA0MDE2MjA6OiRhYWNoXzc4MjVhYzJkLWY0NDYtNDllMC04YTBlLTFhN2FlMmZmNDJmOA==';
    
    // Obtém o ID do cliente da sessão
    $id_cliente = $_SESSION['customer_id'];
 
    $endpoint = 'https://www.asaas.com/api/v3/payments';
    
    // Dados do pagamento
    $parcelas = intval($_POST['parcelas']);
    $valor_pagamento = calcularValorTotal($parcelas); // Calcula o valor total com base no número de parcelas
    $data_vencimento = date('Y-m-d', strtotime('+2 days')); // Data de vencimento (2 dias a partir de hoje)
    
    // Verifica se é pagamento à vista (sem juros)
    if ($parcelas == 1) {
        // Pagamento à vista
        $data = [
            'customer' => $id_cliente,
            'billingType' => 'CREDIT_CARD',
            'value' => $valor_pagamento,
            'dueDate' => $data_vencimento
        ];
    } else {
        // Pagamento parcelado
        // Calcula o valor de cada parcela sem juros
        $valor_por_parcela = $valor_pagamento / $parcelas;
        
        // Cria a cobrança para cada parcela sem juros
        $cobrancas = [];
        for ($i = 1; $i <= $parcelas; $i++) {
            $cobranca = [
                'customer' => $id_cliente,
                'billingType' => 'CREDIT_CARD',
                'value' => $valor_por_parcela,
                'dueDate' => date('Y-m-d', strtotime("+$i month", strtotime($data_vencimento))),
                'installmentCount' => $i,
                'installmentValue' => $valor_por_parcela
            ];
            array_push($cobrancas, $cobranca);
        }
        
        // Executa as requisições para criar as cobranças parceladas
        $responses = [];
        foreach ($cobrancas as $cobranca) {
            $ch = curl_init(); // Inicia a sessão curl
            curl_setopt($ch, CURLOPT_URL, $endpoint); // Define a URL da requisição
            curl_setopt($ch, CURLOPT_POST, true); // Define o método da requisição como POST
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($cobranca)); // Define os dados da requisição
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Habilita o retorno da resposta como string
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'access_token: ' . $access_token
            ]); // Define os cabeçalhos da requisição
            $response = curl_exec($ch); // Executa a requisição e obtém a resposta
            curl_close($ch); // Encerra a sessão curl
            $responses[] = json_decode($response, true); // Decodifica a resposta e adiciona ao array de respostas
        }
        
        // Verifica se todas as requisições foram bem-sucedidas
        $sucesso = true;
        foreach ($responses as $response) {
            if (!isset($response['id'])) {
                $sucesso = false;
                break;
            }
        }
        
        // Se todas as cobranças foram criadas com sucesso
        if ($sucesso) {
            echo "<h2>Pagamento Parcelado com Cartão de Crédito Processado com Sucesso!</h2>";
            echo "<p>A cobrança foi enviada para o seu email e número de telefone cadastrados.</p>";
            echo "<p>Verifique sua caixa de entrada de email e mensagens no seu número de telefone para obter mais detalhes.</p>";
        } else {
            echo "Erro ao processar pagamento parcelado com cartão de crédito.";
        }
        return;
    }
    
    // Configura a requisição HTTP para pagamento à vista
    $ch = curl_init(); // Inicia a sessão curl
    curl_setopt($ch, CURLOPT_URL, $endpoint); // Define a URL da requisição
    curl_setopt($ch, CURLOPT_POST, true); // Define o método da requisição como POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Define os dados da requisição
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Habilita o retorno da resposta como string
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'access_token: ' . $access_token
    ]); // Define os cabeçalhos da requisição

    // Executa a requisição
    $response = curl_exec($ch); // Executa a requisição e obtém a resposta
    curl_close($ch); // Encerra a sessão curl

    // Processa a resposta da API
    $responseData = json_decode($response, true);

    // Verifica se a requisição foi bem-sucedida
    if(isset($responseData['success']) && $responseData['success'] === true) {
        // Pagamento processado com sucesso
        echo "<h2>Pagamento com Cartão de Crédito Processado com Sucesso!</h2>";
        echo "<p>A cobrança foi enviada para o seu email e número de telefone cadastrados.</p>";
        echo "<p>Verifique sua caixa de entrada de email e mensagens no seu número de telefone para obter mais detalhes.</p>";
    } else {
        // Ocorreu um erro no processamento do pagamento
        echo "Erro ao processar pagamento com cartão de crédito: " . $responseData['errorMessage'];
    }
}
    




function processarPagamentoBoleto($dados) {
    // Substitua 'SEU_ACCESS_TOKEN' pela sua chave de acesso (access token) do Asaas
    $access_token = '$aact_YTU5YTE0M2M2N2I4MTliNzk0YTI5N2U5MzdjNWZmNDQ6OjAwMDAwMDAwMDAwMDA0MDE2MjA6OiRhYWNoXzc4MjVhYzJkLWY0NDYtNDllMC04YTBlLTFhN2FlMmZmNDJmOA==';
    
    // Obtém o ID do cliente da sessão
    $id_cliente = $_SESSION['customer_id'];
    
    // Dados do pagamento
    $parcelas = intval($dados['parcelas']);
    $valor_por_parcela = calcularValorTotal($parcelas); // Usando a função para calcular o valor total de cada parcela
    $valor_total = $valor_por_parcela * $parcelas;
    $data_vencimento = date('Y-m-d', strtotime('+2 days'));

    // Adicionando taxa de juros para parcelas de 2x até 12x
    $taxa_juros = 0.06; // 6% de taxa de juros ao mês
    if ($parcelas >= 2 && $parcelas <= 12) {
        $valor_por_parcela *= (1 + $taxa_juros); // Aplica a taxa de juros ao valor de cada parcela
        $valor_total = $valor_por_parcela * $parcelas; // Atualiza o valor total
    }

    // Endpoint da API do Asaas para criar um novo pagamento
    $endpoint = 'https://www.asaas.com/api/v3/payments';
    
    // Monta os dados da solicitação
    $data = [
        'customer' => $id_cliente,
        'billingType' => 'BOLETO',
        'installmentCount' => $parcelas, // Definindo o número de parcelas
        'installmentValue' => $valor_por_parcela, // Definindo o valor de cada parcela
        'dueDate' => $data_vencimento
    ];
    
    // Configura a requisição HTTP
    $ch = curl_init($endpoint);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'access_token: ' . $access_token
    ]);
    
    // Executa a requisição
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Obtém o código de status HTTP
    curl_close($ch);
    
    if ($httpCode == 200) {
        // Redireciona para a página de confirmação após 2 segundos
        header("refresh:0;url=../../confirmEnrollment.php");
        // Termina o script
        exit();
    } else {
        // Ocorreu um erro no processamento do pagamento
        echo "Erro ao gerar cobrança: " . $response;
        
        }
    }



// Função para calcular o valor total com base no número de parcelas
function calcularValorTotal($parcelas) {
    // Substitua aqui pelas condições para calcular o valor total de acordo com o número de parcelas
    // Por exemplo, se o valor original for R$ 2376,00 e o usuário escolher 3 parcelas, o valor total será 792,00
    $valor_original = 2988.00;
    return $valor_original / $parcelas;
}
?>