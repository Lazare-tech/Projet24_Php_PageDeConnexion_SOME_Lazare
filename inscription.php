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
$role=$bdd->query("SELECT role FROM Role WHERE role ='editeur' ");
$role_name= $role->fetch();
echo $role_name['role'];
$req= $bdd->prepare("INSERT INTO Register (firstname,lastname, username , email,motDePasse,role_name )
                         VALUES   (:firstname,  :lastname, :username,  :email, :motDePasse, :role_name)");
$req->execute([
    'firstname' => $firstname,
    'lastname' => $lastname,
    'username' => $username,
    'email' =>  $email,
    'motDePasse' => $passe,
    'role_name' => $role_name['role'],
]);

header('Location:login_form.php');

?>