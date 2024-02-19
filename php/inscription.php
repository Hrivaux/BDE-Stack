

<?php 

require_once 'sql.php';


    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $MDP = $_POST["password"];
    $identifiant = $_POST["identifiant"];
    $age = $_POST["age"];




 $req="INSERT INTO Users (identifiant, nom, prenom, email, password, age) VALUES ('$identifiant','$nom','$prenom','$email','$MDP','$age')";

 if ($bdd->exec($req))

 {
    echo "Insertion réusie";

 }
 else 
 {

    echo "Insertion ratée";
 }


    
    
    
    
    ?>