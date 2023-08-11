<?php
include ("conn.php");

$modifRecette = new MaConnexion ("videogramme","","root","localhost");
$modifRecette->insertionVideo($_POST['Nom'],$_POST['Titre'],$_POST['Description'], $_POST['DatePubli'],$_POST['Langue']);

//header("Location: ../admin.php");

?>