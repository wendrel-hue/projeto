<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars("Curiosidades de Biologia"); ?></title>
  <link rel="stylesheet" href="Style.css/index.css" />
</head>
<body>
  <?php
  // Dados da página
  $pagina = [
    'titulo' => "Biopark",
    'titulo_conteudo' => "Bem-vindo ao nosso site!",
    'autor' => "Samuca Silva",
    'ano' => date('Y'),
    'saudacao' => "Descubra fatos incríveis sobre o mundo biológico de forma leve, educativa e divertida. 🌱",
    'chamada' => "Explore nossas páginas e teste seus conhecimentos no quiz!"
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
    <p><?php echo htmlspecialchars($pagina['saudacao']); ?></p>
    <p><?php echo htmlspecialchars($pagina['chamada']); ?></p>
  </main>

  <footer>
    <p>&copy; <?php echo htmlspecialchars($pagina['ano']); ?> - Feito por wendrel e <?php echo htmlspecialchars($pagina['autor']); ?></p>
  </footer>
</body>
</html>