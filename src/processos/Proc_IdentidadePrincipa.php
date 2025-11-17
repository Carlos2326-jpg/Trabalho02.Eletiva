<?php
session_start();
include_once("Conexao.php");

// Verificar se o usuário está logado (opcional, mas recomendado)
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../viwer/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validação e sanitização dos dados
    $oficialName = filter_input(INPUT_POST, 'oficialName', FILTER_SANITIZE_STRING);
    $apelido = filter_input(INPUT_POST, 'apelido', FILTER_SANITIZE_STRING);
    $sigla = filter_input(INPUT_POST, 'sigla', FILTER_SANITIZE_STRING);
    $dataFundacao = filter_input(INPUT_POST, 'dataFundacao', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $cor = filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING);
    $mascote = filter_input(INPUT_POST, 'mascote', FILTER_SANITIZE_STRING);
    
    // Validações básicas
    $erros = [];
    
    if (empty($oficialName)) {
        $erros[] = "Nome oficial é obrigatório";
    }
    
    if (empty($apelido)) {
        $erros[] = "Apelido é obrigatório";
    }
    
    if (empty($sigla) || strlen($sigla) > 5) {
        $erros[] = "Sigla é obrigatória e deve ter no máximo 5 caracteres";
    }
    
    if (empty($dataFundacao)) {
        $erros[] = "Data de fundação é obrigatória";
    }
    
    if (empty($cep)) {
        $erros[] = "CEP é obrigatório";
    }
    
    if (empty($estado) || strlen($estado) != 2) {
        $erros[] = "Estado é obrigatório e deve ter 2 caracteres (UF)";
    }
    
    if (empty($cidade)) {
        $erros[] = "Cidade é obrigatória";
    }
    
    if (empty($cor)) {
        $erros[] = "Cor é obrigatória";
    }
    
    if (empty($mascote)) {
        $erros[] = "Mascote é obrigatório";
    }
    
    // Processamento das imagens
    $escudo_name = '';
    $uniforme_name = '';
    
    // Processar escudo
    if (isset($_FILES['escudo']) && $_FILES['escudo']['error'] == 0) {
        $escudo_info = processarImagem($_FILES['escudo'], 'escudos');
        if ($escudo_info['sucesso']) {
            $escudo_name = $escudo_info['nome_arquivo'];
        } else {
            $erros[] = "Erro no escudo: " . $escudo_info['erro'];
        }
    } else {
        $erros[] = "Escudo é obrigatório";
    }
    
    // Processar uniforme
    if (isset($_FILES['uniforme']) && $_FILES['uniforme']['error'] == 0) {
        $uniforme_info = processarImagem($_FILES['uniforme'], 'uniformes');
        if ($uniforme_info['sucesso']) {
            $uniforme_name = $uniforme_info['nome_arquivo'];
        } else {
            $erros[] = "Erro no uniforme: " . $uniforme_info['erro'];
        }
    } else {
        $erros[] = "Uniforme é obrigatório";
    }
    
    // Se não há erros, inserir no banco
    if (empty($erros)) {
        // Usar prepared statements para evitar SQL Injection
        $sql = "INSERT INTO IdentidadePrincipal 
                (nome, apelido, sigla, data_fundacao, cep, estado, cidade, cor_principal, mascote, escudo_time, uniforme_time) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conexao->prepare($sql);
        
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("sssssssssss", 
                $oficialName, 
                $apelido, 
                $sigla, 
                $dataFundacao, 
                $cep, 
                $estado, 
                $cidade, 
                $cor, 
                $mascote, 
                $escudo_name, 
                $uniforme_name
            );
            
            if ($stmt->execute()) {
                $_SESSION['sucesso'] = "Clube cadastrado com sucesso!";
                header("Location: ../viwer/MapaClube.php");
                exit();
            } else {
                $_SESSION['erro'] = "Erro ao cadastrar clube: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            $_SESSION['erro'] = "Erro na preparação da query: " . $conexao->error;
        }
    } else {
        // Armazenar erros na sessão para exibir no formulário
        $_SESSION['erros'] = $erros;
        $_SESSION['dados_form'] = $_POST; // Para preencher o formulário novamente
    }
    
    // Redirecionar de volta ao formulário em caso de erro
    header("Location: ../viwer/CadastrarClube01.php");
    exit();
}

// Função para processar upload de imagens
function processarImagem($arquivo, $pasta) {
    $resultado = ['sucesso' => false, 'nome_arquivo' => '', 'erro' => ''];
    
    // Diretório de upload
    $upload_dir = "../public/Imagems/Logos/$pasta/";
    
    // Criar diretório se não existir
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    
    // Verificar se é uma imagem
    $check = getimagesize($arquivo["tmp_name"]);
    if ($check === false) {
        $resultado['erro'] = "Arquivo não é uma imagem.";
        return $resultado;
    }
    
    // Verificar tamanho do arquivo (5MB máximo)
    if ($arquivo["size"] > 5000000) {
        $resultado['erro'] = "Arquivo muito grande. Máximo 5MB.";
        return $resultado;
    }
    
    // Permitir apenas certos formatos
    $extensoes_permitidas = ["jpg", "jpeg", "png", "gif"];
    $extensao = strtolower(pathinfo($arquivo["name"], PATHINFO_EXTENSION));
    
    if (!in_array($extensao, $extensoes_permitidas)) {
        $resultado['erro'] = "Apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
        return $resultado;
    }
    
    // Gerar nome único para o arquivo
    $nome_arquivo = uniqid() . "_" . time() . "." . $extensao;
    $caminho_completo = $upload_dir . $nome_arquivo;
    
    // Mover arquivo
    if (move_uploaded_file($arquivo["tmp_name"], $caminho_completo)) {
        $resultado['sucesso'] = true;
        $resultado['nome_arquivo'] = $nome_arquivo;
    } else {
        $resultado['erro'] = "Erro ao fazer upload do arquivo.";
    }
    
    return $resultado;
}

$conexao->close();
?>