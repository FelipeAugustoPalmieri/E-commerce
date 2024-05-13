<?php 

include_once("templates/header.php");



?>


<body>

 

  <main class="main">

    <!-- Page Title -->
    <!-- End Page Title -->

    <!-- Contact Section -->
    

    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              
            <p class="mb-0">VENHA</p>
              <h1>ENTRE EM CONTATO CONOSCO</h1>
              <p class="mb-0">Nossas realizações começam em nosso sistema emocional.</p>
              <p class="mb-0">Entre em contato através deste e nos sentiremos privilegiados em lhe atender.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Voltar</a></li>
            <li class="current">Contato</li>
          </ol>
        </div>
      </nav>
    </div>
    
    <section id="contact" class="contact section">
    <div class="row-gy">
    <div class="info-container">
      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
        <i class="bi bi-telephone flex-shrink-0"></i>
        <div>
          <h3>Telefone de contato</h3>
          <p>+55 47 9 3381-9532</p>
        </div>
      </div><!-- End Info Item -->
      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
        <i class="bi bi-envelope flex-shrink-0"></i>
        <div>
          <h3>Email de contato</h3>
          <p>contato@institutojedax.com.br</p>
        </div>
      </div><!-- End Info Item -->
    </div>

    
      <!-- <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border:0; width: 100%; height: 300px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>  -->
     
      <div class="containerC" data-aos="fade-up" data-aos-delay="100">
  <!-- End Info Container -->
    
    <div class="col-lg-9">
      <form action="formsContact/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200" accept-charset="UTF-8">
        <div class="row gy-4">
          <div class="col-md-7">
            <input type="text" name="name" class="form-control" placeholder="Digite seu nome" required="">
          </div>
          <div class="col-md-7">
            <input type="email" class="form-control" name="email" placeholder="Digite seu E-mail" required="">
          </div>
          
          <div class="col-md-7">
            <input type="text" class="form-control" name="phone" placeholder="Digite seu Telefone" required="">
          </div>
          
          <div class="col-md-7">
            <input type="text" class="form-control" name="message" placeholder="Digite sua mensagem" required="">
          </div>

         
                <div class="loading">Loading</div>
                <div class="error-message">Algo deu errado</div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
                <button type="submit">Enviar Mensagem</button>
        

        </div><!-- End Contact Form -->
      </form>
    </div>
  </div>
</div>
</section>

   <!-- /Contact Section -->

  </main>




  

</body>

</html>

<?php 

include_once("templates/footer.php")

?>