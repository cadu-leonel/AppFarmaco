<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Plataforma de Estudos Médicos com Flashcards Interativos">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>MedFlashcards</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --bg-dark: #0a0a0f;
            --bg-panel: #1a1a2f;
            --primary: #4a90e2;
            --secondary: #6c5ce7;
            --accent: #ff7675;
            --text-primary: #e6e6fa;
            --text-secondary: #a0a0c0;
            --border: rgba(255,255,255,0.1);
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-primary);
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }

        /* Header */
        .main-header {
            background: var(--bg-panel);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border);
        }

        .logo a {
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            font-size: 1.5rem;
        }

        /* Banner Principal */
        .main-banner video {
            object-fit: cover;
            filter: brightness(0.7);
        }

        .video-overlay {
            background: rgba(10, 10, 15, 0.85);
        }

        /* Módulos */
        .modules-section {
            padding: 6rem 0;
            background: var(--bg-panel);
        }

        .module-card {
            background: var(--bg-dark);
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 2rem;
            margin: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .module-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(74, 144, 226, 0.2);
        }

        .module-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255,255,255,0.1),
                transparent
            );
            transition: 0.5s;
        }

        .module-card:hover::before {
            left: 100%;
        }

        .module-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            transition: transform 0.3s;
        }

        .module-icon:hover {
            transform: scale(1.1);
        }

        .topic-list {
            columns: 2;
            list-style: none;
            padding-left: 0;
            margin: 1rem 0;
        }

        .topic-list li {
            padding: 0.8rem;
            margin: 0.5rem 0;
            background: rgba(255,255,255,0.05);
            border-radius: 8px;
            position: relative;
            transition: all 0.3s;
        }

        .topic-list li:hover {
            background: rgba(74, 144, 226, 0.1);
            transform: translateX(10px);
        }

        .topic-list li::before {
            content: "\f138";
            font-family: "Font Awesome 5 Free";
            position: absolute;
            left: 1rem;
            color: var(--secondary);
        }

        /* Botões */
        .btn-neon {
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
        }

        .btn-neon:hover {
            box-shadow: 0 0 20px rgba(74, 144, 226, 0.4);
            transform: translateY(-2px);
        }

        .btn-neon::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255,255,255,0.3),
                transparent
            );
            transition: 0.5s;
        }

        .btn-neon:hover::after {
            left: 100%;
        }

        /* Contato */
        .contact-section {
            background: var(--bg-panel);
            padding: 4rem 0;
        }

        .contact-form input,
        .contact-form textarea {
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--border);
            color: var(--text-primary);
            padding: 1rem;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 15px rgba(74, 144, 226, 0.2);
        }

        /* Footer */
        footer {
            background: var(--bg-panel);
            border-top: 1px solid var(--border);
            padding: 2rem 0;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .module-card {
                margin: 1rem 0;
            }
            
            .topic-list {
                columns: 1;
            }
        }
    </style>
</head>

<body>
    <!-- Cabeçalho -->
    <header class="main-header fixed-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <div class="logo">
                    <a href="#" class="text-secondary">⚕️ MedFlashcards</a>
                </div>
                <nav class="main-nav">
                    <ul class="d-flex list-unstyled gap-4 mb-0">
                        <li><a href="#home" class="text-decoration-none text-light">Home</a></li>
                        <li><a href="#module-card" class="text-decoration-none text-secondary">Módulos</a></li>
                        <li><a href="#contato" class="text-decoration-none text-secondary">Contato</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Banner Principal -->
    <section class="main-banner vh-100 d-flex align-items-center" id="home">
        <video autoplay muted loop class="w-100 h-100">
            <source src="assets/images/course-video.mp4" type="video/mp4">
        </video>
        <div class="video-overlay position-absolute w-100 h-100 d-flex align-items-center">
            <div class="container text-center">
                <h6 class="text-uppercase letter-spacing-2 mb-4">Aprendizado Ativo</h6>
                <h1 class="display-4 fw-bold mb-4">Domine a Medicina com<br><span class="text-gradient">Flashcards Inteligentes</span></h1>
                <a href="#modulos" class="btn btn-neon">Começar Agora</a>
            </div>
        </div>
    </section>

    <!-- Seção de Módulos -->
    <section class="modules-section" id="modulos">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Módulos Principais</h2>
                <p class="lead text-secondary">Explore nossos conteúdos estruturados cientificamente</p>
            </div>

            <div class="row">
                <!-- Módulo 1 -->
                <div class="col-lg-6 mb-4">
                    <div class="module-card">
                        <div class="module-icon">
                            <i class="fas fa-dna"></i>
                        </div>
                        <h3 class="text-primary">Funções Biológicas</h3>
                        <p class="text-secondary mb-4">Compreenda os processos fundamentais que sustentam a vida em nível molecular e celular.</p>
                        <div class="module-topics">
                            <h5 class="mb-3 text-primary">Tópicos Incluídos:</h5>
                            <ul class="topic-list">
                                <li>Metabolismo celular</li>
                                <li>Síntese proteica</li>
                                <li>Homeostase</li>
                                <li>Transdução de sinais</li>
                                <li>Expressão gênica</li>
                                <li>Ciclo energético</li>
                            </ul>
                        </div>
                        <button class="btn btn-neon mt-3">Iniciar Módulo</button>
                    </div>
                </div>

                <!-- Módulo 2 -->
                <div class="col-lg-6 mb-4">
                    <div class="module-card">
                        <div class="module-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h3 class="text-primary">Funções Vitais</h3>
                        <p class="text-secondary mb-4">Domine a fisiologia dos sistemas orgânicos e seus mecanismos integrados.</p>
                        <div class="module-topics">
                            <h5 class="mb-3 text-primary">Tópicos Incluídos:</h5>
                            <ul class="topic-list">
                                <li>Sistema cardiovascular</li>
                                <li>Respiração celular</li>
                                <li>Função renal</li>
                                <li>Neurofisiologia</li>
                                <li>Termorregulação</li>
                                <li>Processos imunitários</li>
                            </ul>
                        </div>
                        <button class="btn btn-neon mt-3">Iniciar Módulo</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Contato -->
    <section class="contact-section" id="contato">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mb-5">Entre em Contato</h2>
                    <form class="contact-form">
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Seu Nome">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="Seu Email">
                            </div>
                        </div>
                        <div class="mb-4">
                            <textarea class="form-control" rows="5" placeholder="Sua Mensagem"></textarea>
                        </div>
                        <button class="btn btn-neon">Enviar Mensagem</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p class="mb-0 text-secondary">&copy; 2024 MedFlashcards. Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Efeito de hover dinâmico
        document.querySelectorAll('.module-card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                card.style.setProperty('--mouse-x', `${x}px`);
                card.style.setProperty('--mouse-y', `${y}px`);
            });
        });

        // Animação de scroll suave
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>