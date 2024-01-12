<?php
require 'db.php';
 
 
 

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/owner-boardings4.css">
    <script src="https://kit.fontawesome.com/979ee355d9.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    if (isset($_POST['logout'])) {
            session_start();
            session_destroy();
            header("Refresh: 1; url='user-type-login.php'");
            echo "<script>alert('Logged out successfully.')</script>";
        }
?>
<body>

    <header>
        <div class="top-section">
            <img class="logo" src="images/image-logo.png" alt="PSU Logo">
            <label>BOARDING<span class="university-name"> BEACON</span></label>

        </div>
        <form action="owner-boardings.php" method="post">
            <div class="system-name">
                
                <button type="submit" name="logout" id="logout">LOGOUT</button>
            </div>
        </form>



    </header>
    <nav class="navi">
        <ul>
            <li id="left-nav">
                <a href="" id="selected"><i class="fa-solid fa-house"></i> My Boardings</a>
            </li>
        </ul>
        <ul>
            <li id="project">
                <a href="upload.php"><i class="fa-solid fa-plus"></i>&nbsp&nbspAdd</a>
            </li>
        </ul>
    </nav>

    <div class="container">
    <?php
        $dataset = $con->query("SELECT * FROM boarding INNER JOIN address ON boarding.addressID = address.addressID ORDER BY boardID DESC") or die("error");

 
           
 
        for ($i = 0; $i < $dataset->num_rows; $i ++) {
                
                $row = $dataset->fetch_assoc();
 
                if ($row) {
                    echo "
                    <a href='board-details-owner.php?id=" . $row['boardID'] . "'>
                        <div class='box' data-boarding-id='" . $row['boardID'] . "'>

                            <img src='images/" . $row['bImage'] . "' alt='images'>
                            
                            <div class='labels'>
                                <label id='bName'>". $row['bName'] . "</label> <br>
                                <label id='bPrice'>" . $row['bPrice'] . "</label> <br>
                                <label id='bAddress'>" . $row['barangay'] . "</label> <br>
                                <label id='Bstatus'>" . $row['bStatus'] . "</label>
                            </div>

                            
                        </div>
                    </a>
    ";
                }
            }
 
            
        
 
        $dataset->free_result();
        ?>
        

        
        
    </div>
</body>
</html>
