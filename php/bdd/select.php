
<?php
session_start();

include("conn.php");
$selection = new MaConnexion("videogramme", "", "root", "localhost");
// $test = $selection->select('utilisateur');
// var_dump($test);

$password = $_POST['mdp'];
$id = $_POST['identifiant'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


if (password_verify($password, $hashedPassword)) {
    echo "Mot de passe valide !";
} else {
    echo "Mot de passe incorrect !";
}


$select = $selection->selectUtilisateur($id);


if (!empty($select)) {
    echo " une correspondance à été trouvée " . "et : ";
    if ($id === $select[0]["Pseudo"] && password_verify($password,$select[0]["MDP"])){
        session_unset();
        $_SESSION["idUser"]=$select[0]["Pseudo"];
        $_SESSION["Nom"]=$select[0]["Nom"];
        $_SESSION["Prenom"]=$select[0]["Prenom"];
        $_SESSION["ID_utilisateur"]=$select[0]["ID_Utilisateur"];
        $_SESSION["Role"]=$select[0]["ID_Role"];
        
        echo "its ok";
    } else{
        echo " nop en fait";
    }

    //verifier que les infirmations entrée correspondent bien a une personne
    // garder nom prenom et stocker dans la variable 
    // faire sous forme $_session["nom"] = $bddvar["nom"]/$_post["nom"];
    // reprendre les donnée de la bdd et stocker dans la session

} else {
    echo "ya r";
    // header("Location:interface.php");
}
var_dump($_SESSION);

header("---------------/index.php");
?>


<!--         
    switch ($select){
        case $select[0]["Pseudo"] === "client":
            echo "c'est un yencli";
            break;
        case $select[0]["role"] === "admin":
            echo "c'est un admin";
             break;
        case $select[0]["role"] === "":
            echo "il n'est pas des notre";
            break;
    } 
-->