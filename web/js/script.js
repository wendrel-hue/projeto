document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('verificar-respostas').addEventListener('click', verificarRespostas);
});

function verificarRespostas() {
  // Obter todas as perguntas exibidas na página
  const perguntasElements = document.querySelectorAll('.question');
  let pontos = 0;
  const total = perguntasElements.length;
  let feedbackPorPergunta = '';

  // Verificar cada pergunta exibida
  perguntasElements.forEach((pergunta, index) => {
    const perguntaId = index + 1;
    const opcaoMarcada = pergunta.querySelector(`input[name="q${perguntaId}"]:checked`);
    const respostaCorreta = pergunta.querySelector('input[type="radio"]').dataset.resposta;
    const textoPergunta = pergunta.querySelector('p').textContent;

    if (opcaoMarcada) {
      const respostaUsuario = opcaoMarcada.value;
      
      if (respostaUsuario === respostaCorreta) {
        pontos++;
        feedbackPorPergunta += `
          <div class="feedback-item correct">
            <p><strong>Pergunta ${perguntaId}:</strong> ${textoPergunta}</p>
            <p>✅ Você acertou! Resposta selecionada: ${respostaUsuario.toUpperCase()}</p>
          </div>`;
      } else {
        feedbackPorPergunta += `
          <div class="feedback-item incorrect">
            <p><strong>Pergunta ${perguntaId}:</strong> ${textoPergunta}</p>
            <p>❌ Você errou. Sua resposta: ${respostaUsuario.toUpperCase()} | Resposta correta: ${respostaCorreta.toUpperCase()}</p>
          </div>`;
      }
    } else {
      feedbackPorPergunta += `
        <div class="feedback-item unanswered">
          <p><strong>Pergunta ${perguntaId}:</strong> ${textoPergunta}</p>
          <p>⚠️ Não respondida. Resposta correta: ${respostaCorreta.toUpperCase()}</p>
        </div>`;
    }
  });

  const resultado = document.getElementById('resultado');
  const porcentagemAcertos = Math.round((pontos / total) * 100);
  
  // Criar mensagem baseada no desempenho
  let mensagemDesempenho = '';
  if (porcentagemAcertos === 100) {
    mensagemDesempenho = '<p class="excellent">Parabéns! Você é um expert em biologia! 🎯</p>';
  } else if (porcentagemAcertos >= 70) {
    mensagemDesempenho = '<p class="good">Bom trabalho! Você sabe bastante sobre biologia. 👍</p>';
  } else if (porcentagemAcertos >= 50) {
    mensagemDesempenho = '<p class="average">Você foi bem, mas pode melhorar! 📚</p>';
  } else {
    mensagemDesempenho = '<p class="poor">Que tal estudar mais um pouco? Você pode melhorar! 💪</p>';
  }

  resultado.innerHTML = `
    <div class="result-summary">
      <h3>Resultado do Quiz</h3>
      <p>Você acertou <strong>${pontos}</strong> de <strong>${total}</strong> perguntas</p>
      <p class="percentage">Porcentagem de acertos: <strong>${porcentagemAcertos}%</strong></p>
      ${mensagemDesempenho}
    </div>
    <div class="feedback-container">
      <h4>Detalhes por pergunta:</h4>
      ${feedbackPorPergunta}
    </div>
  `;
}