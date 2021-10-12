<?php 
    session_start();
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
               <img src="../img/logo.svg" alt="logo">
            </div>
            <div class="col-xl-7 col-lg-7 col-md-12 text-md-center col-sm-12 justify-content-end">
                <nav class="navbar navbar-expand-md text-center">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#target">
                    <i class="fas fa-bars"></i>Menu
                    </button>
                    <div class="collapse navbar-collapse" id="target">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="../" class="nav-link">Svi apartmani</a>
                            </li>
                            <?php if(isset($_SESSION['id'])){
                                echo "<li class='nav-item'>
                                        <a href='../user' class='nav-link'>Profil</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a href='../user/myrezervations' class='nav-link'>Moje rezervacije</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a href='../logout' class='nav-link'>Odjavi se</a>
                                    </li>";
                            }else {
                                echo "<li class='nav-item'>
                                        <a href='../login' class='nav-link'>Uloguj se</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a data-toggle='modal' data-target='#registration' href='#' class='nav-link'>Registruj se</a>
                                    </li>";
                            }?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="wrapper jumbotron p-3">
   <div class="container">
      <div class="row"> 
        <div class="col-xl-8 offset-xl-2 col-lg-12 col-md-12 col-sm-12 text-center">
            <h1 class="mb-3"><?php echo $houses->name;?></h1>
            <img class="houseImg mb-3 img-fluid" src="../houses/<?php echo $houses->images; ?>" alt="">
            <h4>Mesto: <?php echo $houses->city;?></h4>
            <h4>Ulica: <?php echo $houses->address;?></h4>
            <h4>Opis objekta</h4>
            <p>
               <?php echo $houses->description;?>
            </p>
        </div>
      </div>
   </div>
</div>
<div class="wrapper mb-5">
    <div class="container">
        <?php foreach($rooms as $room):?>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 text-center">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php 
                            $img = json_decode($room->images);
                            for($i=0;$i<sizeof($img);$i++){
                               echo "<div class=swiper-slide><img class=swiper-img src=../rooms/$img[$i]></div>";
                            }
                        ?>
                    </div>
                </div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-scrollbar"></div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <h2><?php echo $room->room_name;?></h2>
                <p>
                    <?php 
                        echo $room->description;
                    ?>
                </p><br>
                <h4>Cena po danu: <span class="price"><?php echo $room->price_per_day . " " . "dinara";?></span></h4>
                <h4>Broj kreveta: <span class="price"><?php echo $room->num_of_beds;?></span></h4>
                <h4>Maksimalno osoba: <span class="price"><?php echo $room->max_persons;?></span></h4>
                <a class="rezervation" href="reservation<?php echo $room->idrooms; ?>">Rezervisi sobu</a>
            </div>
        </div>
        <?php endforeach;?>
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
<?php 
    include 'modal/registration.php';
?>
<script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!--SDN for FontAwesome icons-->
<script src="https://kit.fontawesome.com/acaf216e80.js" crossorigin="anonymous"></script>

</body>
</html>