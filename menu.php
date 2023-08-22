<?php session_start()?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <!-- Toggle button -->

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">FAQ</a>
        </li>
      </ul>
      <!-- Left links -->
      
<?php if(isset($_SESSION['email'])){
    echo $_SESSION['email'];
    echo "<a href='Logout.php'><button class='btn btn-success'>Deconnexion</button></a>";

  ?>
<?php }else{?>

<div class="d-flex align-items-center">
       <a href="login_form.php"><button type="button" class="btn btn-info px-3 me-2">
          Login
        </button>
      </a> 
      <a href="register.php">
        <button type="button" class="btn btn-primary me-3">
          Register
        </button>
        </a>
       
      </div>
    </div>
<?php }?>

    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->