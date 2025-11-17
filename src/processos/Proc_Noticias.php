<?php
session_start();
include_once("Conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $resumo = filter_input(INPUT_POST, 'resumo', FILTER_SANITIZE_STRING);
    
    // Processamento da imagem
    $img_name = '';
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $img_tmp_name = $_FILES['img']['tmp_name'];
        $img_name = basename($_FILES['img']['name']);
        $upload_dir = '../public/Imagems/Noticias/';
        
        // Move o arquivo para o diretório de imagens
        move_uploaded_file($img_tmp_name, $upload_dir . $img_name);
    }

    $sql = "INSERT INTO Noticia (url, descricao, img, titulo) VALUES ('$url', '$resumo', '$img_name', '$title')";    

    if ($conexao->query($sql) === TRUE) {
        echo "Novo registro criado com sucesso!";
    } else {
        echo "Erro ao inserir registro: " . $conexao->error;
    }
}
$conexao->close();
?>