<?php 

include_once("templates/header.php");



?>


<body>
<head>
<meta charset="UTF-8">
</head>
  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>RESPONDA E DESCUBRA</h1>
              <p class="mb-0">Se você chegou até aqui é sinal que alguém pensou em você e te convidou para participar ou o universo está atendendo algum desejo do seu coração, responda as perguntas a seguir e receba orientações valiosíssimas que trarão resultados surpreendentes para sua vida.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Voltar</a></li>
            <li class="current">Teste emocional</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border:0; width: 100%; height: 300px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>End Google Maps -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row-gy-4">

          <!-- <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div> -->
            
            <!-- End Info Item -->

            <!-- <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55</p>
              </div>
            </div> -->
            
            <!-- End Info Item -->

            <!-- <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>info@example.com</p>
              </div>
            </div> 
            
            End Info Item 

          </div> -->

          <div class="col-lg-8">
          <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200" accept-charset="UTF-8">
        <div class="row gy-4">

            <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Nome" required="">
            </div>

            <div class="col-md-6 ">
                <input type="text" class="form-control" name="phone" placeholder="Telefone" required="">
            </div>

            <div class="col-md-6 ">
                <input type="email" class="form-control" name="email" placeholder="E-mail" required="">
            </div>

            <div class="col-md-6 ">
                <input type="date" class="form-control" name="dob" placeholder="Data de Nascimento" required="">
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control" name="address" placeholder="Cidade e Estado que mora" required="">
            </div>

            <div class="col-md-12">
                <p>1 - Seu relacionamento (casamento, namoro, divórcio) está:</p>
                <input type="checkbox" name="relacionamento" id="relacionamento" value="Ótimo"> Ótimo<br>
                <input type="checkbox" name="relacionamento" id="relacionamento" value="Bom"> Bom<br>
                <input type="checkbox" name="relacionamento" id="relacionamento" value="Conflitante"> Conflitante<br>
                <input type="checkbox" name="relacionamento" id="relacionamento" value="Péssimo"> Péssimo<br>
                <input type="checkbox" name="relacionamento" id="relacionamento" value="Neutro"> Neutro<br>
            </div>

            <div class="col-md-12">
                <p>2 - Suas finanças estão:</p>
                <input type="checkbox" name="financas" id="financas" value="Excelente"> Excelente<br>
                <input type="checkbox" name="financas" id="financas" value="Péssimas"> Péssimas<br>
                <input type="checkbox" name="financas" id="financas" value="Satisfatória"> Satisfatória<br>
                <input type="checkbox" name="financas" id="financas" value="Sobrevivendo"> Sobrevivendo<br>
            </div>

            <div class="col-md-12">
                <p>3 - Seu relacionamento familiar está:</p>
                <input type="checkbox" name="familiar" id="familiar" value="Bom"> Bom<br>
                <input type="checkbox" name="familiar" id="familiar" value="Algum parente depende de mim"> Algum parente depende de mim<br>
                <input type="checkbox" name="familiar" id="familiar" value="Péssimo (não tenho contato)"> Péssimo (não tenho contato)<br>
                <input type="checkbox" name="familiar" id="familiar" value="Conflitos"> Conflitos<br>
                <input type="checkbox" name="familiar" id="familiar" value="Neutro, ninguem se me na minha vida"> Neutro, ninguem se me na minha vida<br>
            </div>

            <div class="col-md-12">
                <p>4 - Como está sua saúde física?</p>
                <input type="checkbox" name="saudeFisica" id="saudeFisica" value="Excelente"> Excelente<br>
                <input type="checkbox" name="saudeFisica" id="saudeFisica" value="Tenho doença crônica"> Tenho doença crônica<br>
                <input type="checkbox" name="saudeFisica" id="saudeFisica" value="Oscila entre estar bem e doente"> Oscila entre estar bem e doente<br>
                <input type="checkbox" name="saudeFisica" id="saudeFisica" value="Péssima"> Péssima<br>
            </div>

            <div class="col-md-12">
                <p>5 - Como está sua saúde emocional?</p>
                <input type="checkbox" name="saudeEmocional" id="saudeEmocional" value="Excelente"> Excelente<br>
                <input type="checkbox" name="saudeEmocional" id="saudeEmocional" value="Oscilante (Momentos bem outros ruim"> Oscilante (Momentos bem outros ruim<br>
                <input type="checkbox" name="saudeEmocional" id="saudeEmocional" value="Péssima"> Péssima<br>
            </div>

            <div class="col-md-12">
                <p>6 - Você sente algum trauma de relacionamento?</p>
                <input type="checkbox" name="trauma" id="trauma" value="Sim"> Sim<br>
                <input type="checkbox" name="trauma" id="trauma" value="Não"> Não<br>
            </div>

            <div class="col-md-12">
                <p>7 - Você tem sentimento de Abandono?</p>
                <input type="checkbox" name="abandono" id="abandono" value="Sim"> Sim<br>
                <input type="checkbox" name="abandono" id="abandono" value="Não"> Não<br>
            </div>

            <div class="col-md-12">
                <p>8 - Você tem sentimento de rejeição?</p>
                <input type="checkbox" name="rejeicao" id="rejeicao" value="Sim"> Sim<br>
                <input type="checkbox" name="rejeicao" id="rejeicao" value="Não"> Não<br>
            </div>

            <div class="col-md-12">
                <p>9 - Você tem sentimento de ter sido abusada?</p>
                <input type="checkbox" name="abusada" id="abusada" value="Sim"> Sim<br>
                <input type="checkbox" name="abusada" id="abusada" value="Não"> Não<br>
            </div>

            <div class="col-md-12">
                <p>10 - Você carrega sentimento de Perda?</p>
                <input type="checkbox" name="perda" id="perda" value="Sim"> Sim<br>
                <input type="checkbox" name="perda" id="perda" value="Não"> Não<br>
            </div>

            <div class="col-md-12">
                <p>11 - Você tem sentimentos de depressão?(Aborrecimento, tristeza profunda, estar rejeitada, angustia, perda do sentido de viver)</p>
                <input type="checkbox" name="depressao" id="depressao" value="Sim"> Sim<br>
                <input type="checkbox" name="depressao" id="depressao" value="Não"> Não<br>
            </div>

            <div class="col-md-12">
                <p>12 - Você tem sentimentos de Ansiedade? (medo de perder algo, de não dar certo seus sonhos, passar necessidades, ficar só)</p>
                <input type="checkbox" name="ansiedade" id="ansiedade" value="Sim"> Sim<br>
                <input type="checkbox" name="ansiedade" id="ansiedade" value="Não"> Não<br>
            </div>

            <div class="col-md-12">
                <p>13 - Você tem sentimentos de ser indecisa?</p>
                <input type="checkbox" name="indeciso" id="indeciso" value="Sim"> Sim<br>
                <input type="checkbox" name="indeciso" id="indeciso" value="Não"> Não<br>
            </div>

            <div class="col-md-12">
                <p>14 - Você tem sentimentos de medo? (perder algo, não dar conta de fazer algo, ser reprovada, ser humilhada)</p>
                <input type="checkbox" name="medo" id="medo" value="Sim"> Sim<br>
                <input type="checkbox" name="medo" id="medo" value="Não"> Não<br>
            </div>

            <div class="col-md-12">
                <p>15 - Você carrega sentimento de raiva, desejo de vingança?</p>
                <input type="checkbox" name="vinganca" id="vinganca" value="Sim"> Sim<br>
                <input type="checkbox" name="vinganca" id="vinganca" value="Não"> Não<br>
            </div>

            <div class="col-md-12">
                <p>16 - Qual seu nível de conhecimento sobre saúde emocional?</p>
                <input type="checkbox" name="conhecimento" id="conhecimento" value="Muito conhecimento"> Muito conhecimento<br>
                <input type="checkbox" name="conhecimento" id="conhecimento" value="Pouco conhecimento"> Pouco conhecimento<br>
                <input type="checkbox" name="conhecimento" id="conhecimento" value="Não tenho nada de conhecimento"> Não tenho nada de conhecimento<br>
            </div>

            <div class="col-md-12">
            <p>17 - Descreva neste campo o que não conseguiu expressar nas respostas marcadas, acrescente pontos que precisa melhorar ou deseja conhecer.</p>
                <input type="text" class="form-control" name="expressar" id="expressar" placeholder="Expresse o que você deseja" required>
            </div>

            <div class="col-md-12">
            <p>18 - Você já fez algum tipo de terapia ou mentoria? Se fez qual?</p>
                <input type="text" class="form-control" name="terapia" id="terapia" placeholder="" required>
            </div>
            

                                                                                    

            <div class="col-md-12 text-center">
                <div class="loading">Loading</div>
                <div class="error-message">Algo deu errado</div>
                <div class="sent-message">Your message has been sent. Thank you!</div>

                <button type="submit">Enviar Mensagem</button>
            </div>

        </div>
    </form>
</div><!-- End Contact Form -->


        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>




  

</body>

</html>

<?php 

include_once("templates/footer.php")

?>