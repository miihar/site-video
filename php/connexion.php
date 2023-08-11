<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../image/style.css">

    <title>Document</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <!-- logo -->
                <a class="navbar-brand" href="#"><i class="fa-solid fa-pizza-slice fa-2xl"></i></a>

                <!-- search bar -->
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- les truc à coté -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="video.php"><i class="fa-solid fa-house"></i> Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-comments"></i> Forum</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="connexion.php"><i class="fa-solid fa-user"></i> Se connecter</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- formulaire de connexion -->
        <section class="card partieConnexion" style="width: 18rem;">
            <h3>Connectez-vous</h3>
            <form class="card-body" action="BDD/select.php" method="POST">
                <div class="mb-3 placementLabelFormulaire">
                    <label class="tailleLabel" for="connexionUtilisateur">Utilisateur:</label>
                    <input class="tailleInput" id="connexionUtilisateur" type="text" name="identifiant" placeholder="pseudo">
                </div>
                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="connexionMotDePasse">Mot de passe:</label>
                    <input class="tailleInput" id="connexionMotDePasse" type=" password" name="mdp" placeholder="Mot de passe">
                </div>

                <input class="boutonFormulaire" type="submit" name="" id="">

            </form>
        </section>

        <!-- Partie inscription -->

        <section class="card partieConnexion" style="width: 18rem;">
            <h3>Inscrivez-vous</h3>
            <form action="BDD/insertionusers.php" method="POST">

                <div class="mb-3 placementLabelFormulaire">
                    <label class="tailleLabel" for="inscriptionNom">Nom:</label>
                    <input class="tailleInput" id="inscriptionNom" type="text" placeholder="Nom" name="Nom">
                </div>

                <div class="mb-3 placementLabelFormulaire">
                    <label class="tailleLabel" for="inscriptionPrenom">Prenom:</label>
                    <input class="tailleInput" id="inscriptionPrenom" type="text" placeholder="Prenom" name="Prenom">
                </div>

                <div class="mb-3 placementLabelFormulaire">
                    <label class="tailleLabel" for="inscriptionAdresseMail">Adresse email:</label>
                    <input class="tailleInput" id="inscriptionAdresseMail" type="text" placeholder="AdresseMail" name="Email">
                </div>

                <div class="mb-3 placementLabelFormulaire">
                    <label class="tailleLabel" for="inscriptionPseudo">Pseudo:</label>
                    <input class="tailleInput" id="inscriptionPseudo" type="text" placeholder="Pseudo" name="Pseudo">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="inscriptionMotDePasse">Mot de passe:</label>
                    <input class="tailleInput" id="inscriptionMotDePasse" type="password" placeholder="Mot de passe" name="Mot_De_Passe">
                </div>

                <input type="hidden" name="ID_Role" value="2">

                <input class="boutonFormulaire" type="submit" id="">

            </form>
        </section>
    </main>
    <footer>
        <?php ?>
    </footer>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
</body>

</html>