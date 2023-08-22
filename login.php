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
echo "Email: $email <br> Password: $motDePasse <br>";

$reponse = $bdd->prepare("SELECT * FROM Register WHERE email= :email");
$reponse->execute([
 'email' => $email,
]);

$donnees=$reponse->fetch();
  
    if($donnees AND password_verify($_POST['motDePasse'],$donnees['motDePasse'])){
        session_start();
        $_SESSION['email'] = $email;
        header('Location:index.php');

    
    }else if($user['email'] != $email){
        echo "Email ou mot de passe incorecte";
        
    }


?>
