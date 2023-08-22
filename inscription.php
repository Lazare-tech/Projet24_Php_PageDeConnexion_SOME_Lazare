<?php 
try{
    $bdd= new PDO('mysql:host=localhost;dbname=test;','root','',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
}
catch(Exception $e){
    die("Error " . $e->getMessage());
}
$firstname = $_POST['firstname'];
$lastname =  $_POST['lastname'];
$username =  $_POST['username'];
$email = $_POST['email'];
$motDePasse = $_POST['motDePasse'];
$passe=password_hash($motDePasse,PASSWORD_DEFAULT);
//afichage des donnees de user
echo "Firstname : $firstname<br> Lastname: $lastname <br> Username $username <br> Email: $email <br> 
    Password: $motDePasse <br> Password hash $passe <br>";
// requete
$req= $bdd->prepare("INSERT INTO Register (firstname,lastname, username , email,motDePasse )
                         VALUES   (:firstname,  :lastname, :username,  :email, :motDePasse)");
$req->execute([
    'firstname' => $firstname,
    'lastname' => $lastname,
    'username' => $username,
    'email' =>  $email,
    'motDePasse' => $passe
]);
header('Location:login_form.php');

?>