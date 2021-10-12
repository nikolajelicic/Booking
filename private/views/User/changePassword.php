<?php 
    session_start();
    if(!isset($_SESSION['id'])&&$_SESSION['role']!='user'){
      die("Pristup vam nije dozvoljen");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Booking</title>
</head>
<body>

<header class="wrapper blue">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-3">
                <img src="../img/logo.svg" alt="">
            </div>
            <div class="col-xl-6 justify-content-end">
                <nav class="navbar navbar-expand-md text-center">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#target">
                    <i class="fas fa-bars"></i>Menu
                    </button>
                    <div class="collapse navbar-collapse" id="target">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="../index" class="nav-link">Svi apartmani</a>
                            </li>
                            <li class="nav-item">
                                <a href="../user/myreservations<?php echo htmlspecialchars(strip_tags($_SESSION['id']));?>" class="nav-link">Moje rezervacije</a>
                            </li>
                            <li class="nav-item">
                                <a href="user/changePassword" class="nav-link active">Promeni sifru</a>
                            </li>
                            <li class="nav-item">
                                <a href="../logout" class="nav-link">Odjavi se</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 offset-xl-4 text-center" id="passwordSection">
                <h3>Promeni sifru</h3>
                <div class="message">

                </div>
                <form id="confirmPasswordForm" method="POST" action="confirmPassword">
                    <input type="password" class="form-control mt-3" placeholder="Stara sifra" name="oldPass">
                    <input type="password" class="form-control mt-3" placeholder="Nova sifra" name="newPass">
                    <input type="password" class="form-control mt-3" placeholder="Ponovi novu sifru" name="replacePass">
                    <input type="password" hidden value="<?php echo htmlspecialchars(strip_tags($_SESSION["id"])); ?>" name="id">
                    <button class="btn btn-success mt-3">Sacuvaj sifru</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../js/ajax/changePassword.js"></script>
<script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!--SDN for FontAwesome icons-->
<script src="https://kit.fontawesome.com/acaf216e80.js" crossorigin="anonymous"></script>

</body>
</html>