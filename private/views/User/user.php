<?php 
    session_start();
    if(!isset($_SESSION['id'])||$_SESSION['role']!='user'){
        include '404.php';
        die();
    }
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
                                <a href="index" class="nav-link">Svi apartmani</a>
                            </li>
                            <li class="nav-item">
                                <a href="user/myreservations<?php echo $_SESSION['id'];?>" class="nav-link">Moje rezervacije</a>
                            </li>
                            <li class="nav-item">
                                <a href="user/changePassword" class="nav-link">Promeni sifru</a>
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

<?php include 'footer.php';?>