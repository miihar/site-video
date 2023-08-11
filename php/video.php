<?php
include "bdd/conn.php";
$conn = new MaConnexion("videogramme", "", "root", "localhost");
$video = $conn->select("video");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <header></header>
    <section>
        <iframe src="https://player.vimeo.com/video/384418017" frameborder="0"></iframe>
    </section>
    <main>
        <!-- partie avec le carousel -->
        <section>
            <div id="carouselExample" class="carousel slide" style="width: 20rem; height:15rem;">
                <div class="carousel-inner">
                    <?php
                    foreach ($video as $uneDonnee) {
                        //var_dump($uneDonnee);
                        echo
                        '<div class="carousel-item active">
                            <div class="card" style="width: 20rem;">
                                    <img src="' . $uneDonnee["Image"] . '" class="d-block w-100 card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $uneDonnee["Titre"] . '</h5>
                                        <p class="card-text"> ' . $uneDonnee["Description"] . ' </p>
                                        <a href="' . $uneDonnee["ID_Video"] . '" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>';
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <!-- partie avec les cartes -->
        <section class="d-flex" >
            <?php 
                foreach ($video as $uneDonnee) {
                    echo
                    '<div class="card" style="width: 18rem;">
                        <img src="' . $uneDonnee["Image"] .'" class="card-img-top" alt="-----">
                        <div class="card-body">
                            <p class="card-text">' . $uneDonnee["Titre"] . '</p>
                        </div>
                    </div>'
                ;}
            
            ?>
        </section>
    </main>

    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>