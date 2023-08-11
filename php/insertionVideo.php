<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Images/Logo.Cookery_Island.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    
    <title>Document</title>
</head>
<body>
    
    <header>
    
    <?php   ?>
    <div class="header">
        <h1>Connexion</h1>
    </div>
        
    </header>

    <main class="formConnexion">

        <!-- Partie inscription -->
        
        <section class="partieConnexion">
            <h3>nouvelle video</h3>
            <form action="bdd/insertionVideos.php" method="POST">

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="inscriptionNom">Nom:</label>
                    <input class="tailleInput" id="inscriptionNom" type="text" placeholder="Nom " name="Nom">
                </div>
                
                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="inscriptionPrenom">Prenom:</label>
                    <input class="tailleInput" id="inscriptionPrenom" type="text" placeholder="Titre" name="Titre">
                </div>

                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="inscriptionAdresseMail">Adresse email:</label>
                    <input class="tailleInput" id="inscriptionAdresseMail" type="text" placeholder="Description" name="Description">
                </div>             
                
                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="inscriptionPseudo">Pseudo:</label>
                    <input class="tailleInput" id="inscriptionPseudo" type="text" placeholder="Date de Publication" name="DatePubli">
                </div>
                
                <div class="placementLabelFormulaire">
                    <label class="tailleLabel" for="inscriptionMotDePasse">Mot de passe:</label>
                    <input class="tailleInput" id="inscriptionMotDePasse" type="password" placeholder="Langue" name="Langue">
                </div>
                
                <input type="hidden" name="ID_Role" value="2">
                
                <input class="boutonFormulaire" type="submit" id="">

            </form>
        </section>
    </main>
    <footer>
        <?php ?>
    </footer>

    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script 
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" 
     integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
</body>
</html>