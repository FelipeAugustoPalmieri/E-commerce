<?php 

  include_once("templates/header.php")

?>
<html>
<body>

  

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Cursos</h1>
              <p class="mb-0">Ajudamos você a se encontrar</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Cursos</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Courses List Section -->
    <section id="courses-list" class="section courses-list">

      <div class="container">

        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="course-item">
              <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category">CEO</p>
                  <p class="price">$169</p>
                </div>

                <h3><a href="course-details.php">
                  Controle Emocional Orientado</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-1-2.jpg" class="img-fluid" alt="">
                    <a href="" class="trainer-link">José Domingues Tolfo</a>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bi bi-person user-icon"></i>&nbsp;50
                    &nbsp;&nbsp;
                    <i class="bi bi-heart heart-icon"></i>&nbsp;65
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

          
          </div> <!-- End Course Item-->

        </div>

      </div>

    </section><!-- /Courses List Section -->

  </main>

 

</body>

</html>

<?php 

  include_once("templates/footer.php")

?>