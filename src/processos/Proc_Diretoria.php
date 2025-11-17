<?php
session_start();
include_once("Conexao.php");

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../viwer/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Array para armazenar erros
    $erros = [];
    
    // Validação e sanitização dos dados
    $presidente = filter_input(INPUT_POST, 'presidente', FILTER_SANITIZE_STRING);
    $diretor = filter_input(INPUT_POST, 'diretor', FILTER_SANITIZE_STRING);
    $tecnico = filter_input(INPUT_POST, 'tecnico', FILTER_SANITIZE_STRING);
    $auxiliares = filter_input(INPUT_POST, 'auxiliares', FILTER_SANITIZE_STRING);
    $preparador = filter_input(INPUT_POST, 'preparador', FILTER_SANITIZE_STRING);
    $fisioterapeuta = filter_input(INPUT_POST, 'fisioterapeuta', FILTER_SANITIZE_STRING);

    // Validações dos campos obrigatórios
    if (empty($presidente)) {
        $erros[] = "Nome do presidente é obrigatório";
    }
    
    if (empty($tecnico)) {
        $erros[] = "Nome do técnico é obrigatório";
    }

    // Se não há erros, inserir no banco
    if (empty($erros)) {
        try {
            // Usar prepared statements para evitar SQL Injection
            $sql = "INSERT INTO Comissao 
                    (presidente, diretor, tecnico, auxiliares, preparador_fisico, fisioterapeuta, usuario_id) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $conexao->prepare($sql);
            
            if ($stmt) {
                // Vincular parâmetros
                $stmt->bind_param(
                    "ssssssi", 
                    $presidente, 
                    $diretor, 
                    $tecnico, 
                    $auxiliares, 
                    $preparador, 
                    $fisioterapeuta,
                    $_SESSION['usuario_id']
                );
                
                // Executar a query
                if ($stmt->execute()) {
                    // Sucesso - redirecionar ou mostrar mensagem
                    $_SESSION['sucesso'] = "Comissão técnica cadastrada com sucesso!";
                    header("Location: ../viwer/CadastrarClube04.php");
                    exit();
                } else {
                    $erros[] = "Erro ao cadastrar comissão: " . $stmt->error;
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
        header("Location: ../viwer/CadastrarClube03.php");
        exit();
    }
}

// Fechar conexão se existir
if (isset($conexao)) {
    $conexao->close();
}
?>