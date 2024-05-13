<?php

  $db_name = "institutojedax";
  $db_host = "mysql.institutojedax.com.br";
  $db_user = "institutojedax";
  $db_pass = "Bd2024";

  $conn = new PDO("mysql:dbname=". $db_name .";host=". $db_host, $db_user, $db_pass);

  // Habilitar erros PDO
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);