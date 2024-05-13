
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
    <form action="process.php" method="POST" id="wizard">
        <input type="hidden" name="type" value="login">

        <h4></h4>
        <section>
            <div class="inner-login">
                <a href="#" class="avartar">
                    <img src="images/avartar.png" alt="">
                </a>
                <div class="form-row-login">
    <div class="form-holder">
        <label for="name">Nome:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome completo" required> 
        <i class="zmdi zmdi-account-circle"></i>
    </div>
</div>

                <div class="form-row-login">
                    <div class="form-holder">
                    <label for="email">CPF ou CNPJ:</label>
                      <input type="text" class="form-control" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}|\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}" id="cnpj_cpf" name="cnpj_cpf" placeholder="Digite seu CPF ou CNPJ" required>
                      <i class="zmdi zmdi-accounts-list"></i>
                    </div>
                </div>
                <div class="form-row-login">
                    <div class="form-holder">
                    <label for="email">Fone:</label>
                      <input type="tel" class="form-control"  id="phone" name="phone" placeholder="Digite seu telefone" required>
                        <i class="zmdi zmdi-phone small"></i>
                    </div>
                </div>
                <div class="form-row-login">
                    <div class="form-holder">
                    <label for="email">E-mail:</label>
                      <input type="email" class="form-control" id="email" name="email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" placeholder="Digite seu e-mail" required>
                        <i class="zmdi zmdi-email small"></i>
                    </div>
                </div>
                <div class="form-row-login">
                    <div class="form-holder">
                    <label for="text">Rua:</label>
                    <input type="text" class="form-control" id="road" name="road" placeholder="Ex:   Noruega, 840" required>
                    <i class="zmdi zmdi-store"></i>
                    </div>
                </div>
                <div class="form-row-login">
                    <div class="form-holder">
                    <label for="text">Bairro:</label>
                    <input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="Digite seu bairro" required>
                    <i class="zmdi zmdi-gps-dot"></i>
                    </div>
                </div>
                <div class="form-row-login">
                    <div class="form-holder">
                    <label for="text">Cidade</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Digite sua cidade" required>
                    <i class="zmdi zmdi-pin-drop"></i>
                    </div>
                </div>
                <div class="form-row-login">
                    <label for="text">Estado:</label>
                        <select id="state" name="state" required>
                            <option value="">Selecione</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                    </select>

                    <div class="form-row-login">
                    <label for="text">Escolha do Curso:</label>
                        <select id="curso" name="curso" required>
                            <option value="">Selecione</option>
                            <option value="CEO">CEO - Controle Emocional Orientado</option>
                            <option value="IMER">Imersão</option>
                            <option value="PROF">CEO para Professores</option>
                    </select>

                    </div>
                    
                </div>
                <input type="checkbox" id="aceitar_termos" name="aceitar_termos" required>
                    <label for="aceitar_termos">Li e aceito os
                        <a href="contrato/contrato-consumidor.pdf" style="color: #0056b3;" target="_blank">termos de condições</a>.
                </label> 
                <div class="submit-button">
                    <input type="submit" value="Inscreva-se">
                </div>
            </div>
        </section>
    </form>
</div>

<!-- DATE-PICKER -->
<script src="vendor/date-picker/js/datepicker.js"></script>
<script src="vendor/date-picker/js/datepicker.en.js"></script>

</body>
</html>
