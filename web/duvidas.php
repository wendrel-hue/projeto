<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars("Dúvidas Frequentes - CuriosoBio"); ?></title>
  <link rel="stylesheet" href="Style.css/duvidas.css" />
</head>
<body>

  <?php
  // Dados dinâmicos da página
  $pagina = [
    'titulo' => "Biopark - Dúvidas",
    'titulo_conteudo' => "Dúvidas Frequentes",
    'copyright' => "CuriosoBio",
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

  // FAQ - Perguntas frequentes
  $faq = [
    [
      'pergunta' => "O conteúdo do site é gratuito?",
      'resposta' => "Sim! Todo o conteúdo é 100% gratuito e acessível para qualquer pessoa interessada em Biologia."
    ],
    [
      'pergunta' => "Posso sugerir uma curiosidade?",
      'resposta' => "Sim! Em breve vamos abrir um formulário para sugestões. Fique ligado na página principal."
    ],
    [
      'pergunta' => "Este site é voltado para qual público?",
      'resposta' => "O site é voltado para estudantes, professores, curiosos e amantes da natureza de todas as idades!"
    ],
    [
      'pergunta' => "Como posso entrar em contato com vocês?",
      'resposta' => "Você pode enviar um e-mail para curiosobio@email.com ou usar o botão de contato no rodapé."
    ]
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

  <main class="conteudo">
    <h1><?php echo htmlspecialchars($pagina['titulo_conteudo']); ?></h1>

    <section class="faq">
      <?php foreach ($faq as $item): ?>
      <details>
        <summary><?php echo htmlspecialchars($item['pergunta']); ?></summary>
        <p><?php echo htmlspecialchars($item['resposta']); ?></p>
      </details>
      <?php endforeach; ?>
    </section>
  </main>

  <footer>
    <p>© <?php echo htmlspecialchars($pagina['ano']); ?> <?php echo htmlspecialchars($pagina['copyright']); ?>. Todos os direitos reservados.</p>
  </footer>

</body>
</html>