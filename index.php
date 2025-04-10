<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>EcoPonto Praia Grande</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #26a69a;
      --primary-hover: #1e8e86;
      --bg-light: #f0fdfc;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      background-color: var(--bg-light);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
    }

    nav {
      background-color: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .nav-link {
      color: var(--primary-color) !important;
      font-weight: 500;
    }

    .nav-link:hover {
      color: var(--primary-hover) !important;
    }

    .hero {
      background: linear-gradient(135deg, var(--primary-color), #80cbc4);
      color: white;
      padding: 100px 0;
      text-align: center;
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .hero p {
      font-size: 1.2rem;
      max-width: 600px;
      margin: 20px auto;
    }

    .btn-custom {
      background-color: white;
      color: var(--primary-color);
      border: none;
      padding: 12px 30px;
      border-radius: 30px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-custom:hover {
      background-color: var(--primary-hover);
      color: white;
    }

    .section {
      padding: 60px 0;
    }

    .card-icon {
      font-size: 2rem;
      color: var(--primary-color);
    }

    footer {
      background-color: #e0f2f1;
      text-align: center;
      padding: 20px;
      font-size: 0.9rem;
    }

    /* Fade-in animation */
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .fade-in.show {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold" style="color: var(--primary-color);" href="#">EcoPonto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#tipos">Tipos de Resíduo</a></li>
          <li class="nav-item"><a class="nav-link" href="#beneficios">Benefícios</a></li>
          <li class="nav-item"><a class="nav-link" href="views/request_form.php">Solicitar Coleta</a></li>
          <!-- <li class="nav-item"><a class="nav-link" href="views/admin_login.php"><i class="bi bi-person-lock"></i> Área do Admin</a></li> -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <section class="hero">
    <div class="container">
      <h1><i class="bi bi-recycle me-2"></i>Sistema de Coleta Sustentável</h1>
      <p>Contribua para um meio ambiente mais limpo! Solicite a coleta de seus resíduos diretamente pelo site do EcoPonto de Praia Grande.</p>
      <a href="views/request_form.php" class="btn btn-custom mt-3"><i class="bi bi-send"></i> Solicitar Coleta
</a>

    </div>
  </section>

  <!-- Tipos de resíduos -->
  <section class="section bg-white text-center" id="tipos">
    <div class="container fade-in">
      <h2 class="mb-5" style="color: var(--primary-color);">Tipos de Resíduos Aceitos</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card shadow-sm p-4 border-0 h-100">
            <div class="card-icon mb-3"><i class="bi bi-lightning-charge-fill"></i></div>
            <h5>Eletrônicos</h5>
            <p>Celulares, carregadores, aparelhos antigos e muito mais.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm p-4 border-0 h-100">
            <div class="card-icon mb-3"><i class="bi bi-droplet-fill"></i></div>
            <h5>Óleo de Cozinha</h5>
            <p>Evite o entupimento de encanamentos e poluição de rios.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm p-4 border-0 h-100">
            <div class="card-icon mb-3"><i class="bi bi-box-seam"></i></div>
            <h5>Papel e Papelão</h5>
            <p>Materiais recicláveis que ajudam a preservar árvores.</p>
          </div>
        </div>
      </div>
      <div class="row g-4 mt-4">
        <div class="col-md-4">
          <div class="card shadow-sm p-4 border-0 h-100">
            <div class="card-icon mb-3"><i class="bi bi-cup-straw"></i></div>
            <h5>Plásticos</h5>
            <p>Garrafas PET, sacolas e utensílios plásticos recicláveis.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm p-4 border-0 h-100">
            <div class="card-icon mb-3"><i class="bi bi-buildings"></i></div>
            <h5>Entulho</h5>
            <p>Pequenas quantidades de resíduos de obras e reformas.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-sm p-4 border-0 h-100">
            <div class="card-icon mb-3"><i class="bi bi-battery-charging"></i></div>
            <h5>Pilhas e Baterias</h5>
            <p>Descarte seguro para materiais altamente poluentes.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Benefícios -->
  <section class="section text-center" id="beneficios">
    <div class="container fade-in">
      <h2 class="mb-4" style="color: var(--primary-color);">Por que usar nosso sistema?</h2>
      <p class="mb-4">A coleta consciente é uma forma de garantir um futuro sustentável. Nosso sistema ajuda você a dar o destino correto aos resíduos, contribuindo com o meio ambiente e a limpeza urbana.</p>
      <a href="views/request_form.php" class="btn btn-primary">    <i class="bi bi-arrow-right-circle me-1"></i> Fazer Solicitação</a>

    </div>
  </section>

  <footer>
    <p>© <?= date("Y") ?> EcoPonto Praia Grande. Desenvolvido para a população.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Animação fade-in ao rolar
    const faders = document.querySelectorAll('.fade-in');

    const appearOptions = {
      threshold: 0.2,
      rootMargin: "0px 0px -50px 0px"
    };

    const appearOnScroll = new IntersectionObserver(function(entries, observer) {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add("show");
        observer.unobserve(entry.target);
      });
    }, appearOptions);

    faders.forEach(fader => {
      appearOnScroll.observe(fader);
    });
  </script>
</body>
</html>
