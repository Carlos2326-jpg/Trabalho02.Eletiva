<?php
include_once("Conexao.php");

function buscarNoticias() {
    global $conexao;
    
    $sql = "SELECT * FROM Noticia ORDER BY id DESC";
    $result = $conexao->query($sql);
    
    $noticias = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $noticias[] = $row;
        }
    }
    return $noticias;
}
?>
