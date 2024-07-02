<?php 

  include_once("templates/header.php");
  
?>
<html>
<body>

  
<main class="main">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">

<!-- Page Title -->
<div class="page-title-1" data-aos="fade">
  
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 id="title">Inscrição</h1>
           <p class="typed-text">escolha o programa que mais combina com você</p>     
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>

      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->

<br>
<br>
<br>
<br>

    <!-- Courses List Section -->
    <section id="courses-list" class="section courses-list">
  <div class="container">
    <div class="row">

    <!-- primeiro item -->
    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
       <a href="CEO.php" class="course-item-ceo">
        <div class="course-item-content">
           <img src="assets/img/course-1.jpg" style="width: 350px; height: 350px;" class="img-fluid-ceo" alt="...">
          <div class="course-content-ceo">
             <h3>CEO - Controle Emocional Orientado</h3>
             <h4>A partir R$ 339,98 mensais</h4>
              <p>Clique aqui para se inscrever</p>
         </div>
        </div>
     </a>
  </div>

      <!-- segundo item -->
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
       <a href="CEOprof.php" class="course-item-ceo">
        <div class="course-item-content">
           <img src="assets/img/prof.jpeg" class="img-fluid-ceo" alt="...">
          <div class="course-content-ceo">
             <h3>CEO para Professores</h3>
             <h4>A partir R$ 339,98 mensais</h4>
              <p>Clique aqui para se inscrever</p>
         </div>
        </div>
     </a>
  </div>

      <!-- terceiro item -->
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
       <a href="CEOimer.php" class="course-item-ceo">
        <div class="course-item-content">
           <img src="assets/img/imersao.jpeg" class="img-fluid-ceo" alt="...">
          <div class="course-content-ceo">
             <h3>Imersão</h3>
             <h4>Preço sob-consulta</h4>
              <p>Clique aqui para se inscrever</p>
         </div>
        </div>
     </a>
  </div>



    </div>
  </div>
</section>

 
  </main>

<br>
<br>
<br>
<br>
<br>


</body>

</html>

<?php 

  include_once("templates/footer.php")

?>