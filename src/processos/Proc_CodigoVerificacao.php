<?php
session_start();
include_once("Conexao.php");

class CodigoVerificacaoController {
    
    // Função para verificar o código digitado
    public function verificarCodigo() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $_SESSION['msg'] = "<p style='color:red;'>Método de requisição inválido!</p>";
            return false;
        }
        
        // Obtém o código dos 6 inputs individuais
        $codigo_digitado = '';
        
        // Pega os valores dos inputs (assumindo que são os primeiros 6 inputs do formulário)
        $inputs = $_POST;
        $input_count = 0;
        
        foreach ($inputs as $key => $value) {
            if ($input_count < 6 && !empty($value) && is_string($value)) {
                $codigo_digitado .= $value;
                $input_count++;
            }
        }
        
        // Verifica se temos exatamente 6 dígitos
        if (strlen($codigo_digitado) !== 6) {
            $_SESSION['msg'] = "<p style='color:red;'>Por favor, preencha todos os 6 dígitos do código!</p>";
            return false;
        }
        
        // Verifica se o código contém apenas números
        if (!preg_match('/^[0-9]{6}$/', $codigo_digitado)) {
            $_SESSION['msg'] = "<p style='color:red;'>O código deve conter apenas números!</p>";
            return false;
        }
        
        // Verifica se o código na sessão existe e coincide
        if (isset($_SESSION['codigo_verificacao']) && 
            isset($_SESSION['codigo_expira']) && 
            $_SESSION['codigo_verificacao'] === $codigo_digitado &&
            time() < $_SESSION['codigo_expira']) {
            
            // Marca o email como verificado
            $_SESSION['email_verificado'] = $_SESSION['email_para_verificacao'];
            
            // Limpa os dados temporários do código
            unset($_SESSION['codigo_verificacao']);
            unset($_SESSION['codigo_expira']);
            
            $_SESSION['msg'] = "<p style='color:green;'>Código verificado com sucesso! Agora defina sua nova senha.</p>";
            return true;
        } else {
            // Verifica se o código expirou
            if (isset($_SESSION['codigo_expira']) && time() >= $_SESSION['codigo_expira']) {
                $_SESSION['msg'] = "<p style='color:red;'>Código expirado! Solicite um novo código.</p>";
            } else {
                $_SESSION['msg'] = "<p style='color:red;'>Código inválido! Tente novamente.</p>";
            }
            return false;
        }
    }
    
    // Função para gerar código aleatório
    private function gerarCodigoVerificacao($tamanho = 6) {
        return substr(str_shuffle("0123456789"), 0, $tamanho);
    }
    
    // Função para reenviar código
    public function reenviarCodigo() {
        if (!isset($_SESSION['email_para_verificacao'])) {
            $_SESSION['msg'] = "<p style='color:red;'>Sessão expirada. Volte para a página inicial.</p>";
            return false;
        }
        
        $email = $_SESSION['email_para_verificacao'];
        $codigo = $this->gerarCodigoVerificacao();
        
        // Atualiza na sessão
        $_SESSION['codigo_verificacao'] = $codigo;
        $_SESSION['codigo_expira'] = time() + 900; // 15 minutos
        
        // Simula envio de email (implemente com sua solução de email)
        if ($this->simularEnvioEmail($email, $codigo)) {
            $_SESSION['msg'] = "<p style='color:green;'>Novo código enviado para seu email!</p>";
            return true;
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao reenviar código. Tente novamente.</p>";
            return false;
        }
    }
    
    // Função para simular envio de email (substitua pela sua implementação real)
    private function simularEnvioEmail($email, $codigo) {
        error_log("Código de verificação para $email: $codigo");
        return true;
    }
}

// Processamento principal
$codigoController = new CodigoVerificacaoController();

// Verifica se é uma requisição POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Detecta a ação baseada nos parâmetros recebidos
    if (isset($_POST['reenviar_codigo'])) {
        // Ação de reenviar código
        if ($codigoController->reenviarCodigo()) {
            header("Location: ../viwer/CodigoVerificacao.php");
        } else {
            header("Location: ../viwer/CodigoVerificacao.php");
        }
        exit();
        
    } else {
        // Ação de verificar código (submit normal do formulário)
        if ($codigoController->verificarCodigo()) {
            header("Location: ../viwer/RedefinirSenha.php");
        } else {
            header("Location: ../viwer/CodigoVerificacao.php");
        }
        exit();
    }
} else {
    // Se não for POST, redireciona para a página de código
    $_SESSION['msg'] = "<p style='color:red;'>Acesso inválido!</p>";
    header("Location: ../viwer/CodigoVerificacao.php");
    exit();
}
?>