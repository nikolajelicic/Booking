<?php 
    session_start();
    if(!isset($_SESSION['id'])||$_SESSION['role']!='admin'){
        include '404.php';
        die();
    }
    include 'header.php';
?>
<header class="wrapper blue">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-3 col-lg-4 col-md-12 text-md-center col-sm-12 text-sm-center">
                <img src="img/logo.svg" alt="logo">
            </div>
            <div class="col-xl-5 col-lg-7 col-md-12 text-md-center col-sm-12 justify-content-end">
                <nav class="navbar navbar-expand-sm text-center">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#target">
                    <i class="fas fa-bars"></i>Menu
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-center" id="target">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="admin" class="nav-link active">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/reservations" class="nav-link">Rezervacije</a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/houses" class="nav-link">Kuce(hoteli)</a>
                            </li>
                            <li class="nav-item">
                                <a href="logout" class="nav-link">Odjavi se</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="flex-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 mt-5">
                <?php 
                    if(isset($true)){
                        echo "<div class='alert alert-success text-center'><h3>Uspesno ste dodali novu sobu</h3><br><a href=admin>Vrati se nazad</a></div>";
                    }else{
                        echo "<div class='alert alert-danger text-center'><h3>".$false."</h3><br><a href=admin>Vrati se nazad</a></div>";
                    }
                ?>
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