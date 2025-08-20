<!DOCTYPE >
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>cadastro de cliente</title>
  <link rel="stylesheet" href="Style.css/ingresso.css"/>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }
    
    header {
      background-color: #00695c;
      color: white;
      padding: 20px;
      text-align: center;
    }
    header h1 {
      margin-bottom: 10px;
      font-size: 2rem;
    }
    nav {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 15px;
    }
    
    nav a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }
    
    main {
      max-width: 1000px;
      margin: 30px auto;
      padding: 20px;
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      justify-content: center;
    }
    
    .form-container {
      background-color: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      flex: 1;
      min-width: 300px;
    }
    
    .ticket {
      background-color: white;
      border: 2px dashed #2e8b57;
      padding: 20px;
      display: flex;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      flex: 1;
      min-width: 300px;
      max-width: 400px;
    }
    
    .ticket-left {
      flex: 2;
      padding-right: 20px;
    }
    
    .ticket-right {
      flex: 1;
      border-left: 2px dashed #2e8b57;
      padding-left: 20px;
    }
    
    .barcode {
      letter-spacing: 3px;
      font-family: monospace;
      font-size: 18px;
    }
    
    form {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 15px;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    
    input[type="text"],
    input[type="submit"],
    select,
    input[type="file"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }
    
    input[type="submit"] {
      grid-column: span 2;
      background-color: #2e8b57;
      color: white;
      border: none;
      padding: 10px;
      cursor: pointer;
      font-weight: bold;
      margin-top: 10px;
    }
    
    h2 {
      color: #2e8b57;
      margin-top: 0;
    }
    
    @media (max-width: 768px) {
      form {
        grid-template-columns: 1fr;
      }
      
      input[type="submit"] {
        grid-column: span 1;
      }
    }
  </style>
</head>
<body>
    <header>
    <h1>Biopark - Cadastro</h1>
     <nav>
      <a href="index.php">Início</a>
      <a href="curiosidade.php">Curiosidades</a>
      <a href="sobre.php">Sobre</a>
      <a href="quiz.php">Quiz</a>
      <a href="duvidas.php">Dúvidas</a>
      <a href="ingresso.php">ingresso</a>
    </nav>
  </header>

  <main>
    <div class="form-container">
      <h2>Cadastro para Participação</h2>
      <form method="post" name="cliente" action="ainstbc.php" enctype="multipart/form-data">
        <div>
          <label>Nome Completo</label>
          <input type="text" name="nome" maxlength="150" required>
        </div>
        
        <div>
          <label>CPF</label>
          <input type="text" name="cpf" maxlength="11" required>
        </div>
        
        <div>
          <label>RG (Anexar imagem)</label>
          <input type="file" name="rg_imagem" accept="image/*" required>
        </div>
        
        <div>
          <label>E-mail</label>
          <input type="text" name="email" maxlength="50" required>
        </div>
        
        <div>
          <label>Celular</label>
          <input type="text" name="celular" maxlength="15" required>
        </div>

        <div>
          <label>numero do cartão</label>
          <input type="text" name="num" maxlength="15" required>
        </div>
        
        <div>
          <label>Estado</label>
          <select name="estado" required>
            <option value="">Selecione seu estado</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
          </select>
        </div>
        <input type="submit" name="enviar" value="Confirmar Inscrição">
      </form>
    </div>
    
    <div class="ticket">
      <div class="ticket-left">
        <h2>entrada</h2>
        <p><strong>Tema:</strong> Biodiversidade e Sustentabilidade</p>
        <p><strong>Data:</strong> 20 de Julho de 2025</p>
        <p><strong>Hora:</strong> 14:00</p>
        <p><strong>Local:</strong> Instituto de Ciências Naturais </p>
        <p><strong>Área:</strong> Visitante</p>
        <p><strong>preço:</strong> $25,00 </p>
      </div>
    </div>
  </main>
</body>
</html>