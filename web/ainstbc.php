<?php 
include_once "config.php";

// Verifica se o formulário foi submetido
if(isset($_POST['enviar'])) {
    // Inicializa variáveis
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $celular = mysqli_real_escape_string($conn, $_POST['celular']);
    $estado = mysqli_real_escape_string($conn, $_POST['estado']);
    $num = mysqli_real_escape_string($conn, $_POST['num']);
    $rg_imagem = ''; // Inicializa vazio

    // Processamento do upload da imagem
    if(isset($_FILES['rg_imagem']) && $_FILES['rg_imagem']['error'] == UPLOAD_ERR_OK) {
        $pastaDestino = "arquivo/";
        
        // Verifica se a pasta existe, se não, cria
        if(!file_exists($pastaDestino)) {
            mkdir($pastaDestino, 0777, true);
        }
        
        // Obtém informações do arquivo
        $nomeArquivo = $_FILES['rg_imagem']['name'];
        $caminhoTemporario = $_FILES['rg_imagem']['tmp_name'];
        $tipoArquivo = $_FILES['rg_imagem']['type'];
        $tamanhoArquivo = $_FILES['rg_imagem']['size'];
        
        // Gera um nome único para o arquivo
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
        $novoNome = uniqid().'.'.$extensao;
        $caminhoCompleto = $pastaDestino.$novoNome;
        
        // Tipos de arquivo permitidos
        $tiposPermitidos = array('image/jpeg', 'image/png', 'image/gif');
        
        // Verifica se o tipo do arquivo é permitido
        if(in_array($tipoArquivo, $tiposPermitidos)) {
            // Tenta mover o arquivo para a pasta de destino
            if(move_uploaded_file($caminhoTemporario, $caminhoCompleto)) {
                $rg_imagem = $caminhoCompleto;
            } else {
                die("Erro ao enviar o arquivo.");
            }
        } else {
            die("Tipo de arquivo não permitido. Apenas imagens JPEG, PNG ou GIF são aceitas.");
        }
    } else {
        die("Erro no upload da imagem.");
    }

    // Validação básica dos campos
    if(empty($nome) || empty($cpf) || empty($email)) {
        die("Preencha todos os campos obrigatórios.");
    }

    // Prepara e executa a query SQL
    $sql = "INSERT INTO tbclientes(nome, cpf, celular, email, estado, num, rg_imagem) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssss", $nome, $cpf, $celular, $email, $estado, $num, $rg_imagem);
        
        if(mysqli_stmt_execute($stmt)) {
            header("Location: ingresso.php");
            exit();
        } else {
            echo "Erro ao cadastrar: " . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da query: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    // Se o formulário não foi submetido, redireciona
    header("Location: formulario.php");
    exit();
}
?>