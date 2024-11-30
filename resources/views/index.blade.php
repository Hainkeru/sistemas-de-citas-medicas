<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Sistema de reserva de citas</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">luism10pardo@gmail.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+57 305 3437092</span></i>
        </div>

      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{url('/')}}" class="logo d-flex align-items-center me-auto">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 class="sitename">Dr. Luis Miguel</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">Inicio<br></a></li>
            <li><a href="#about">Acerca de mí</a></li>
            <li><a href="#departments">Servicios</a></li>
            <li><a href="#doctors">Doctores</a></li>
            <li><a href="#contact">Contacto</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="cta-btn d-none d-sm-block" href="{{url('login')}}">Ingresar</a>

      </div>

    </div>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <img src="assets/img/doctors/agenda_tu_cita.png" alt="" data-aos="fade-in">

      <div class="container position-relative">

        <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
          <h2>Bienvenido</h2>
          <p>al centro de atencion del Dr. Luis Miguel.</p>
        </div><!-- End Welcome -->

        <div class="content row gy-4">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
              <h3>Reserva tu cita medica</h3>
              <div class="text-center">
                <a href="{{url('/admin')}}" class="more-btn"><span>Reservar ahora</span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="d-flex flex-column justify-content-center">
              <div class="row gy-4">

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                    <i class="bi bi-clipboard-data"></i>
                    <h4>Atencion mas flexible</h4>
                    <p>Podemos atender virtual o presencialmente, tu decides como quieres que te ayudemos.</p>
                  </div>
                </div><!-- End Icon Box -->


              </div>
            </div>
          </div>
        </div><!-- End  Content-->

      </div>

    </section><!-- /Hero Section -->

    <br><br>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Calendario de atencion doctores</h3>
              <br>
              <div class="col-md-3">
                <label for="" class="form-label">Consultorio:</label>
                <select name="consultorio_id" id="consultorio_select" class="form-control">
                  <option value="">Seleccione un consultorio...</option>
                  @foreach($consultorios as $consultorio)
                  <option value="{{$consultorio->id}}">{{$consultorio->nombre}} - {{$consultorio->ubicacion}}</option>
                  @endforeach

                </select>
              </div>
            </div>
            <div class="card-body">
              <script>
                $('#consultorio_select').on('change', function() {
                  var consultorio_id = $('#consultorio_select').val();
                  var url = "{{route('cargar_datos_consultorios', ':id')}}"
                  url = url.replace(':id', consultorio_id);
                  if (consultorio_id) {
                    $.ajax({
                      url: url,
                      type: 'GET',
                      success: function(data) {
                        $('#consultorio_info').html(data);
                      },
                      error: function() {
                        alert('error al obtener el id del consultorio')
                      }
                    });
                  } else {
                    $('#consultorio_info').html('');
                  }
                });
              </script>
              <div id="consultorio_info">

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4 gx-5">

          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
          </div>

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>Acerca de mí</h3>
            <p>
              Hola 👋🏽, soy Luis Miguel Piña Pardo!, soy una persona profesional con habilidades propias de su carrera, que esta comprometido con las diversas problemáticas Sociales, Culturales, Politicas, y enfocada en los ámbitos de Salud y Bienestar de las personas y/o comunidades, siempre con la intención clara de orientar a los individuos en su desarrollo personal, la construcción de mecanismos o herramientas de afrontamiento que le permita la asimilación, aceptación y adaptación de los cambios dispares que puede llegar a presentar su entorno, su ambiente, su atmósfera, aplicando los diferentes conocimientos específicos de las distintas áreas de la Psicología.
            </p>

          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

      <div class="container" style="align-items: center;" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-12"">

          <div class=" col-lg-3 col-md-6 d-flex flex-column align-items-center">
          <i class="fa-solid fa-user-doctor"></i>
          <div class="stats-item">
            <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter">Horas</span>
            <p>Horas atencion virtual</p>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
          <i class="fa-regular fa-hospital"></i>
          <div class="stats-item">
            <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
            <p>Horas atencion presencial</p>
          </div>
        </div><!-- End Stats Item -->


      </div>

      </div>

    </section><!-- /Stats Section -->


    <!-- Appointment Section -->
    <!-- <section id="appointment" class="appointment section">

      <!-- Section Title -->
    <!-- <div class="container section-title" data-aos="fade-up">
        <h2>Appointment</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

    <!-- <div class="container" data-aos="fade-up" data-aos-delay="100">

        <form action="forms/appointment.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" required="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="datetime-local" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" required="">
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="department" id="department" class="form-select" required="">
                <option value="">Select Department</option>
                <option value="Department 1">Department 1</option>
                <option value="Department 2">Department 2</option>
                <option value="Department 3">Department 3</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="doctor" id="doctor" class="form-select" required="">
                <option value="">Select Doctor</option>
                <option value="Doctor 1">Doctor 1</option>
                <option value="Doctor 2">Doctor 2</option>
                <option value="Doctor 3">Doctor 3</option>
              </select>
            </div>
          </div> -->

    <!-- <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
          </div>
          <div class="mt-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
            <div class="text-center"><button type="submit">Make an Appointment</button></div>
          </div>
        </form>

      </div>  -->

    <!-- </section>/Appointment Section -->



    <!-- Departments Section -->
    <section id="departments" class="departments section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Servicios</h2>
        <p>Puedo ayudarte con:</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#departments-tab-1">Terapia individual</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-2">Terapia de pareja y familiar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-3">Terapia de grupo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-4">Intervención en crisis</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-5">Asesoramiento</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="departments-tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Terapia individual</h3>
                    <p>Sesiones confidenciales para abordar problemas personales, como ansiedad, depresión, estrés, dificultades en las relaciones, etc.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="departments-tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Terapia de pareja y familiar</h3>
                    <p>Ayuda a mejorar la comunicación, resolver conflictos y fortalecer los vínculos en las relaciones.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-2.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="departments-tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Terapia de grupo</h3>
                    <p>Proporciona un espacio seguro para compartir experiencias y aprender de otros con problemas similares.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-3.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="departments-tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Intervención en crisis</h3>
                    <p>Brinda apoyo inmediato en situaciones de crisis, como pérdidas, traumas o eventos estresantes.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-4.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="departments-tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Asesoramiento</h3>

                    <p> Ofrece orientación y apoyo en diversas áreas de la vida, como la educación, la salud y el desarrollo personal.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Departments Section -->

    <!-- Doctors Section -->
    <section id="doctors" class="doctors section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Doctores</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/Foto.jpeg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Luis Miguel Piña</h4>
                <span>Psicologo</span>
                <p>Estoy aquí para ayudarte</p>
              </div>
            </div>
          </div><!-- End Team Member -->



        </div>

      </div>

    </section><!-- /Doctors Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contacto</h2>
      </div><!-- End Section Title -->

      <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border:0; width: 100%; height: 300px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125223.21102298936!2d-74.34362243750002!3d11.244826699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ef4f506cf27419d%3A0x5c450271ffd02883!2sCentro%20hist%C3%B3rico%20santa%20marta!5e0!3m2!1ses-419!2sco!4v1731637245247!5m2!1ses-419!2sco" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div><!-- End Google Maps -->

    </section>
  </main>

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Dr. Luis Miguel</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Santa Marta - Magdalena</p>
            <p>Colombia</p>
            <p class="mt-3"><strong>Telefono:</strong> <span>+57 305 3437092</span></p>
            <p><strong>Email:</strong> <span>luism10pardo@gmail.com</span></p>
          </div>
          <!-- <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div> -->
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>