
<?php 

  include_once('templates/header.php')

?>

<html>

<head>
    <style>
        /* Estilos CSS exclusivos para esta página */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        main {
            margin-top: 50px;
            text-align: center;
            padding: 20px 40px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Adiciona sombra */
        }

        .novo {
            color: #5fcf80;
            font-size: 50px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .novo1 {
            color: #555;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .novo2 {
            color: #777;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 10px;
        }



    </style>
</head>

<body>

    <main class="main">

        <h1 class="novo">Parabéns !!</h1>
        <br>
        <h3 class="novo1">Sua inscrição foi feita com sucesso</h3>
        <p class="novo2">A sua cobrança foi ou será enviada com o seu email e telefone que foi fornecido</p>
        <p class="novo2">Entraremos em contato com você auxiliando ao decorrer do programa</p>

    </main>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>
<?php 

    include_once('templates/footer.php')

?>