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
<div class="wrapper section-addNewAds">
    <div class="container">
        <div class="row mb-5">
            <div class="col-xl-10 offset-xl-1 text-center">
                <h1 class="mt-5">Dodaj novu kucu ili zgradu</h1>
                <div class="message">

                </div>
                <form id="housesForm" action="addNewHouse" method="POST" enctype="multipart/form-data">
                    <input type="text" placeholder="Naziv kuce ili zgrade" class="form-control mt-2" name="name">
                    <textarea name="description" placeholder="Opis" class="form-control mt-2" cols="30" rows="10"></textarea>
                    <input type="file" class="form-control mt-2" name="image"><br>
                    <input type="text" placeholder="Adresa" class="form-control mt-2" name="address">
                    <input type="text" placeholder="Grad" class="form-control mt-2" name="city">  
                    <input type="text" class="form-control mt-2" name="userId" hidden value="<?php echo $_SESSION['id']; ?>">
                    <input type="submit" class="btn btn-success mt-2">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 text-center offset-xl-1">
            <h1>Dodaj novu sobu</h1>
                <form action="addNewRoom" method="POST" enctype="multipart/form-data">
                    <input type="text" placeholder="Naziv sobe" name="room_name" class="form-control">
                    <textarea placeholder="Opis" name="description" cols="30" rows="10" class="form-control"></textarea>
                    <input type="number" placeholder="cena po danu" name="price" class="form-control">
                    <input type="file" name="file[]" id="file" multiple class="form-control">
                    <input type="text" placeholder="Kontakt telefon" name="contact" class="form-control">
                    <select name="idHouse" class="form-control">
                        <?php
                            foreach ($houses as $house) {
                                echo "<option value='$house->idhouses'>".$house->name."</option>";
                            }
                        ?>
                    </select>
                    <input type="number" placeholder="Broj kreveta" name="beds" class="form-control">
                    <input type="number" placeholder="Maksimalan broj ljudi" name="max_person" class="form-control">
                    <input type="submit" class="btn btn-success">
                </form>
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
<script type="text/javascript" src="js/ajax/addNewHouse.js"></script>
