<?php 
    session_start();
    include 'header.php';
?>
<header class="wrapper blue">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-3">
                <img src="img/logo.svg" alt="">
            </div>
            <div class="col-xl-6 justify-content-end">
                <nav class="navbar navbar-expand-md text-center">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#target">
                    <i class="fas fa-bars"></i>Menu
                    </button>
                    <div class="collapse navbar-collapse" id="target">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="index" class="nav-link active">Svi apartmani</a>
                            </li>
                            <?php if(isset($_SESSION['id'])){
                                echo "<li class='nav-item'>
                                        <a href='user' class='nav-link'>Profil</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a href='logout' class='nav-link'>Odjavi se</a>
                                    </li>";
                            }else {
                                echo "<li class='nav-item'>
                                        <a href='login' class='nav-link'>Uloguj se</a>
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
<div class="wrapper">
    <div class="continer">
        <div class="row">
            <div class="col-xl-12 text-center">
                <img class="central-img" src="img/booking.jpg" alt="bookingImg">
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-search">
    <div class="container">
        <?php 
            foreach($houses as $house):
        ?>
        <div class="row">
            <div class="col-xl-12 mt-5">
                <div class="row house">
                    <div class="col-xl-3">
                        <div class="img-section">
                            <img class="house-img" src="houses/<?php echo $house->images; ?>" alt="house-img">
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="description">
                            <h3><?php echo $house->name;?></h3>
                            <p><?php //echo wordwrap($house->description, 300,"...<a href='#'>Procitaj vise</a>",false);
                                echo mb_strimwidth($house->description, 0, 300, "...");
                            ?></p>
                            <a class="more float-right" href="house/getRooms=<?php echo $house->idhouses;?>">Pogledaj vise</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            endforeach;
        ?>
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
<?php 
    include 'modal/registration.php';
    include 'footer.php';
?>