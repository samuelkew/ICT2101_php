<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="#">Dispatch Manager 1.0</a></div>
    <?php 
        if(isset($_SESSION['user'])) {
            echo '<div class="navbar-text navbar-default">Welcome '.$_SESSION['user'].'!</div>';
        }
    ?>
    <div class="navbar-right"><a href="?logout" class="navbar-link"><button type="button" class="btn btn-default navbar-btn">Sign Out</button></a></div>
  </div>
</nav>