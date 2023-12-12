<?php
require 'db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tenant-home5.css">
    <script src="https://kit.fontawesome.com/979ee355d9.js" crossorigin="anonymous"></script>
    <title>Home</title>
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
            <label><b>BOARDING</b><span class="brand-name"> <b></b>BEACON</span></label> 
            
        </div>
        <form action="tenant-home.php" method="post">
        <div class="system-name">
            <button type="submit" id="logout" name="logout">LOGOUT</button>
        </div>
        </form>
        
    
        
    </header>
    
    <nav class="navi">
        <ul>
            <li id="left-nav">
                <a href="" id="selected">Search</a>
               
            </li>
        </ul>
    </nav>

    <div class='container'>
    <div class='boardings'>
        <label id='board-header'>Find Boarding Houses</label>
        <?php
        $dataset = $con->query("select * from boarding inner join address where boarding.addressID=address.addressID") or die("error");

        for ($i = 0; $i < $dataset->num_rows; $i += 3) {
            echo "<ul class='board-row'>";

            for ($j = 0; $j < 3; $j++) {
                $row = $dataset->fetch_assoc();

                if ($row) {
                    echo "
                        <li>
                            <div class='box'>
                                <a href='board-details.php?id=" . $row['boardID'] . "'>
                                    <img src='images/" . $row['bImage'] . "' alt='images'>
                                </a>
                                <label id='Bname'>" . $row['bName'] . "</label>
                                <label id='Bprice'>₱ <b>" . $row['bPrice'] . "</b> monthly</label>
                                <label id='Baddress'>" . $row['barangay'] . "</label>
                                <hr>
                                <div class='button'>
                                    <a href='board-details.php?id=" . $row['boardID'] . "'>See details</a>
                                </div>
                            </div>
                        </li>";
                }
            }

            echo "</ul>";
        }

        $dataset->free_result();
        ?>
    </div>
</div>

    
    
</body>
</html>