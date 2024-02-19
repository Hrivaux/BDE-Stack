

<?php 

require_once 'sql.php';


    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $MDP = $_POST["mot_de_passe"];
    $identifiant = $_POST["identifiant"];
    $age = $_POST["age"];




 $req="INSERT INTO Users (identifiant, nom, prenom, email, mot_de_passe, age) VALUES ('$identifiant','$nom','$prenom','$email','$MDP','$age')";

 if ($bdd->exec($req))

 {
    echo "Insertion réusie";

 }
 else 
 {

    echo "Insertion ratée";
 }


    
    
    
    
    ?>