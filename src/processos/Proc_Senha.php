<?php
session_start();
include_once("Conexao.php");

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['msg'] = "<p style='color:red;'>Método de requisição inválido!</p>";
    header("Location: RedefinirSenha.php");
    exit();
}

// Verifica se o token de verificação está na sessão (proveniente da página de código)
if (!isset($_SESSION['email_verificado']) || !$_SESSION['email_verificado']) {
    $_SESSION['msg'] = "<p style='color:red;'>Por favor, verifique seu email primeiro!</p>";
    header("Location: CodigoVerificacao.php");
    exit();
}

// Sanitização e validação dos dados
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$confSenha = filter_input(INPUT_POST, 'confSenha', FILTER_SANITIZE_STRING);

// Validações
$erros = [];

// Verifica se as senhas foram fornecidas
if (empty($senha) || empty($confSenha)) {
    $erros[] = "Por favor, preencha ambos os campos de senha.";
}

// Verifica se as senhas coincidem
if ($senha !== $confSenha) {
    $erros[] = "As senhas não coincidem.";
}

// Valida força da senha
if (strlen($senha) < 8) {
    $erros[] = "A senha deve ter pelo menos 8 caracteres.";
}

if (!preg_match('/[A-Z]/', $senha)) {
    $erros[] = "A senha deve conter pelo menos uma letra maiúscula.";
}

if (!preg_match('/[a-z]/', $senha)) {
    $erros[] = "A senha deve conter pelo menos uma letra minúscula.";
}

if (!preg_match('/[0-9]/', $senha)) {
    $erros[] = "A senha deve conter pelo menos um número.";
}

if (!preg_match('/[!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>\/?]/', $senha)) {
    $erros[] = "A senha deve conter pelo menos um caractere especial.";
}

// Se houver erros, retorna para o formulário
if (!empty($erros)) {
    $_SESSION['msg'] = "<p style='color:red;'>" . implode("<br>", $erros) . "</p>";
    header("Location: RedefinirSenha.php");
    exit();
}

// Recupera o email da sessão
$email = $_SESSION['email_verificado'];

// Criptografia da senha (usando password_hash que é mais seguro que MD5)
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// Prepara a query usando prepared statements para evitar SQL injection
$sql = "UPDATE Usuario SET senha = ? WHERE email = ?";
$stmt = mysqli_prepare($mySql, $sql);

if ($stmt) {
    // Associa os parâmetros
    mysqli_stmt_bind_param($stmt, "ss", $senha_hash, $email);
    
    // Executa a query
    if (mysqli_stmt_execute($stmt)) {
        // Verifica se alguma linha foi afetada
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Limpa a sessão de verificação
            unset($_SESSION['email_verificado']);
            unset($_SESSION['codigo_verificacao']);
            
            $_SESSION['msg'] = "<p style='color:green;'>Senha redefinida com sucesso! Faça login com sua nova senha.</p>";
            header("Location: Login.php");
            exit();
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro: Email não encontrado ou senha igual à anterior.</p>";
            header("Location: RedefinirSenha.php");
            exit();
        }
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao executar a query: " . mysqli_error($mySql) . "</p>";
        header("Location: RedefinirSenha.php");
        exit();
    }
    
    // Fecha o statement
    mysqli_stmt_close($stmt);
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro na preparação da query: " . mysqli_error($mySql) . "</p>";
    header("Location: RedefinirSenha.php");
    exit();
}

// Fecha a conexão
mysqli_close($mySql);
?>