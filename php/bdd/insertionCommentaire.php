<?php
include ("conn.php");

$modifRecette = new MaConnexion ("videogramme","","root","localhost");
$modifRecette->insertionCommentaire($_POST['ID_Video'],$_POST['ID_Utilisateur'],$_POST['Commentaire']);

//header("Location: ../blog.php");

?>