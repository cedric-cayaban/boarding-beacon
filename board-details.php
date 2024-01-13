<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/board-details5.css">
    <script src="https://www.paypal.com/sdk/js?client-id=AWKMjKu0cohsAWzXuK46xSLaA3U3dGPCSx4BXQP7AjtrOriA1KYcE5wrnSolB0hZHL06TwPAyA7Q53pP&currency=PHP&disable-funding=card"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/979ee355d9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Home</title>
</head>

<body>

    <header>
        <div class="top-section">
            <img class="logo" src="images/image-logo.png" alt="PSU Logo">
            <label><b>BOARDING</b><span class="brand-name"> <b></b>BEACON</span></label> 
            
        </div>
        <div class="system-name">
           
        </div>
    </header>
    <?php
 
 require 'db.php';
if (isset($_GET['id'])) {
$bh_id = $_GET['id'];

$bh_query = $con->prepare("SELECT * FROM boarding INNER JOIN address ON boarding.addressID = address.addressID WHERE boardID = ?");
$bh_query->bind_param("i", $bh_id);
$bh_query->execute();
$bh_result = $bh_query->get_result();

if ($bh_row = $bh_result->fetch_assoc()) {
 $payment = $bh_row['bPrice'];


 echo "
 <div class='container'>

 <div class='content1'>

     <div class='mainImg'>
         <img src='images/".$bh_row['bImage']."' class='image'>
     </div>

     <div class='imgRow1'>
         <img src='images/".$bh_row['bImg1']."' class='img'>
         <img src='images/".$bh_row['bImg2']."' class='img'>
         <img src='images/".$bh_row['bImg3']."' class='img'>
     </div>

     <div class='imgRow2'>
         <img src='images/".$bh_row['bImg4']."' class='img'>
         <img src='images/".$bh_row['bImg5']."'class='img'>
         <img src='images/".$bh_row['bImg6']."' class='img'>
     </div>
    
 </div>

 <div class='content2'>
     <hr>
     <label for='' id='bName'>".$bh_row['bName']."</label>
     <label for='' id='bAddress'>".$bh_row['barangay']." Urdaneta City, Pangasinan</label>
     <p id='bDesc'>".nl2br($bh_row['bDescription'])."
     </p>
     <label for='' id='unitNo'>".$bh_row['bUnitNo']." Unit/s Available</label>

     <div class='button'>
        
        
     <label id='oPrice'>₱".$bh_row['bPrice']."</label>
     <div class='spacer'>
    <div id='paypal-button-container'></div>
     </div>
         
     </div>
     <hr>
 </div>
</div>
 ";
} else {
 echo "Boarding house not found.";
}

$bh_query->close();
}


?>
<script>
paypal.Buttons({
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: "<?php echo $payment; ?>"
                },
            }]
        });
    },
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            console.log(details.payer.name.given_name);
            console.log(details);

            // Assuming 'boardingName' is defined somewhere in your code
            var boardingName = "<?php echo $bh_row['bName']; ?>";

            // Send AJAX request to update_rented_bh.php
            $.ajax({
                type: 'POST',
                url: 'set_tenant_rented.php',
                data: { boardingName: boardingName },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Payment Successful!',
                            text: 'Thank you for your payment.',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'tenant-home.php';
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Update Error',
                            text: 'There was an error updating the rented_bh column: ' + response.error,
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        });
    },
    onError: function(err) {
        Swal.fire({
            icon: 'error',
            title: 'Payment Error',
            text: 'There was an error processing your payment. Please try again.',
            confirmButtonText: 'OK'
        });
    }
}).render('#paypal-button-container');

</script>

</body>
</html>

