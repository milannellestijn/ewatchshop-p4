<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="./index.php?content=home">E-Watch Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
      <?php
        if ( isset($_SESSION["id"])) {
          switch($_SESSION["userrole"]) {
            case 'administrator':
              echo  '<li class="nav-item">
                            <a class="nav-link" href="./index.php?content=contactadmin">Contact Admin<span class="sr-only">(current)</span></a>
                          </li>';
                          echo '<li class="nav-item">
                          <a class="nav-link" href="./index.php?content=gebruikersrollen">Gebruikers rollen<span class="sr-only">(current)</span></a>
                        </li>';
                        echo '<li class="nav-item">
                        <a class="nav-link" href="./index.php?content=producten">Producten<span class="sr-only">(current)</span></a>
                      </li>';
                      echo '<li class="nav-item">
                      <a class="nav-link" href="./index.php?content=orders">Bestellingen<span class="sr-only">(current)</span></a>
                    </li>';
                    echo      '<li class="nav-item">
                    <a class="nav-link" href="./index.php?content=info">Info<span class="sr-only">(current)</span></a>
                  </li>';
            break;
            case 'customer':
              echo '<li class="nav-item">
                      <a class="nav-link" href="./index.php?content=items">Producten<span class="sr-only">(current)</span></a>
                    </li>';
              echo      '<li class="nav-item">
                            <a class="nav-link" href="./index.php?content=contact">Contact<span class="sr-only">(current)</span></a>
                          </li>';
             echo      '<li class="nav-item">
                            <a class="nav-link" href="./index.php?content=track">Bestellingen<span class="sr-only">(current)</span></a>
                          </li>';
                          echo      '<li class="nav-item">
                          <a class="nav-link" href="./index.php?content=info">Info<span class="sr-only">(current)</span></a>
                        </li>';
                        
                          
                          
                          
          break;
            default:
              header("Location: url=./index.php?content=logout");
            break;
          }
          echo '<li class="nav-item">
                  <a class="nav-link" href="./index.php?content=logout">Uitloggen</a>
                </li>';
        } else {
          echo '<li class="nav-item active">
                  <a class="nav-link" href="./index.php?content=home">Home <span class="sr-only">(current)</span></a>
                </li>';
          echo '<li class="nav-item">
                  <a class="nav-link" href="./index.php?content=registerform">Registreer</a>
                </li>';
          echo '<li class="nav-item">
                  <a class="nav-link" href="./index.php?content=loginform">Inloggen</a>
                </li>';
          echo  '<li class="nav-item">
                <a class="nav-link" href="./index.php?content=contact">Contact<span class="sr-only">(current)</span></a>
                </li>';
                echo  '<li class="nav-item">
                      <a class="nav-link" href="./index.php?content=info">Info<span class="sr-only">(current)</span></a>
                      </li>';
        }
      ?>

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="index.php?content=shopcart"><img src="./pictures/shopcart.png" hight="42" width="42"/> Cart<span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>
    </ul>

  </div>

</nav>
