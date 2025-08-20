<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars("Curiosidades de Biologia"); ?></title>
  <link rel="stylesheet" href="Style.css/curiosidade.css" /> <!-- Corrigir este caminho -->
</head>
<body>
  <?php
  // Dados dinâmicos da página
  $pagina = [
    'titulo' => "Curiosidades de Biologia",
    'subtitulo' => "Biopark",
    'titulo_conteudo' => "20 Fatos incríveis sobre a biologia!",
    'autor' => "Samuca Silva"
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

  // Lista de 20 curiosidades sobre biologia
  $curiosidades = [
    "🧬 O DNA humano tem cerca de 3 bilhões de pares de bases e é 99.9% idêntico entre todas as pessoas.",
    "🦠 As bactérias são os seres vivos mais numerosos do planeta - há mais bactérias em seu corpo do que células humanas.",
    "🐙 O polvo tem três corações, sangue azul e um cérebro em cada tentáculo.",
    "🐋 O coração de uma baleia-azul pode pesar mais de 180 kg e bater apenas 2 vezes por minuto.",
    "🌿 As plantas se comunicam entre si por sinais químicos e até alertam sobre predadores.",
    "🦎 Alguns lagartos podem regenerar a cauda, mas o novo órgão é feito de cartilagem, não de osso.",
    "🦋 Borboletas provam comida com os pés - seus receptores gustativos estão nas patas.",
    "🧠 O cérebro humano consome cerca de 20% da energia do corpo, apesar de representar apenas 2% do peso.",
    "🦇 Morcegos são os únicos mamíferos capazes de voo verdadeiro (não apenas planar).",
    "🐜 Formigas podem carregar objetos 50 vezes mais pesados que seu próprio corpo.",
    "🦠 O vírus mais perigoso conhecido é o Ebola, com taxa de mortalidade de até 90%.",
    "🌵 O saguaro, cacto gigante do deserto, pode viver mais de 150 anos e armazenar 3.000 litros de água.",
    "🦑 Lulas gigantes têm os maiores olhos do reino animal - podem ter o tamanho de pratos de jantar.",
    "🦅 O falcão-peregrino é o animal mais rápido do mundo, atingindo 390 km/h em mergulho.",
    "🦠 Tardígrados (ursos-d'água) podem sobreviver no vácuo do espaço e a temperaturas extremas.",
    "🐸 Algumas rãs tropicais têm veneno suficiente para matar 10 humanos adultos.",
    "🌳 Uma única árvore pode absorver até 22 kg de CO2 por ano e liberar oxigênio para 2 pessoas.",
    "🦒 Girafas têm a mesma quantidade de vértebras no pescoço que humanos (7), só que muito maiores.",
    "🐝 Abelhas dançam para comunicar a localização de flores para suas companheiras de colmeia.",
    "🧬 Se desenrolássemos todo o DNA de uma célula humana, ele teria quase 2 metros de comprimento."
  ];
  ?>

  <header>
    <h1><?php echo htmlspecialchars($pagina['titulo']); ?></h1>
    <h2><?php echo htmlspecialchars($pagina['subtitulo']); ?></h2>
    <nav>
      <?php foreach ($menu as $url => $texto): ?>
        <a href="<?php echo htmlspecialchars($url); ?>"><?php echo htmlspecialchars($texto); ?></a>
      <?php endforeach; ?>
    </nav>
  </header>

  <main>
    <h2><?php echo htmlspecialchars($pagina['titulo_conteudo']); ?></h2>
    <ul>
      <?php foreach ($curiosidades as $item): ?>
        <li><?php echo htmlspecialchars($item); ?></li>
      <?php endforeach; ?>
    </ul>
  </main>

  <footer>
    <p>&copy; <?php echo date('Y'); ?> - Feito por wendrel e <?php echo htmlspecialchars($pagina['autor']); ?></p>
  </footer>
</body>
</html>