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
    $nomecompleto = filter_input(INPUT_POST, 'nomecompleto', FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
    $posicao = filter_input(INPUT_POST, 'posicao', FILTER_SANITIZE_STRING);
    $nacionalidade = filter_input(INPUT_POST, 'nacionalidade', FILTER_SANITIZE_STRING);
    $dataNascimento = filter_input(INPUT_POST, 'dataNascimento', FILTER_SANITIZE_STRING);
    $peso = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_STRING);
    $altura = filter_input(INPUT_POST, 'altura', FILTER_SANITIZE_STRING); // CORREÇÃO: nome do campo
    $contrato = filter_input(INPUT_POST, 'contrato', FILTER_SANITIZE_STRING);

    // Validações dos campos obrigatórios - CORREÇÃO: usando variáveis corretas
    if (empty($nomecompleto)) {
        $erros[] = "Nome completo é obrigatório";
    }
    
    if (empty($numero)) {
        $erros[] = "Número é obrigatório";
    }

    if (empty($posicao)) {
        $erros[] = "Posição é obrigatória";
    }

    // Validação da data de nascimento
    if (!empty($dataNascimento)) {
        $dataObj = DateTime::createFromFormat('Y-m-d', $dataNascimento);
        if (!$dataObj || $dataObj->format('Y-m-d') !== $dataNascimento) {
            $erros[] = "Data de nascimento inválida";
        }
    }

    // Validação da data do contrato
    if (!empty($contrato)) {
        $contratoObj = DateTime::createFromFormat('Y-m-d', $contrato);
        if (!$contratoObj || $contratoObj->format('Y-m-d') !== $contrato) {
            $erros[] = "Data do contrato inválida";
        }
    }

    // Se não há erros, inserir no banco
    if (empty($erros)) {
        try {
            // CORREÇÃO: Query corrigida para Jogador com parâmetros corretos
            $sql = "INSERT INTO Jogador 
                    (nome, numero, posicao, nacionalidade, data_nascimento, peso, altura, data_contrato, usuario_id) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $conexao->prepare($sql);
            
            if ($stmt) {
                // CORREÇÃO: Parâmetros corrigidos para jogador
                $stmt->bind_param(
                    "ssssssssi", 
                    $nomecompleto, 
                    $numero, 
                    $posicao, 
                    $nacionalidade, 
                    $dataNascimento, 
                    $peso, 
                    $altura,
                    $contrato,
                    $_SESSION['usuario_id']
                );
                
                // Executar a query
                if ($stmt->execute()) {
                    // Sucesso - redirecionar ou mostrar mensagem
                    $_SESSION['sucesso'] = "Jogador cadastrado com sucesso!";
                    header("Location: ../viwer/CadastrarClube04.php"); // CORREÇÃO: Redirecionamento adequado
                    exit();
                } else {
                    $erros[] = "Erro ao cadastrar jogador: " . $stmt->error;
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
        header("Location: ../viwer/CadastrarClube03.php"); // CORREÇÃO: Voltar para página de cadastro de jogador
        exit();
    }
}

// Fechar conexão se existir
if (isset($conexao)) {
    $conexao->close();
}
?>