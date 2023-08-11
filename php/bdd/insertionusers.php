<?php
include ("conn.php");

$connexionbdd = new MaConnexion ("videogramme","","root","localhost");



$password = $_POST['Mot_De_Passe'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
echo "Mot de passe en claire : " . $password . "<br>";
echo "Mots de passe haché : " . $hashedPassword . "<br>";
$connexionbdd->insertionUtilisateur($_POST['Nom'],$_POST['Prenom'],$_POST['Pseudo'], $_POST['Email'],$hashedPassword,$_POST['ID_Role']);
// Exemple d'utilisation de password_verify() pour verifier un mot de passe
/*
$userInputPassword = $_POST['Mot_De_Passe'];

if (password_verify($userInputPassword, $hashedPassword)) {
    echo "Mot de passe valide !";
} else {
    echo "Mot de passe incorrect !";
}
*/
//header("Location: ../../index.php");


?>