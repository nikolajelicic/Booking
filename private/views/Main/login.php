<?php
include 'header.php';
?>
<header class="wrapper blue">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-2">
                <h2>Booking</h2>
            </div>
            <div class="col-xl-4">
                <nav class="navbar navbar-expand-md text-center">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="target">
                    </button>
                    <div class="collapse navbar-collapse" id="target">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="index" class="nav-link">Pocetna strana</a>
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
<section class="wrapper">
    <div class="container">
        <div class="row login-row">
            <div class="col-xl-6 offset-xl-3">
                <h2>Ulogujte se</h2>
                <div id="message"></div>
                <form id="loginForm" action="authUser" method="POST"> 
                    <input type="email" name="email" class="form-control" placeholder="Unesi email">
                    <input type="password"  name="password" class="form-control" placeholder="Unesi sifru">
                    <button type="submit" id="success">Uloguj se</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="js/ajax/login.js"></script>
<?php 
    include 'modal/registration.php';
    include 'footer.php';
?>