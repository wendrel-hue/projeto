<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars("Sobre o Site"); ?></title>
  <link rel="stylesheet" href="Style.css/sobre.css" />
</head>
<body>
  <?php
  // Dados da página
  $pagina = [
    'titulo' => "Biopark - Sobre",
    'titulo_conteudo' => "Sobre o site",
    'titulo_criador' => "Sobre o criador",
    'autores' => ["Samuca Silva", "Wendrel Laia"],
    'ano' => date('Y')
  ];

  // Menu de navegação
  $menu = [
    'index.php' => "Início",
    'curiosidade.php' => "Curiosidades",
    'sobre.php' => "Sobre",
    'quiz.php' => "Quiz",
    'duvidas.php' => "Dúvidas",
    'ingresso.php' => "Ingresso"
  ];

  // Conteúdo sobre o site
  $sobre_site = "Este site foi criado com o objetivo de compartilhar curiosidades incríveis sobre o mundo da biologia, de forma simples e divertida para todos.";

  // Conteúdo sobre os criadores
  $sobre_criadores = "Olá! nossos nomes são <strong> " . htmlspecialchars(implode(" e ", $pagina['autores'])) . "</strong> somos apaixonados por tecnologia e ciência. Criamos este projeto para praticar desenvolvimento web usando HTML, CSS, JavaScript e PHP, e também para inspirar outras pessoas a descobrirem o lado fascinante da biologia.";
  ?>

  <header>
    <h1><?php echo htmlspecialchars($pagina['titulo']); ?></h1>
    <nav>
      <?php foreach ($menu as $url => $texto): ?>
        <a href="<?php echo htmlspecialchars($url); ?>"><?php echo htmlspecialchars($texto); ?></a>
      <?php endforeach; ?>
    </nav>
  </header>

  <main>
    <h2><?php echo htmlspecialchars($pagina['titulo_conteudo']); ?></h2>
    <p><?php echo $sobre_site; ?></p>
    
    <h3><?php echo htmlspecialchars($pagina['titulo_criador']); ?></h3>
    <p><?php echo $sobre_criadores; ?></p>
  </main>

  <footer>
    <p>&copy; <?php echo htmlspecialchars($pagina['ano']); ?> - Feito por  wendrel e <?php echo htmlspecialchars(implode(" e ", $pagina['autores'])); ?></p>
  </footer>
</body>
</html>