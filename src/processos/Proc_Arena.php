<?php
session_start();
include_once("Conexao.php");

// Verificar se o usuário está logado (opcional, mas recomendado)
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../viwer/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Array para armazenar erros
    $erros = [];
    
    // Validação e sanitização dos dados
    $nomeGinasio = filter_input(INPUT_POST, 'nomeGinasio', FILTER_SANITIZE_STRING);
    $capacidadeTotal = filter_input(INPUT_POST, 'capacidadeTotal', FILTER_VALIDATE_INT);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING); // Corrigido: espaço extra removido
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
    $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
    $instagram = filter_input(INPUT_POST, 'instagram', FILTER_SANITIZE_URL);
    $facebook = filter_input(INPUT_POST, 'facebook', FILTER_SANITIZE_URL);
    
    // Validações específicas
    if (empty($nomeGinasio)) {
        $erros[] = "Nome do ginásio é obrigatório";
    }
    
    if ($capacidadeTotal === false || $capacidadeTotal <= 0) {
        $erros[] = "Capacidade total deve ser um número válido maior que zero";
    }
    
    if (empty($cep)) {
        $erros[] = "CEP é obrigatório";
    } elseif (!preg_match('/^\d{5}-\d{3}$/', $cep)) {
        $erros[] = "Formato de CEP inválido";
    }
    
    if (empty($estado)) {
        $erros[] = "Estado é obrigatório";
    }
    
    if (empty($cidade)) {
        $erros[] = "Cidade é obrigatória";
    }
    
    // Validação opcional para redes sociais
    if (!empty($instagram) && !filter_var($instagram, FILTER_VALIDATE_URL)) {
        $erros[] = "URL do Instagram inválida";
    }
    
    if (!empty($facebook) && !filter_var($facebook, FILTER_VALIDATE_URL)) {
        $erros[] = "URL do Facebook inválida";
    }
    
    // Se não há erros, inserir no banco
    if (empty($erros)) {
        try {
            // Usar prepared statements para evitar SQL Injection
            $sql = "INSERT INTO IdentidadePrincipal 
                    (nome, capacidade, cep, estado, cidade, numero, bairro, rua, instagram, facebook, usuario_id) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $conexao->prepare($sql);
            
            if ($stmt) {
                // Vincular parâmetros
                $stmt->bind_param(
                    "sissssssssi", 
                    $nomeGinasio, 
                    $capacidadeTotal, 
                    $cep, 
                    $estado, 
                    $cidade, 
                    $numero, 
                    $bairro, 
                    $rua, 
                    $instagram, 
                    $facebook,
                    $_SESSION['usuario_id']
                );
                
                // Executar a query
                if ($stmt->execute()) {
                    // Sucesso - redirecionar ou mostrar mensagem
                    $_SESSION['sucesso'] = "Ginásio cadastrado com sucesso!";
                    header("Location: ../viwer/CadastrarClube03.php");
                    exit();
                } else {
                    $erros[] = "Erro ao cadastrar ginásio: " . $stmt->error;
                }
                
                $stmt->close();
            } else {
                $erros[] = "Erro na preparação da query: " . $conexao->error;
            }
            
        } catch (Exception $e) {
            $erros[] = "Erro no cadastro: " . $e->getMessage();
        }
    }
    
    // Se houve erros, armazenar na sessão para exibir no formulário
    if (!empty($erros)) {
        $_SESSION['erros'] = $erros;
        $_SESSION['dados_form'] = $_POST; // Manter dados preenchidos
        header("Location: ../viwer/CadastrarClube02.php");
        exit();
    }
}

$conexao->close();
?>