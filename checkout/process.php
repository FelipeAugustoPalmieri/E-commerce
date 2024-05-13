<?php
require_once('terms/vendor/autoload.php');
require_once('terms/PHPMailer-master/src/Exception.php');
require_once('terms/PHPMailer-master/src/PHPMailer.php');
require_once('terms/PHPMailer-master/src/SMTP.php');
require_once('terms/TCPDF-main/tcpdf.php'); 
require_once('asaas/accountAsaas.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['curso'])) {
        $nome_contratante = $_POST['name'];
        $email_contratante = $_POST['email'];

        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 12);
        $pdf->MultiCell(0, 10, "CONTRATO DE PRESTAÇÃO DE SERVIÇO DE CURSOS E TREINAMENTOS ONLINE", 0, 'C');
        $data_atual = date('d \d\e F \d\e Y');

        // Adiciona todo o conteúdo do contrato
        $content = "
            1. CONTRATANTE:

            CNPJ ou CPF: {$_POST['cnpj_cpf']}
            Fone: {$_POST['phone']}
            E-mail: {$_POST['email']}
            Endereço: {$_POST['road']}
            Bairro: {$_POST['neighborhood']}
            Cidade: {$_POST['city']}
            Estado: {$_POST['state']}

            3. FACILITADORA (INSTITUTO JEDAX):
            Nome ou Razão Social: Instituto Jedax Ltda, representada conforme seu contrato social
            CNPJ ou CPF: 33.394.220/0001-04
            Endereço Rua Fermino Vieira Cordeiro, 1200 – Bairro Espinheiros - Itajaí/SC
            CEP: 88.220-317
            Representada por: José Domingos Tolfo
            CPF: 649.358.680-15

            4. CONTEÚDO CONTRATADO
            Instituição de Treinamento INSTITUTO JEDAX LTDA
            CNPJ: 33.394.220/0001-04
            Título do Treinamento CEO – Controle Emocional Orientado
            Preço Total R$ 2.376,00 (Dois Mil e Trezentos e Setenta e Seis Reais)
            Forma de Pagamento Entrada R$198,00 + 11x R$198,00
            Data de Vencimento Todo dia 05 após a assinatura do contrato.
            Vigência do Contrato 11 meses após a assinatura do contrato.
            Carga Horária 40
            Prazo de desistência: 07 dias
            Acesso a Plataforma https://www.institutojedax.com.br
            5. Mentoria
            Encontros via WhatsApp, vídeos aulas na plataforma, material de apoio para o desenvolvimento pessoal direto na plataforma.

            6. Suporte e Contato relacionamento@institutojedax.com.br

            O CONTRATANTE e o AVALISTA, ao assinarem o presente Quadro Resumo – Condições Comerciais, DECLARAM EXPRESSAMENTE que conhecem e concordam com as Condições Gerais de Contrato anexa.

            CONDIÇÕES GERAIS DE CONTRATO - CONTRATO DE FINANCIAMENTO

            1. DEFINIÇÕES E REFERÊNCIAS TÉCNICAS
            1.1 Quando utilizadas neste instrumento, as seguintes nomenclaturas terão os significados abaixo descritos, sendo certo que, se aplicarão tanto no singular, quanto no plural, quais sejam:
            “CONTRATANTE” - trata-se da figura do consumidor que contrata os serviços prestados pelo Instituto Jedax LTDA.
            “CONTRATADA” - trata-se da figura da INSTITUTO JEDAX LTDA., fornecedora de crédito do
            consumidor.
            “AVALISTA” - trata-se de pessoa que aceita ser responsável por pagar o financiamento ou o contrato realizado, caso o contratante não efetue o pagamento.
            “FINANCIAMENTO” - trata-se de antecipação de crédito, como forma de adquirir bens e pagar em médio e longo prazo, com o acréscimo de taxas e juros.
            
            2. OBJETO DO CONTRATO
            2.1 O INSTITUTO JEDAX LTDA é uma empresa que fornece crédito para pessoas que buscam adquirir cursos on-line e digitais, bem como, treinamentos e terapias, através de conteúdo moderno e totalmente digital.
            
            3. RESPONSABILIDADES DA CONTRATADA
            3.1 Ao aderir o CONTEÚDO CONTRATADO, tanto o CONTRATANTE, quanto o AVALISTA, declaram estar cientes de que o Instituto Jedax Ltda é responsável, única e exclusivamente, pelo fornecimento de crédito ao CONTRATANTE, não possuindo qualquer tipo de responsabilidade quanto ao CONTEÚDO CONTRATADO, bem como ao acesso do curso adquirido.
            3.2 O CONTRATANTE declara que teve acesso a informações claras e suficientes sobre o CONTEÚDO CONTRATADO diretamente com a INSTITUIÇÃO DE TREINAMENTO, estando, portanto, o Instituto Jedax Ltda isenta de qualquer responsabilidade neste sentido.
            3.3 O Instituto Jedax Ltda não é responsável por qualquer dano ou prejuízo causados em razão de falha na internet, sistema ou servidor utilizado pela INSTITUIÇÃO DE TREINAMENTO ou pelo CONTRATANTE. De igual forma, não possui responsabilidade em eventual incapacidade do CONTRATANTE em fruir do treinamento adquirido.
            3.4 Os dados do CONTRATANTE e do AVALISTA serão tratados com o devido sigilo, em consonância com a legislação vigente, em especial à Lei n. 13.709, de 14 de agosto de 2018 (Lei Geral de Proteção de Dados Pessoais - LGPD), e não serão fornecidos a terceiros, senão para cumprir os objetivos dos serviços contratados.
            A CONTRATADA declara sob as penas da Lei que exerce governança interna de segurança da informação, aplicando os melhores protocolos para o tratamento dos dados do CONTRATANTE e do AVALISTA.
            
            4. RESPONSABILIDADE DO CONTRATANTE
            4.1 O CONTRATANTE se compromete a atualizar prontamente sua conta, seus dados e outras informações pessoais, incluindo seu e-mail, para que seja possível completar suas transações e contatá-lo quando necessário.
            4.2 O CONTRATANTE será responsabilizado civilmente e criminalmente pela veracidade, exatidão e autenticidade dos dados pessoais fornecidos.
            4.3 A identificação do CONTRATANTE envolvido em atos que prejudiquem o bom funcionamento do portal da CONTRATADA acarretará a exclusão do cadastro do mesmo, automática rescisão do presente instrumento e não ressarcimento dos valores pagos, além da comunicação do fato às autoridades competentes, se for o caso.
            4.4 Caberá ao CONTRATANTE, dentro do prazo indicado no quadro resumo entrar em contato com o suporte oficial da INSTITUIÇÃO DE TREINAMENTO e exercer o direito de arrependimento da compra. Este prazo começa a contar a partir da data de efetivação da compra.
            
            5. PAGAMENTO
            5.1 Pela contratação do objeto deste contrato, o CONTRATANTE obriga-se a realizar o pagamento dos valores conforme as datas aprazadas, definidas no Quadro Resumo, sob pena de multa de 1%, acrescidas atualizações monetárias calculada pela variação do índice IGPM/FGV e de 10% de juros ao mês referente ao boleto de entrada e, de 2% de multa, acrescidas atualizações monetária calculada pela variação do índice IGPM/FGV, e juros de 10% ao mês referente às parcelas do financiamento.
            5.2 Se a data de vencimento de qualquer pagamento devido nos termos deste contrato coincidir com um dia não útil, o pagamento deverá ser efetuado no primeiro dia útil subsequente. Entende-se por dias úteis todos os dias, exceto sábados, domingos e feriados bancários nacionais.
            5.3 O valor do CONTEÚDO CONTRATADO poderá ser quitado antecipadamente, não cabendo ao Instituto Jedax Ltda a obrigação de redução proporcional do preço.
            5.4 Em caso de atraso no pagamento superior a 05 (cinco) dias, a INSTITUIÇÃO DE TREINAMENTO poderá, sem qualquer aviso prévio, suspender o acesso ao treinamento e materiais disponibilizados, sem que seja devido ao CONTRATANTE qualquer desconto sobre o período em que ficou sem acesso ao CONTEÚDO.
            
            6. CONTRATADO.
            6.1 Havendo atraso no pagamento de quaisquer parcelas determinadas neste contrato, por prazo superior a 30 (trinta) dias, acarretará vencimento antecipado das parcelas vincendas, sendo permitido Instituto Jedax Ltda a exigir de imediato o pagamento do valor total, conforme indicado no Quadro de Resumo e de todos os encargos contratuais, independentemente de notificação.
            6.2 Além dos encargos mencionados no item anterior, o CONTRATANTE e o AVALISTA serão responsáveis: (i) na fase extrajudicial, pelas despesas de cobrança e honorários advocatícios limitados a 20% (vinte por cento) do valor total devido; e (ii) pelas custas e honorários advocatícios na fase judicial, a serem arbitrados pelo juiz.
            6.3 O CONTRATANTE autoriza, desde já e expressamente, em caráter irrevogável e irretratável, o Instituto Jedax a proceder à compensação de que trata o artigo 368 do Código Civil entre o débito decorrente deste contrato e qualquer crédito do qual seja titular, existente ou que venha a existir.
            6.4 Fica ajustado entre as partes que qualquer tolerância por parte do Instituto Jedax, assim como a não exigência imediata de qualquer crédito, ou o recebimento após o vencimento, antecipado ou tempestivo, de qualquer débito, não constituirá novação, nem modificação dos termos do presente contrato, nem qualquer precedente ou expectativa de direito a ser invocado pelo CONTRATANTE ou AVALISTA, nem tampouco, importará na renúncia ao direito do Instituto Jedax de execução imediata.
            
            7. AVALISTA
            7.1 O aval é constituído a partir da assinatura do presente contrato, obrigando-se o AVALISTA, na qualidade de devedor e principal pagador, solidariamente responsável com o CONTRATANTE, por todas e quaisquer obrigações assumidas junto o Instituto Jedax Ltda, sendo garantido por aval até o limite de 100% (cem por cento) do saldo devedor.
            7.2 O aval aqui constituído é prestado pelo AVALISTA em caráter irrevogável e irretratável e será automaticamente liberado quando este contrato for integralmente quitado. Nenhuma objeção ou oposição arguida pelo CONTRATANTE poderá ser admitida ou invocada pelo AVALISTA com o fito de escusar-se do cumprimento das obrigações estabelecidas neste contrato.
            7.3 Até a integral liquidação de todas as obrigações oriundas deste contrato, o CONTRATANTE e o AVALISTA se comprometem a manter as declarações prestadas sempre corretas e verdadeiras, obrigando-se a comprovar tal situação no prazo de 48 (quarenta e oito) horas a contar da solicitação feita pelo Instituto Jedax originário ou endossatário, mediante o envio das certidões e dos documentos comprobatórios correspondentes que forem necessários.
            
            8. DIREITO DE ARREPENDIMENTO
            8.1 Ao CONTRATANTE é assegurado o direito de se arrepender da compra realizada no prazo estipulado no quadro resumo contados a partir da data da efetivação da compra, sendo os valores pagos integralmente restituídos. É vedado ao AVALISTA exercer o direito de arrependimento.
            8.2 Para exercer o direito de arrependimento da compra realizada, o CONTRATANTE deverá entrar em contato direto com a INSTITUIÇÃO DE TREINAMENTO.
            
            9. RESCISÃO CONTRATUAL
            9.1 Decorrido o prazo de arrependimento, o CONTRATANTE deverá solicitar a rescisão do contrato diretamente à INSTITUIÇÃO DE TREINAMENTO, cabendo tão somente a ela, optar ou não, em proceder com o pedido de rescisão. O Instituto Jedax não receberá diretamente pedidos de cancelamento realizados pelo CONTRATANTE.
            
            10. LEI GERAL DE PROTEÇÃO DE DADOS
            10.1 A CONTRATADA, por si e por seus colaboradores, obriga-se a atuar no presente Contrato observando a Legislação vigente sobre Proteção de Dados Pessoais e as determinações de órgãos reguladores/fiscalizadores sobre a matéria, em especial a Lei 13.709/2018, além das demais normas e políticas de proteção de dados de cada país onde houver qualquer tipo de tratamento dos dados e declara ter plena ciência de que lhe é vedado, sob qualquer hipótese ou pretexto, revelar, utilizar, transferir ou ceder, de qualquer forma, as Informações tratadas como confidenciais.
            10.2 A CONTRATADA garante que realiza o tratamento adequado, nos termos da LGPD, dos dados e informações recebidos em decorrência deste Contrato, mantendo sua confidencialidade e se comprometendo a tomar todas as medidas técnicas e organizacionais para garantir a segurança necessária para protegê-los de uso indevido, perda ou revelação não autorizada ou ilícita. A CONTRATADA se compromete, ainda, a: (i) usar os dados exclusivamente para os propósitos deste contrato; e (ii) imediatamente comunicar a outra Parte na ocorrência de evento que coloque em risco a segurança dos dados coletados e tratados em decorrência deste contrato.
            
            11. DISPOSIÇÕES GERAIS
            11.1 Caso alguma disposição deste contrato venha a ser considerada ilegal, inexequível ou nula, as demais disposições permanecerão válidas. Nesta hipótese, os signatários de comum acordo, deverão alterar este contrato, com o objetivo de torná-la legal e exequível, ao mesmo tempo preservando seu objetivo, ou se isso não for possível, substituindo-a por outra disposição que seja legal e exequível, e que atinja o mesmo objetivo.
            11.2 O presente contrato é emitido em caráter irrevogável e irretratável.
            11.3 Apesar dos melhores esforços do Instituto Jedax Ltda no sentido de fornecer informações precisas, atualizadas, corretas e completas, ocasionalmente, pode haver informações no site que contenha erros tipográficos, imprecisões ou omissões que possam relacionar-se a descrições de produtos, preços, promoções, ofertas e disponibilidade. O Instituto Jedax Ltda reserva-se ao direito de corrigir quaisquer erros, imprecisões ou omissões, e de alterar ou atualizar informações ou cancelar pedidos caso qualquer informação seja imprecisa, a qualquer momento e sem aviso prévio.
            11.4 O Instituto Jedax Ltda reserva o direito que oferecer créditos e outros serviços ao CONTRATANTE conforme análise de crédito e índice de adimplência.
            11.5 O CONTRATANTE e o AVALISTA declaram, ainda, ter lido previamente o presente contrato e não ter dúvidas sobre qualquer de suas condições. O CONTRATANTE declara também que está na posse de uma via eletrônica deste contrato, sendo considerado título executivo extrajudicial, nos termos do art. 784 do CPC, independente da assinatura de testemunhas, sendo comprovada sua aceitação mediante assinatura eletrônica deste contrato.
            11.5 O presente contrato passa a vigorar entre as partes e produzirá todos os seus efeitos a partir da compensação do pagamento do boleto de entrada.
            
            Itajaí(SC), $data_atual
            
            Campo reservado para assinatura digital

            
        ";

        $pdf->MultiCell(0, 10, $content, 0, 'L');

        $pdf->Output(__DIR__ . '/contrato.pdf', 'F');

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.uni5.net';
            $mail->SMTPAuth = true;
            $mail->Username = 'financeiro@institutojedax.com.br';
            $mail->Password = 'Ijedax@2024';
            $mail->SMTPSecure = 'tls'; // Correção aqui
            $mail->Port = 587;
            $mail->setFrom('financeiro@institutojedax.com.br', 'Financeiro');
            $mail->addAddress($email_contratante, $nome_contratante);
            $mail->addAttachment(__DIR__ . '/contrato.pdf', 'contrato.pdf');
            $mail->Subject = 'Contrato de Prestação de Serviço de Cursos e Treinamentos Online';
            $mail->CharSet = 'UTF-8';

            // Corpo do e-mail personalizado
            $mail->isHTML(true);
            $mail->Body = '
                <html>
                <body>

                <img src="https://form.institutojedax.com.br/img/logo.png" alt="Logo Jedax" width="45%" style="display: block; margin: 0 auto; margin-bottom: 55px;">

                <p>
                <div style="text-align: center;">
                <span style="color: #00B7C3;font-size: 20px;">Confirmação de Assinatura Digital do Contrato</span> <br>
                <span style="color: gray;font-size: 20px;">CEO</span>
                </div>
                <br>
                <br>
                <br>
                    Olá,  ' . $nome_contratante . '  , vi aqui que assinou o seu contrato, maravilha!!! 
                <br>
                <br>
                    Segue uma cópia do seu contrato no anexo deste e-mail.
                <br>
                <br>
                    1º - Pague seu boleto de entrada, se o pagamento foi no cartão o pedido é efetivado em imediato. 
                <br> 
                <br>
                    Assim que o pagamento for compensado pelo banco (pode levar até 2 dias úteis), seu pedido será efetivado.
                <br>
                <br>
                     Att.
                     
                    </p>
                <br>
                <br>
                    <img src="https://form.institutojedax.com.br/img/assinatura.png" alt="Assinatura Digital" width="100%">
                </body>
                </html>
            ';

            $mail->send();
            echo '
            <div style="text-align: center;">
                <div style="display: inline-block; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                    <h2 style="margin-top: 0;">E-mail enviado com sucesso!</h2>
                    <p>O contrato foi enviado para o seu e-mail. Verifique sua caixa de entrada.</p>
                </div>
            </div>';
            
            
            // Redireciona para o checkout correspondente com base no curso selecionado
            if(isset($_POST['curso'])) {
                $curso = $_POST['curso'];
                switch($curso) {
                    case 'CEO':
                         header("refresh:2;url=paymentCEO/index.php");
                        exit();
                    case 'IMER':
                         header("refresh:2;url=paymentIMER/index.php");
                        exit();
                    case 'PROF':
                         header("refresh:2;url=paymentPROF/index.php");
                        exit();
                    default:
                         //Redireciona para uma página de erro caso o curso não seja reconhecido
                         header("Location: error.php");
                        exit();
                }
            } else {
                // Redireciona para uma página de erro se o campo 'curso' não estiver presente no formulário
                header("Location: error.php");
                exit();
            }

        } catch (Exception $e) {
            echo 'Erro ao enviar o e-mail: ' . $mail->ErrorInfo;
        }
    } else {
        echo 'Erro: Informações do formulário incompletas.';
    }
} else {
    echo 'Erro: Método de requisição inválido.';
}






