<?php
require 'db.php';
?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tenant-home8.css">
    <script src="https://kit.fontawesome.com/979ee355d9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Home</title>
</head>
 
    <?php
        if (isset($_POST['logout'])) {
                session_start();
                session_destroy();
                header("Refresh: 1; url='user-type-login.php'");
                
            }
    ?>
<body>
 
        <header>
            <div class="top-section">
                <img class="logo" src="images/image-logo.png" alt="PSU Logo">
                <label><b>BOARDING</b><span class="brand-name"> <b></b>BEACON</span></label>
               
            </div>
            <form action="tenant-home.php" method="post">
            <div class="system-name">
                <button type="submit" id="logout" name="logout">LOGOUT</button>
            </div>
            </form>
           
       
           
            </header>
   
            <nav class="navbar navbar-expand-sm navbar-dark">
                    <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>
                       
                        </ul>
 
                        </div>
                    </div>
            </nav>
               
            <div class="container">
    <div class="row">
    <br />
    <h2 align="center" id='find'>Find Boarding House</h2>
    <br />
        <div class="col-md-1">                                
            <div class="list-group">
                <h3>Price</h3>
                <input type="hidden" id="hidden_minimum_price" value="0" />
                <input type="hidden" id="hidden_maximum_price" value="65000" />
                <p id="price_show">500 - 10000</p>
                <div id="price_range"></div>
            </div>                
        </div>
        <div class="col-md-11">
            <br />
           <div class="row filter_data">
        </div>
    </div>
    </div>
</div>
 
        <style>
#loading{text-align:center; background: url('loading.gif') no-repeat center; height: 150px;}
</style>
<script>
$(document).ready(function(){
    filter_data();
    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }
    $('#price_range').slider({
        range:true,
        min:500,
        max:10000,
        values:[500, 10000],
        step:50,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });
});
</script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>