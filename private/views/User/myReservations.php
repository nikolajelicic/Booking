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
    <title>Booking-My Rezervations</title>
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
                                <a href="user/myreservations" class="nav-link active">Moje rezervacije</a>
                            </li>
                            <li class="nav-item">
                                <a href="changePassword" class="nav-link">Promeni sifru</a>
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
    <div class="contaier">
        <div class="row">
            <div class="col-xl-4 offset-xl-4 mt-5 mb-5 text-center">
                <h3>Spisak mojih rezervacija</h3>
            </div>
        </div>  
        <div class="row">   
            <div class="col-xl-8 offset-xl-2">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Vreme dolaska</th>
                            <th>Vreme odlaska</th>
                            <th>Broj ljudi</th>
                            <th>Zgrada</th>
                            <th>Apartman</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if($data==NULL){
                                echo "<tr><td colspan=7 class='text-center'>Trenutno nemate ni jednu rezervaciju</td></tr>";
                            }else{
                            foreach ($data as $reservation){
                        ?>
                        <tr>
                                <td><?php echo $reservation->start_time;?></td>
                                <td><?php echo $reservation->end_time;?></td>
                                <td><?php echo $reservation->num_of_persons;?></td>
                                <td><?php echo $reservation->house_name;?></td>
                                <td><?php echo $reservation->room_name;?></td>
                                <td><button data-toggle="modal" data-target="#editReservationModal" data-reservation_id="<?php echo $reservation->idreservations;?>" class="btn btn-primary changeRes">Izmeni datum</button></td>
                                <td><button data-reservation_id="<?php echo $reservation->idreservations;?>" class="btn btn-danger deleteRes">Obrisi rezervaciju</button></td>
                        </tr>
                        <?php }};?>
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

<?php 
    include 'modal/editReservationModal.php';
?>

<script>
    $(document).ready(function(){
        $(".deleteRes").click(function(){
            var id = $(this).attr("data-reservation_id")
            $.ajax({
                url: 'http://localhost/booking/user/deleteReservation',
                type: 'POST',
                data: {id:id},
                dataType: 'JSON',
                success: function(data){
                    if(data.status==true){
                        window.location.reload(true); 
                        window.alert(data.message)

                    }else{ 
                        window.alert(data.message)
                        window.location.reload(true);
                    }
                }
            })
        })

        $(".changeRes").click(function(){
            var id = $(this).attr("data-reservation_id")
            $.ajax({
                url: 'http://localhost/booking/user/getReservationById',
                type: 'POST',
                data: {id:id},
                dataType: 'JSON',
                success: function(data){
                    //console.log(data)
                    $("#from").val(data.start_time)
                    $("#to").val(data.end_time)
                }
            })
        })
    })
</script>
<script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!--SDN for FontAwesome icons-->
<script src="https://kit.fontawesome.com/acaf216e80.js" crossorigin="anonymous"></script>

</body>
</html>