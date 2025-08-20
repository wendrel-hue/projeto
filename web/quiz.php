<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz de Biologia</title>
  <link rel="stylesheet" href="Style.css/quiz.css" />
</head>
<body>
  <?php
  // Conexão com MySQL (adicionado)
  $servername = "localhost";
  $username = "root"; // substitua pelo seu usuário MySQL
  $password = ""; // substitua pela sua senha MySQL
  $dbname = "cadastro3"; // substitua pelo nome do seu banco de dados

  // Criar conexão
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar conexão
  if ($conn->connect_error) {
      die("Conexão falhou: " . $conn->connect_error);
  }

  // Criar tabela se não existir (adicionado)
  $sql = "CREATE TABLE IF NOT EXISTS resultados_quiz (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      nome VARCHAR(50) NOT NULL,
      acertos INT(3) NOT NULL,
      erros INT(3) NOT NULL,
      porcentagem FLOAT NOT NULL,
      data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  )";

  if (!$conn->query($sql)) {
      echo "Erro ao criar tabela: " . $conn->error;
  }

  // Dados da página
  $pagina = [
    'titulo' => "Quiz de Biologia",
    'subtitulo' => "Biopark",
    'titulo_quiz' => "Teste seus conhecimentos sobre biologia!",
    'autor' => "Samuca Silva",
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

  // Todas as 20 perguntas de biologia
  $todas_perguntas = [
    [
      'pergunta' => "1. Qual destes animais possui três corações?",
      'opcoes' => [
        'a' => "Polvo",
        'b' => "Tubarão",
        'c' => "Elefante",
        'd' => "Golfinho"
      ],
      'resposta_correta' => "a"
    ],
    [
      'pergunta' => "2. Qual é o maior órgão do corpo humano?",
      'opcoes' => [
        'a' => "Fígado",
        'b' => "Intestino",
        'c' => "Pele",
        'd' => "Cérebro"
      ],
      'resposta_correta' => "c"
    ],
    [
      'pergunta' => "3. O que significa a sigla DNA?",
      'opcoes' => [
        'a' => "Dupla Niacina Alcalina",
        'b' => "Ácido Desoxirribonucleico",
        'c' => "Dinucleotídeo Adenina",
        'd' => "Desoxinucleína Atômica"
      ],
      'resposta_correta' => "b"
    ],
    [
      'pergunta' => "4. Qual é a função principal dos cloroplastos nas células vegetais?",
      'opcoes' => [
        'a' => "Respiração celular",
        'b' => "Fotossíntese",
        'c' => "Armazenamento de água",
        'd' => "Produção de proteínas"
      ],
      'resposta_correta' => "b"
    ],
    [
      'pergunta' => "5. Qual desses não é um tipo de tecido animal básico?",
      'opcoes' => [
        'a' => "Epitelial",
        'b' => "Muscular",
        'c' => "Vascular",
        'd' => "Nervoso"
      ],
      'resposta_correta' => "c"
    ],
    [
      'pergunta' => "6. Qual é o nome do processo de divisão celular que resulta em células reprodutivas?",
      'opcoes' => [
        'a' => "Mitose",
        'b' => "Meiose",
        'c' => "Fissão binária",
        'd' => "Gemulação"
      ],
      'resposta_correta' => "b"
    ],
    [
      'pergunta' => "7. Qual dessas estruturas está presente em células vegetais mas não em animais?",
      'opcoes' => [
        'a' => "Mitocôndria",
        'b' => "Parede celular",
        'c' => "Núcleo",
        'd' => "Ribossomo"
      ],
      'resposta_correta' => "b"
    ],
    [
      'pergunta' => "8. Qual é o principal gás responsável pelo efeito estufa produzido pela atividade humana?",
      'opcoes' => [
        'a' => "Oxigênio",
        'b' => "Nitrogênio",
        'c' => "Dióxido de carbono",
        'd' => "Hélio"
      ],
      'resposta_correta' => "c"
    ],
    [
      'pergunta' => "9. Qual desses é um exemplo de simbiose?",
      'opcoes' => [
        'a' => "Tubarão comendo um peixe",
        'b' => "Fungo e alga formando um líquen",
        'c' => "Árvore competindo por luz solar",
        'd' => "Planta produzindo flores"
      ],
      'resposta_correta' => "b"
    ],
    [
      'pergunta' => "10. Qual é o nome científico do ser humano moderno?",
      'opcoes' => [
        'a' => "Homo erectus",
        'b' => "Homo neanderthalensis",
        'c' => "Homo sapiens",
        'd' => "Homo habilis"
      ],
      'resposta_correta' => "c"
    ],
    [
      'pergunta' => "11. Qual destes é um exemplo de anfíbio?",
      'opcoes' => [
        'a' => "Cobra",
        'b' => "Sapo",
        'c' => "Tartaruga",
        'd' => "Lagarto"
      ],
      'resposta_correta' => "b"
    ],
    [
      'pergunta' => "12. O que a teoria da seleção natural de Darwin propõe?",
      'opcoes' => [
        'a' => "Os organismos mais fortes sempre sobrevivem",
        'b' => "Os organismos que melhor se adaptam ao ambiente têm maior chance de sobrevivência",
        'c' => "Todas as espécies foram criadas simultaneamente",
        'd' => "As características adquiridas durante a vida são herdadas"
      ],
      'resposta_correta' => "b"
    ],
    [
      'pergunta' => "13. Qual é a unidade básica da hereditariedade?",
      'opcoes' => [
        'a' => "Célula",
        'b' => "Proteína",
        'c' => "Gene",
        'd' => "Enzima"
      ],
      'resposta_correta' => "c"
    ],
    [
      'pergunta' => "14. Qual destes é um exemplo de organismo unicelular?",
      'opcoes' => [
        'a' => "Água-viva",
        'b' => "Bactéria",
        'c' => "Minhoca",
        'd' => "Cogumelo"
      ],
      'resposta_correta' => "b"
    ],
    [
      'pergunta' => "15. Qual é a função das hemácias no sangue?",
      'opcoes' => [
        'a' => "Transportar oxigênio",
        'b' => "Combater infecções",
        'c' => "Coagular o sangue",
        'd' => "Produzir anticorpos"
      ],
      'resposta_correta' => "a"
    ],
    [
      'pergunta' => "16. O que é um ecossistema?",
      'opcoes' => [
        'a' => "Um grupo de organismos da mesma espécie",
        'b' => "A comunidade de organismos e seu ambiente físico",
        'c' => "Apenas a parte viva de um ambiente",
        'd' => "Um grande bioma como a floresta amazônica"
      ],
      'resposta_correta' => "b"
    ],
    [
      'pergunta' => "17. Qual destes é um órgão do sistema digestório?",
      'opcoes' => [
        'a' => "Baço",
        'b' => "Pâncreas",
        'c' => "Pulmão",
        'd' => "Rim"
      ],
      'resposta_correta' => "b"
    ],
    [
      'pergunta' => "18. Qual é a principal fonte de energia para a maioria dos ecossistemas?",
      'opcoes' => [
        'a' => "Calor do núcleo terrestre",
        'b' => "Matéria orgânica do solo",
        'c' => "Energia química das rochas",
        'd' => "Luz solar"
      ],
      'resposta_correta' => "d"
    ],
    [
      'pergunta' => "19. Qual destes é um exemplo de adaptação evolutiva?",
      'opcoes' => [
        'a' => "Um animal aprendendo um truque",
        'b' => "O pescoço longo das girafas",
        'c' => "Uma planta crescendo em direção à luz",
        'd' => "Um pássaro construindo um ninho"
      ],
      'resposta_correta' => "b"
    ],
    [
      'pergunta' => "20. O que a fotossíntese produz?",
      'opcoes' => [
        'a' => "Oxigênio e glicose",
        'b' => "Dióxido de carbono e água",
        'c' => "Nitrogênio e proteínas",
        'd' => "Metano e amônia"
      ],
      'resposta_correta' => "a"
    ]
  ];

  // Seleciona 10 perguntas aleatórias
  shuffle($todas_perguntas);
  $perguntas = array_slice($todas_perguntas, 0, 10);
  ?>

  <header>
    <h1><?php echo htmlspecialchars($pagina['titulo']); ?></h1>
    <h1><?php echo htmlspecialchars($pagina['subtitulo']); ?></h1>
    <nav>
      <?php foreach ($menu as $url => $texto): ?>
        <a href="<?php echo htmlspecialchars($url); ?>"><?php echo htmlspecialchars($texto); ?></a>
      <?php endforeach; ?>
    </nav>
  </header>

  <main class="quiz-container">
    <h2><?php echo htmlspecialchars($pagina['titulo_quiz']); ?></h2>
    <p>10 perguntas selecionadas aleatoriamente de um banco de 20 questões de biologia.</p>
    
    <!-- Formulário para capturar o nome do usuário (adicionado) -->
    <div id="nome-form">
      <label for="nome">Digite seu nome:</label>
      <input type="text" id="nome" name="nome" required>
      <button type="button" id="iniciar-quiz">Iniciar Quiz</button>
    </div>
    
    <form id="quiz-form" style="display:none;">
      <?php foreach ($perguntas as $index => $pergunta): ?>
      <div class="question" data-id="<?php echo $index + 1; ?>" data-resposta="<?php echo $pergunta['resposta_correta']; ?>">
        <p><?php echo htmlspecialchars($pergunta['pergunta']); ?></p>
        <?php foreach ($pergunta['opcoes'] as $valor => $texto): ?>
          <label>
            <input type="radio" name="q<?php echo $index + 1; ?>" value="<?php echo $valor; ?>">
            <?php echo htmlspecialchars($texto); ?>
          </label><br>
        <?php endforeach; ?>
      </div>
      <?php endforeach; ?>
      
      <button type="button" id="verificar-respostas">Verificar Respostas</button>
      <div id="resultado"></div>
    </form>
  </main>

  <footer>
    <p>&copy; <?php echo htmlspecialchars($pagina['ano']); ?> - Feito por wendrel e <?php echo htmlspecialchars($pagina['autor']); ?></p>
  </footer>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('iniciar-quiz').addEventListener('click', function() {
      const nome = document.getElementById('nome').value;
      if (nome.trim() === '') {
        alert('Por favor, digite seu nome para começar o quiz.');
        return;
      }
      document.getElementById('nome-form').style.display = 'none';
      document.getElementById('quiz-form').style.display = 'block';
    });
    
    document.getElementById('verificar-respostas').addEventListener('click', verificarRespostas);
  });

  function verificarRespostas() {
    const perguntas = document.querySelectorAll('.question');
    let pontos = 0;
    let feedbackHTML = '';
    
    perguntas.forEach(pergunta => {
      const perguntaId = pergunta.dataset.id;
      const respostaCorreta = pergunta.dataset.resposta;
      const opcaoSelecionada = pergunta.querySelector(`input[name="q${perguntaId}"]:checked`);
      const textoPergunta = pergunta.querySelector('p').textContent;
      
      if (opcaoSelecionada) {
        const respostaUsuario = opcaoSelecionada.value;
        
        if (respostaUsuario === respostaCorreta) {
          pontos++;
          feedbackHTML += `
            <div class="feedback correct">
              <p><strong>Pergunta ${perguntaId}:</strong> ${textoPergunta}</p>
              <p>✅ Você acertou! (${respostaUsuario.toUpperCase()})</p>
            </div>`;
        } else {
          feedbackHTML += `
            <div class="feedback incorrect">
              <p><strong>Pergunta ${perguntaId}:</strong> ${textoPergunta}</p>
              <p>❌ Você errou. Sua resposta: ${respostaUsuario.toUpperCase()} | Correta: ${respostaCorreta.toUpperCase()}</p>
            </div>`;
        }
      } else {
        feedbackHTML += `
          <div class="feedback unanswered">
            <p><strong>Pergunta ${perguntaId}:</strong> ${textoPergunta}</p>
            <p>⚠️ Não respondida. Resposta correta: ${respostaCorreta.toUpperCase()}</p>
          </div>`;
      }
    });

    const totalPerguntas = perguntas.length;
    const erros = totalPerguntas - pontos;
    const porcentagem = Math.round((pontos / totalPerguntas) * 100);
    const nome = document.getElementById('nome').value;
    
    let mensagem = '';
    if (porcentagem === 100) {
      mensagem = '<p class="excellent">Perfeito! Você acertou tudo! 🎯</p>';
    } else if (porcentagem >= 70) {
      mensagem = '<p class="good">Bom trabalho! Você sabe bastante sobre biologia. 👍</p>';
    } else if (porcentagem >= 50) {
      mensagem = '<p class="average">Você foi bem, mas pode melhorar! 📚</p>';
    } else {
      mensagem = '<p class="poor">Que tal estudar mais um pouco? Você pode melhorar! 💪</p>';
    }

    document.getElementById('resultado').innerHTML = `
      <div class="result-summary">
        <h3>Resultado Final</h3>
        <p>Nome: <strong>${nome}</strong></p>
        <p>Acertos: <strong>${pontos}</strong> | Erros: <strong>${erros}</strong> de <strong>${totalPerguntas}</strong> perguntas</p>
        <p class="percentage">Porcentagem de acertos: <strong>${porcentagem}%</strong></p>
        ${mensagem}
      </div>
      <div class="feedback-container">
        <h4>Detalhes por pergunta:</h4>
        ${feedbackHTML}
      </div>
    `;
    
    // Enviar resultados para o servidor (adicionado)
    const dados = {
      nome: nome,
      acertos: pontos,
      erros: erros,
      porcentagem: porcentagem
    };
    
    fetch(window.location.href, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: `salvar_resultado=true&nome=${encodeURIComponent(nome)}&acertos=${pontos}&erros=${erros}&porcentagem=${porcentagem}`
    });
  }
  </script>

  <?php
  // Salvar resultados no MySQL (adicionado)
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar_resultado'])) {
      $nome = $conn->real_escape_string($_POST['nome']);
      $acertos = intval($_POST['acertos']);
      $erros = intval($_POST['erros']);
      $porcentagem = floatval($_POST['porcentagem']);
      
      $sql = "INSERT INTO resultados_quiz (nome, acertos, erros, porcentagem) 
              VALUES ('$nome', $acertos, $erros, $porcentagem)";
      
      if (!$conn->query($sql)) {
          echo "<script>console.error('Erro ao salvar resultados: " . $conn->error . "');</script>";
      }
  }
  
  // Fechar conexão (adicionado)
  $conn->close();
  ?>
</body>
</html>