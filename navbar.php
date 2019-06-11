<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">E-Watch Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
      <?php
        if ( isset($_SESSION["id"])) {
          switch($_SESSION["userrole"]) {
            case 'administrator':
              echo '<li class="nav-item">
                      <a class="nav-link" href="./index.php?content=administrator_home">AdminHome<span class="sr-only">(current)</span></a>
                    </li>';
              echo '<li class="nav-item">
                      <a class="nav-link" href="./index.php?content=gebruikersrollen">gebruikersrollen<span class="sr-only">(current)</span></a>
                    </li>';
            break;
            case 'customer':
              echo '<li class="nav-item">
                      <a class="nav-link" href="./index.php?content=customer_home">CustomerHome<span class="sr-only">(current)</span></a>
                    </li>';
                    '<li class="nav-item">
                            <a class="nav-link" href="./index.php?content=contact">Contact<span class="sr-only">(current)</span></a>
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
        }
      ?>
    </ul>
    
  </div>
  
</nav>
