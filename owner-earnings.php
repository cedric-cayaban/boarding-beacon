<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/owner-earnings.css">
    <script src="https://kit.fontawesome.com/979ee355d9.js" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
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
                <a href="owner-boardings.php"><i class="fa-solid fa-house"></i> My Boardings</a>
            </li>
            <li id="">
                <a href="" id="selected"></i>Earnings</a>
            </li>
        </ul>
        <ul>
            <li id="project">
                <a href="upload.php"><i class="fa-solid fa-plus"></i>&nbsp&nbspAdd</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <!-- eto mag ooutput nung mga nagrent -->
        <div class="encasing" id="">
            <div class="contents">
                <label for="">[username] has payed to rent for [boarding name]</label>
            </div>
            <div class="contents">
                <label for="">[username] has payed to rent for [boarding name]</label>
            </div>
        </div>
        
    </div>
</body>
</html>