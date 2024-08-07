<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="../vendor/date-picker/css/datepicker.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="inner-pay">
        <div class="avartar">
            <img src="images/avartar.png" alt="">
        </div>
        <h3 class="mtp">Método de Pagamento</h3>
        <br>
        <br>

        <div class="payment-block">
            <div class="payment-item active" onclick="selectPayment('boleto')">
                <div class="payment-logo">
                    <img src="images/iconPay.png" alt="">
                </div>
                <div class="payment-content">
                    <p>Boleto/Pix</p>
                </div>
            </div>
            <div class="payment-item active" onclick="selectPayment('cartao')">
                <div class="payment-logo">
                    <img src="images/iconPay.png" alt="">
                </div>
                <div class="payment-content">
                    <p>Cartão de Crédito</p>
                </div>
            </div>
        </div>

        <!-- Selects and Forms for Payment Options -->
        <div id="forms">
            <!-- Boleto/Pix Form -->
            <div id="boleto-form" style="display: none;">
                <h2>Informações para Boleto/Pix</h2>
                <br>
                <form id="form-boleto" method="post" action="process_payment.php">
                    <input type="hidden" name="payment_method" value="boleto">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required><br>
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" required><br>
                    <label for="parcelas">Parcelas:</label>
                    <select id="boleto-parcelas" name="parcelas" onchange="updateTotal('boleto')">
                        <option value="1">1x - R$ 4.079,76</option>
                        <option value="2">2x - R$ 2.162,27</option>
                        <option value="3">3x - R$ 1.441,51</option>
                        <option value="4">4x - R$ 1.080,90</option>
                        <option value="5">5x - R$ 865,91</option>
                        <option value="6">6x - R$ 720,76</option>
                        <option value="7">7x - R$ 617,79</option>
                        <option value="8">8x - R$ 540,57</option>
                        <option value="9">9x - R$ 480,51</option>
                        <option value="10">10x - R$ 432,46</option>
                        <option value="11">11x - R$ 392,14</option>
                        <option value="12">12x - R$ 360,38</option>
                    </select>
                    <div id="total-boleto">Total: R$ 4.079,76</div>
                    <button type="submit">Gerar Boleto</button>
                </form>
            </div>

            <!-- Cartão de Crédito Form -->
            <div id="cartao-form" style="display: none;">
                <h2>Informações do Cartão de Crédito</h2>
                <br>
                <form id="form-cartao" method="post" action="process_payment.php">
                    <input type="hidden" name="payment_method" value="cartao">
                    <label for="numero_cartao">Número do Cartão:</label>
                    <input type="text" id="numero_cartao" name="numero_cartao" required><br>
                    <label for="vencimento">Vencimento:</label>
                    <input type="text" id="vencimento" name="vencimento" required><br>
                    <label for="codigo_verificador">Código Verificador:</label>
                    <input type="text" id="codigo_verificador" name="codigo_verificador" required><br>
                    <label for="parcelas">Parcelas:</label>
                    <select id="cartao-parcelas" name="parcelas" onchange="updateTotal('cartao')">
                        <option value="1">1x - R$ 4.079,76</option>
                        <option value="2">2x - R$ 2.039,88</option>
                        <option value="3">3x - R$ 1.359,92</option>
                        <option value="4">4x - R$ 1.019,94</option>
                        <option value="5">5x - R$ 815,95</option>
                        <option value="6">6x - R$ 679,96</option>
                        <option value="7">7x - R$ 582,82</option>
                        <option value="8">8x - R$ 509,97</option>
                        <option value="9">9x - R$ 453,31</option>
                        <option value="10">10x - R$ 407,98</option>
                        <option value="11">11x - R$ 370,89</option>
                        <option value="12">12x - R$ 339,98</option>
                    </select>
                    <div id="total-cartao">Total: R$ 4.079,76</div>
                    <button type="submit">Pagar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- External Scripts -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/jquery.steps.js"></script>
    <script src="../vendor/date-picker/js/datepicker.js"></script>
    <script src="../vendor/date-picker/js/datepicker.en.js"></script>
    <script src="../js/main.js"></script>

    <script>
        function selectPayment(paymentMethod) {
            document.getElementById('cartao-form').style.display = 'none';
            document.getElementById('boleto-form').style.display = 'none';

            if (paymentMethod === 'cartao') {
                document.getElementById('cartao-form').style.display = 'block';
            } else if (paymentMethod === 'boleto') {
                document.getElementById('boleto-form').style.display = 'block';
            }
        }

        function updateTotal(paymentMethod) {
            const parcelas = document.getElementById(`${paymentMethod}-parcelas`).value;
            const optionText = document.getElementById(`${paymentMethod}-parcelas`).selectedOptions[0].textContent;

            let valorTotal;
            if (parcelas === '1') {
                valorTotal = 4079.76;
            } else {
                const parcelaValue = parseFloat(optionText.split(' - R$ ')[1]);
                valorTotal = parcelaValue;
            }

            document.getElementById(`total-${paymentMethod}`).textContent = `Total: ${optionText}`;
        }
    </script>
</body>

</html>