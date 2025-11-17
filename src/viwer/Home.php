<?php 

include_once("../processos/verificaLogin.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/Home.css">
    <title>RadarVôlei</title>
</head>

<body>

    <section id="section-bloc">
        <section class="section-colun">
            <img src="../public/Imagems/Noticias/Noticia01.png" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio02.jpg" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio05.jpg" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio07.jpg" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio10.jpg" alt="">
        </section>

        <section id="section">

            <section id="section-home">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="../public/Imagems/Carrosel01.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../public/Imagems/Carrosel02.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../public/Imagems/Carrosel03.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>

            <section id="section-home">
                <div class="block-rules">
                    <h2>Regulamentos do Vôlei</h2>
                    <div class="block-content">
                        <img src="../public/Imagems/Logos/Logo01.jpg" alt="Desenho de uma quadra de vôlei">
                        <p>Você já se confundiu com uma regra do vôlei? Aqui a gente descomplica! Dos **fundamentos básicos** às regras mais complexas, trazemos o que você precisa para assistir e jogar como um expert.</p>
                    </div>
                </div>
            </section>

            <section id="section-home">
                <div class="block-map-volei">
                    <h2>Mapa do Vôlei</h2>
                    <div class="block-content">
                        <p>Não se perca no emaranhado de informações. Aqui, o vôlei ganha um mapa. Trazemos **contexto, análises** e as principais notícias, mostrando como tudo se conecta no mundo da quadra.</p>
                        <img src="../public/Imagems/Logos/Logo02.jpg" alt="Jogadores de vôlei em ação">
                    </div>
                </div>
            </section>

            <section id="section-home">
                <div class="info-block block-clubs">
                    <h2>Mapa dos Clubes</h2>
                    <div class="block-content">
                        <img src="../public/Imagems/Logos/Logo03.jpg.jpg" alt="Logo de uma bola de vôlei em chamas">
                        <p>**Raio-X completo** dos clubes. Mapeamos elencos, analisamos performances e acompanhamos o mercado da bola para você ficar por dentro de todas as movimentações.</p>
                    </div>
                </div>
            </section>

        </section>

        <section class="section-colun">
            <img src="../public/Imagems/Anuncios/Anuncio03.jpg" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio04.jpg" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio06.jpg" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio08.jpg" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio09.jpg" alt="">
        </section>
    </section>

    <script src="../js/header.js"></script>
    <script src="../js/Nav01.js"></script>
    <footer id="footer-container"></footer>
    <script src="../js/footer.js"></script>
</body>

</html>