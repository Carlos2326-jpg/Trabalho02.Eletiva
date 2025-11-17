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
    
    // Validação e sanitização dos dados numéricos
    $campeonatos_nacionais = filter_input(INPUT_POST, 'campeonatos_nacionais', FILTER_VALIDATE_INT, 
        ['options' => ['default' => 0, 'min_range' => 0]]);
    $copas_nacionais = filter_input(INPUT_POST, 'copas_nacionais', FILTER_VALIDATE_INT, 
        ['options' => ['default' => 0, 'min_range' => 0]]);
    $torneios_nacionais = filter_input(INPUT_POST, 'torneios_nacionais', FILTER_VALIDATE_INT, 
        ['options' => ['default' => 0, 'min_range' => 0]]);
    $outros_nacionais = filter_input(INPUT_POST, 'outros_nacionais', FILTER_VALIDATE_INT, 
        ['options' => ['default' => 0, 'min_range' => 0]]);
    
    $campeonatos_internacionais = filter_input(INPUT_POST, 'campeonatos_internacionais', FILTER_VALIDATE_INT, 
        ['options' => ['default' => 0, 'min_range' => 0]]);
    $copas_internacionais = filter_input(INPUT_POST, 'copas_internacionais', FILTER_VALIDATE_INT, 
        ['options' => ['default' => 0, 'min_range' => 0]]);
    $torneios_internacionais = filter_input(INPUT_POST, 'torneios_internacionais', FILTER_VALIDATE_INT, 
        ['options' => ['default' => 0, 'min_range' => 0]]);
    $outros_internacionais = filter_input(INPUT_POST, 'outros_internacionais', FILTER_VALIDATE_INT, 
        ['options' => ['default' => 0, 'min_range' => 0]]);
    
    $campeonatos_estaduais = filter_input(INPUT_POST, 'campeonatos_estaduais', FILTER_VALIDATE_INT, 
        ['options' => ['default' => 0, 'min_range' => 0]]);
    $copas_estaduais = filter_input(INPUT_POST, 'copas_estaduais', FILTER_VALIDATE_INT, 
        ['options' => ['default' => 0, 'min_range' => 0]]);
    $torneios_estaduais = filter_input(INPUT_POST, 'torneios_estaduais', FILTER_VALIDATE_INT, 
        ['options' => ['default' => 0, 'min_range' => 0]]);
    
    // Validação e sanitização dos textos
    $historico_clube = filter_input(INPUT_POST, 'historico_clube', FILTER_SANITIZE_STRING);
    $conquistas_destaque = filter_input(INPUT_POST, 'conquistas_destaque', FILTER_SANITIZE_STRING);
    
    // Limitar o tamanho dos textos conforme definido no front-end
    if (strlen($historico_clube) > 1000) {
        $historico_clube = substr($historico_clube, 0, 1000);
    }
    
    if (strlen($conquistas_destaque) > 500) {
        $conquistas_destaque = substr($conquistas_destaque, 0, 500);
    }

    // Se não há erros, inserir no banco
    if (empty($erros)) {
        try {
            // Verificar se já existe um registro para este usuário
            $sql_check = "SELECT id FROM historico_clube WHERE usuario_id = ?";
            $stmt_check = $conexao->prepare($sql_check);
            $stmt_check->bind_param("i", $_SESSION['usuario_id']);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();
            
            if ($result_check->num_rows > 0) {
                // Atualizar registro existente
                $sql = "UPDATE historico_clube SET 
                        campeonatos_nacionais = ?,
                        copas_nacionais = ?,
                        torneios_nacionais = ?,
                        outros_nacionais = ?,
                        campeonatos_internacionais = ?,
                        copas_internacionais = ?,
                        torneios_internacionais = ?,
                        outros_internacionais = ?,
                        campeonatos_estaduais = ?,
                        copas_estaduais = ?,
                        torneios_estaduais = ?,
                        historico_clube = ?,
                        conquistas_destaque = ?,
                        data_atualizacao = CURRENT_TIMESTAMP
                        WHERE usuario_id = ?";
            } else {
                // Inserir novo registro
                $sql = "INSERT INTO historico_clube 
                        (campeonatos_nacionais, copas_nacionais, torneios_nacionais, outros_nacionais,
                         campeonatos_internacionais, copas_internacionais, torneios_internacionais, outros_internacionais,
                         campeonatos_estaduais, copas_estaduais, torneios_estaduais,
                         historico_clube, conquistas_destaque, usuario_id) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            }
            
            $stmt = $conexao->prepare($sql);
            
            if ($stmt) {
                // Vincular parâmetros
                if ($result_check->num_rows > 0) {
                    // UPDATE - 14 parâmetros
                    $stmt->bind_param(
                        "iiiiiiiiiiissi", 
                        $campeonatos_nacionais, 
                        $copas_nacionais, 
                        $torneios_nacionais, 
                        $outros_nacionais,
                        $campeonatos_internacionais,
                        $copas_internacionais,
                        $torneios_internacionais,
                        $outros_internacionais,
                        $campeonatos_estaduais,
                        $copas_estaduais,
                        $torneios_estaduais,
                        $historico_clube,
                        $conquistas_destaque,
                        $_SESSION['usuario_id']
                    );
                } else {
                    // INSERT - 14 parâmetros
                    $stmt->bind_param(
                        "iiiiiiiiiiissi", 
                        $campeonatos_nacionais, 
                        $copas_nacionais, 
                        $torneios_nacionais, 
                        $outros_nacionais,
                        $campeonatos_internacionais,
                        $copas_internacionais,
                        $torneios_internacionais,
                        $outros_internacionais,
                        $campeonatos_estaduais,
                        $copas_estaduais,
                        $torneios_estaduais,
                        $historico_clube,
                        $conquistas_destaque,
                        $_SESSION['usuario_id']
                    );
                }
                
                // Executar a query
                if ($stmt->execute()) {
                    // Sucesso - redirecionar para página de confirmação
                    $_SESSION['sucesso'] = "Histórico e conquistas cadastrados com sucesso!";
                    header("Location: ../viwer/PainelClube.php");
                    exit();
                } else {
                    $erros[] = "Erro ao cadastrar histórico: " . $stmt->error;
                }
                
                $stmt->close();
                $stmt_check->close();
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
        header("Location: ../viwer/CadastrarClube04.php");
        exit();
    }
}

// Fechar conexão se existir
if (isset($conexao)) {
    $conexao->close();
}
?>