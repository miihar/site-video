<?php
class MaConnexion{
    // étape 1 : ici on met les proprietées
    private $nomBaseDeDonnees;
    private $motDePasse;
    private $nomUtilisateur;
    private $hote;
    private $connexionPDO;

    public function __construct($nomBaseDeDonnees, $motDePasse, $nomUtilisateur, $hote){
        
        $this -> nomBaseDeDonnees = $nomBaseDeDonnees;
        $this -> motDePasse = $motDePasse;
        $this -> nomUtilisateur = $nomUtilisateur;
        $this -> hote = $hote;

        try {
            $dsn = "mysql:host=$this->hote;dbname=$this->nomBaseDeDonnees;charset=utf8mb4";
            $this->connexionPDO = new PDO($dsn, $this->nomUtilisateur, $this->motDePasse);
            $this->connexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "erreur : ".$e->getMessage();
        }        
    }

    //Fonction qui selectionne tous les elements d'une table
    public function select($table){
        try {
            $requete = "SELECT * from $table";
            $resultat = $this->connexionPDO->query($requete);
                
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
            
        } catch (PDOException $e) {
                echo "Erreur : ".$e->getMessage();
        }  
    }

    //fonction pour selectionner des utilisateurs dans la bdd
    public function selectUtilisateur($identifiant){
        try {
            $requete = "SELECT * from utilisateur where Pseudo = :identifiant";

            $requete_preparee = $this->connexionPDO->prepare($requete);
            $requete_preparee->bindParam(":identifiant", $identifiant,PDO::PARAM_STR);
            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);

            return $resultat;

        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }
    // Fonction selection des Video par categorie (fonctionne)
    public function selectVideo_Categorie($categorie){
        try {
            $requete = "SELECT * from Video where Categorie = ?";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            $requete_preparee->bindValue(1,$categorie,PDO::PARAM_STR);
            
            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }
        // Fonction selection des video par l'id (fonctionne..)
    public function selectVideo_ID($idVideo){
        try {
            $requete = "SELECT * from video where ID_Video = ?";

            $requete_preparee = $this->connexionPDO->prepare($requete);
            $requete_preparee->bindValue(1,$idVideo,PDO::PARAM_STR);
            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }



    // Fonction selection des commentaire et leurs editeurs par rapport a la Video 
    public function selectCommentaireUtilisateurVideo($idVideo){
        
        try {
            $requete = "SELECT * FROM `commentaire`  
                INNER JOIN utilisateur ON utilisateur.ID_Utilisateur = commentaire.ID_Utilisateur 
                where commentaire.ID_Video = ?";
            
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1, $idVideo, PDO::PARAM_STR);

            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }
    
    // Fonction d'insertion des Videos (fonctionne)
    public function insertionVideo($nom,$titre,$descript,$datePubli,$lang){
        try {
            $requete = " INSERT INTO Video(Nom, Titre, Description,DatePublication,Langue)
                VALUES (:Nom, :Titre, :Description,:DatePubli,:Langue)" ;
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':Nom',$nom,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':Titre',$titre,PDO::PARAM_STR,50);
            $requete_preparee->bindParam(':Description',$descript,PDO::PARAM_STR);
            $requete_preparee->bindParam(':DatePubli',$datePubli,PDO::PARAM_STR);
            $requete_preparee->bindValue(':Langue',$lang,PDO::PARAM_STR);

            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";

        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }
    

    //Fonction d'insertion d'utilisateur 
    public function insertionUtilisateur($nom,$prenom,$pseudo,$mail,$mdp,$id){
        try {
            $requete = " INSERT INTO utilisateur(Nom, Prenom,Email,Pseudo,MDP,ID_Role)
                VALUES (:Nom, :Prenom,:Email,:Pseudo,:MDP,:ID_Role)";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':Nom',$nom,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':Prenom',$prenom,PDO::PARAM_STR,50);
            $requete_preparee->bindParam(':Email',$mail,PDO::PARAM_STR);
            $requete_preparee->bindParam(':Pseudo',$pseudo,PDO::PARAM_STR);
            $requete_preparee->bindParam(':MDP',$mdp,PDO::PARAM_STR);
            $requete_preparee->bindParam(':ID_Role',$id,PDO::PARAM_INT);
            
            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";

        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    //Fonction insertion commentaire
    public function insertionCommentaire($ID_Video, $ID_Utilisateur, $Commentaire){
        try {
            $requete = " INSERT INTO `commentaire`(ID_Video, ID_Utilisateur, Commentaire)
            VALUES (:ID_Video, :ID_Utilisateur, :Commentaire)";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            
            $requete_preparee->bindParam(':ID_Video', $ID_Video, PDO::PARAM_INT);
            $requete_preparee->bindParam(':ID_Utilisateur', $ID_Utilisateur, PDO::PARAM_INT);
            $requete_preparee->bindParam(':Commentaire', $Commentaire, PDO::PARAM_STR);
            
            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    // Fonction de mis à jour des Videos (fonctionne)
    public function maj_Video($nom,$titre,$descript,$datePubli,$lang){
        try {

            $requete = "UPDATE Video SET Nom = ?, Titre = ?,Description = ?, DatePublication = ?,
                Langue = ?
                WHERE ID_Video = ?";

            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1,$nom,PDO::PARAM_STR);
            $requete_preparee->bindValue(2,$titre,PDO::PARAM_STR);
            $requete_preparee->bindValue(3,$descript,PDO::PARAM_STR);
            $requete_preparee->bindValue(4,$datePubli,PDO::PARAM_STR);
            $requete_preparee->bindValue(5,$lang,PDO::PARAM_STR);


            $requete_preparee->execute();

            echo("mise a jour reussi");
            return "mise a jour reussi";
        
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

        // Fonction de mis à jour des commentaires (fonctionne)
    public function maj_Commentaire($ID_Utilisateur,$ID_Video,$Commentaire,$ID_Commentaire){
        try { 
            $requete = "UPDATE commentaire SET ID_Utilisateur = ?, ID_Video = ?, Commentaire = ?
                WHERE ID_Commentaire = ?";
            
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1,$ID_Utilisateur,PDO::PARAM_INT);
            $requete_preparee->bindValue(2,$ID_Video,PDO::PARAM_INT);
            $requete_preparee->bindValue(3,$Commentaire,PDO::PARAM_STR);
            $requete_preparee->bindValue(4,$ID_Commentaire,PDO::PARAM_INT);


            $requete_preparee->execute();

            echo("mise a jour reussi");
            return "mise a jour reussi";
        
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }
    
    // Fonction de suppression des Videos(fonctionne)
    public function deleteVideo($idVideo){
        try{
            $requete = "DELETE FROM video WHERE ID_Video =  ?";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindvalue(1,$idVideo,PDO::PARAM_INT);
            $requete_preparee->execute();
            echo 'suppression reussie';
            return $requete_preparee;

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
    
    
    //Fonction qui supprime un commentaire
    public function deleteCommentaire($ID_Commentaire){
        try{
            $requete = "DELETE FROM commentaire WHERE ID_Commentaire = ?";
            $requete_preparee = $this->connexionPDO->prepare($requete);
                
            $requete_preparee->bindParam(1, $ID_Commentaire, PDO::PARAM_INT);
            $requete_preparee->execute();
            echo 'suppression reussie';
            return $requete_preparee;
    
        } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
        }
    }

}

//$test = new MaConnexion("videogramme", "", "root", "localhost");


//$supp = $test->select("video");
//var_dump($supp);
// $supp = $test->deleteCommentaire(3);
// var_dump($supp);
//$inserting = $test->maj_Ingredient("ingréeza","ezngré","ingezré","ingzaré","ingezaé","ingezaé","inezagré","ingrezaé","inggré","ingrfré","ingré","ingré","ingré","ingré","ingré",1);
//var_dump($inserting);
// $maj = $test->maj_Video("");
// $insertuti = $test->insertionUtilisateur("jon","snow","king of the north","lovemyaunt",1);
// var_dump($insertuti);


?>
