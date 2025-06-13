<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Medico</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="landing/img/logo.jpg" rel="icon">
  <link href="landing/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="landing/vendor/aos/aos.css" rel="stylesheet">
  <link href="landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="landing/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <!-- Header -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <!-- Logo -->
      <a href="index.html" class="logo d-flex align-items-center">
  <img src="landing/img/logo.jpg" alt="Medico Logo" class="img-fluid" style="height: 50px;">
  <!-- Optional fallback text: <span class="ms-2 d-none d-lg-inline">Medico</span> -->
</a>


      <!-- Navigation Menu -->
      <nav id="navmenu" class="navmenu mx-auto">
        <ul class="d-flex justify-content-center align-items-center mb-0">
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
        </ul>
      </nav>

      <!-- Login & Register Buttons -->
      <div class="auth-buttons d-flex">
  <a href="{{ route('login') }}" class="btn btn-primary btn-sm me-2 rounded-pill px-3">Login</a>
  <a href="{{ route('register') }}" class="btn btn-primary btn-sm rounded-pill px-3">Register</a>
</div>


    </div>
  </header>

  <!-- Main Content -->
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
              <h1 class="mb-4">
                Medico<br>
                <span class="accent-text">Health Care</span>
              </h1>
              <p class="mb-4 mb-md-5">
                We’ve always had one focus in mind: Provide high-quality products, clinically proven and condition-specific, that are not only good for you but deliver real results to help you reach your health and vitality goals.
              </p>
              <div class="hero-buttons">
                <a href="{{ route('register') }}" class="btn btn-primary me-0 me-sm-2 mx-1">Get Started</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
              <img src="landing/img/page.png" alt="Hero Image" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 align-items-center justify-content-between">
          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            <span class="about-meta">MORE ABOUT US</span>
            <h2 class="about-title">Medico</h2>
            <p class="about-description">We’ve always had one focus in mind: Provide high-quality products, clinically proven and condition-specific, that are not only good for you but deliver real results to help you reach your health and vitality goals.</p>
            <div class="row feature-list-wrapper">
              <div class="col-md-6">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Lorem ipsum dolor sit amet</li>
                  <li><i class="bi bi-check-circle-fill"></i> Consectetur adipiscing elit</li>
                  <li><i class="bi bi-check-circle-fill"></i> Sed do eiusmod tempor</li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Incididunt ut labore et</li>
                  <li><i class="bi bi-check-circle-fill"></i> Dolore magna aliqua</li>
                  <li><i class="bi bi-check-circle-fill"></i> Ut enim ad minim veniam</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">
              <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                <img src="landing/img/two.jpg" class="img-fluid main-image rounded-4">
                <img src="landing/img/medic.jpg" class="img-fluid small-image rounded-4">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="landing/vendor/php-email-form/validate.js"></script>
  <script src="landing/vendor/aos/aos.js"></script>
  <script src="landing/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="landing/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="landing/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="landing/js/main.js"></script>

</body>

</html>
