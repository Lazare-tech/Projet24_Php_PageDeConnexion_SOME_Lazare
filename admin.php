<?php 
session_start();
try{
    $bdd= new PDO('mysql:host=localhost;dbname=test;','root','',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
}
catch(Exception $e){
    die("Error " . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>
 <?php include("admin_menu.php") ?>
    <!-- references des utilisateurs  -->
   <?php $utilisateur=$bdd->query("SELECT * FROM Register ");?>
    
    <section class="container p-5">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>

                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while($donnees= $utilisateur->fetch()){?>

                <tr>
                    <td>
                        <div class="d-flex align-items-center">

                            <div class="ms-3">
                                <p class="text-muted mb-0"><?php echo $donnees['firstname']?></p>
                            </div>

                    </td>
                    <td>
                        <p class="text-muted mb-0"><?php echo $donnees['lastname']?></p>
                    </td>
                    <td>
                        <p class="text-muted mb-0"><?php echo $donnees['email']?></p>
                    </td>
                    <td>
                        <p class="text-muted mb-0"><?php echo $donnees['role_name'];?></p>
                    </td>

                    <td>
                        <a href="editer.php"><button type="button" class="">
                        <?php $_SESSION['id_champ'] = $donnees['id']?>
                            Edit
                        </button>
                        </a>
                    </td>
                </tr>
                <?php }?>


            </tbody>
        </table>
    </section>
</body>

</html>