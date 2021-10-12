<?php 
    session_start();
    if(!isset($_SESSION['id'])&&$_SESSION['role']!='user'){
        header("Location: ../login");
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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="../js/datepicker.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <title>Booking</title>
</head>
<body>
<header class="wrapper blue">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-3 col-lg-4 col-md-12 text-md-center col-sm-12 text-sm-center">
                <img src="../img/logo.svg" alt="">
            </div>
            <div class="col-xl-7 col-lg-7 col-md-12 text-md-center col-sm-12 justify-content-end">
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
                                <a href="../logout" class="nav-link">Odjavi se</a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="modal" data-target="#registration" href="#" class="nav-link">Registruj se</a>
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
            <div class="col-xl-12">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                      <?php 
                          $img = json_decode($rooms->images);
                          for($i=0;$i<sizeof($img);$i++){
                             echo "<div class=swiper-slide><img class=swiper-img src=../rooms/$img[$i]></div>";
                          }
                      ?>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center mt-5">
                <h3>Izabrali ste apartman: <span><?php echo $rooms->room_name;?></span></h3>
                <p>Cena za jednu osobu po danu <?php echo $rooms->price_per_day;?></p>
                <p><strong id="priceMessage"></strong></p>
                <p><strong id="reservationMessage"></strong></p>
                <form id="reservationForm" method="POST" action="confirmReservation">
                    <div class="row">
                        <div class="col-xl-4 offset-xl-4 col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-6 offset-sm-3">
                            <label for="from">Od</label>
                            <input class="form-control" placeholder="Datum dolaska" type="text" id="from" name="from">
                            <label for="to">do</label>
                            <input class="form-control" placeholder="Datum odlaska" type="text" id="to" name="to">
                            <input class="form-control mb-4 mt-4" id="persons" name="persons" type="number" placeholder="Broj osoba">
                            <input class="form-control" hidden name="user" type="text" value="<?php echo $_SESSION['id']; ?>">
                            <input class="form-control" hidden name="room" type="text" value="<?php echo htmlspecialchars(strip_tags($rooms->idrooms));?>">
                            <input class="form-control" hidden name="price" type="text" id="price" value="<?php echo htmlspecialchars(strip_tags($rooms->price_per_day)); ?>">
                            <button class="rezervation">Rezervisi</button>
                        </div>
                    </div>
                </form>
                <button class="calculate btn btn-success">Izracunaj</button>
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
<script>
const swiper = new Swiper('.swiper-container', {
  direction: 'horizontal',
  loop: true,

  pagination: {
    el: '.swiper-pagination',
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  scrollbar: {
    el: '.swiper-scrollbar',
  },
});
</script>
<script src="../js/calculatePrice.js"></script>
<script src="../js/ajax/confirmReservation.js"></script>
<script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!--SDN for FontAwesome icons-->
<script src="https://kit.fontawesome.com/acaf216e80.js" crossorigin="anonymous"></script>

</body>
</html>