<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (Exception $e) {
    die("Erreur " . $e->getMessage());
}

$email = $_POST['email'];
$motDePasse = $_POST['motDePasse'];
// echo "Email: $email <br> Password: $motDePasse <br>";
//requete de verfication de email dans la base d donnee
$reponse = $bdd->prepare("SELECT * FROM Register WHERE email= :email");
$reponse->execute([
 'email' => $email,
]);


//recupration de l'id de user connecter
$user_id=$bdd->prepare("SELECT id FROM Register WHERE email = :email ");
$user_id->execute([
    'email' => $email,
   ]);

$donnees_user_id= $user_id->fetch();

//recuperation de l'id du role en fonction de l'id du user
$role_id=$bdd->prepare("SELECT id FROM Role WHERE id= :id ");
        $role_id->execute([
            'id' => $donnees_user_id['id'],
          ]);
$donnees_role_id = $role_id->fetch();
//fin................................................


$donnees=$reponse->fetch();
    if($donnees AND password_verify($_POST['motDePasse'],$donnees['motDePasse']) AND $donnees_role_id['id']== $donnees_user_id['id']){
        //demarre la session
        session_start();
        //stock email dans  variable session
        $_SESSION['email'] = $email;
        //selection du role 
        $role=$bdd->prepare("SELECT role FROM Role WHERE id= :id");
        $role->execute([
            'id' => $donnees_user_id['id'],
          ]);
        $nom_role= $role->fetch();
        //stock le nom du role dans variable session
        $_SESSION['role']= $nom_role['role'];
      //redirection dans la page index
        header('Location:index.php');

    
    }else if($user['email'] != $email){
        echo "Email ou mot de passe incorecte";
        
    }


?>
