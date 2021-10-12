<?php 
    session_start();
    if(!isset($_SESSION['id'])||$_SESSION['role']!='admin'){
        include '404.php';
        die();
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
            <div class="col-xl-3 col-lg-4 col-md-12 text-md-center col-sm-12 text-sm-center">
                <h1 class="text-white">Admin panel</h1>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-12 text-md-center col-sm-12 justify-content-end">
                <nav class="navbar navbar-expand-sm text-center">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#target">
                    <i class="fas fa-bars"></i>Menu
                    </button>
                    <div class="collapse navbar-collapse" id="target">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="../admin" class="nav-link">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a href="reservations" class="nav-link active">Rezervacije</a>
                            </li>
                            <li class="nav-item">
                                <a href="houses" class="nav-link">Kuce(hoteli)</a>
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
<div class="flex-wrapper">
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
            <h2 class="mt-5 mb-5">Spisak svih rezervacija</h2>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Ime i prezime</th>
                            <th>Vreme dolaska</th>
                            <th>Vreme odlaska</th>
                            <th>Broj ljudi</th>
                            <th>Cena</th>
                            <th>Zgrada</th>
                            <th>Apartman</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $reservation):?>
                        <tr>
                            <th><?php echo $reservation->name . " " . $reservation->surname;?></th>
                            <th><?php echo $reservation->start_time;?></th>
                            <th><?php echo $reservation->end_time;?></th>
                            <th><?php echo $reservation->num_of_persons;?></th>
                            <th><?php echo $reservation->price;?></th>
                            <th><?php echo $reservation->house_name;?></th>
                            <th><?php echo $reservation->room_name;?></th>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<footer class="wrapper mt-5">
    <div class="container"> 
        <div class="row">
            <div class="col-xl-4 offset-xl-4 text-center">
                <p>© Copyright Jelicic Nikola</p>
                <a href="mailto:jelicicnikola99@gmail.com">Mail: jelicicnikola99@gmail.com</a>
            </div>
        </div>
    </div>
</footer>
</div>
<script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!--SDN for FontAwesome icons-->
<script src="https://kit.fontawesome.com/acaf216e80.js" crossorigin="anonymous"></script>

</body>
</html>