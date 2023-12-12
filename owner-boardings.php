<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/owner-boardings3.css">
    <script src="https://kit.fontawesome.com/979ee355d9.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <header>
        <div class="top-section">
            <img class="logo" src="images/image-logo.png" alt="PSU Logo">
            <label>BOARDING<span class="university-name"> BEACON</span></label>

        </div>
        <form action="user_home.php" method="post">
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
        <a href="">
            <div class="box">

                    <img src="images/Pagaduan.png" alt="">
                
                <div class="labels">
                    <label for="" id="bName">Boarding name</label>
                    <label for="" id="bAddress">Address</label>
                    <label for="" id="bPrice">Price</label>
                </div>
            </div>
            
        </a>

        <a href="">
            <div class="box">
                
                    <img src="images/Pagaduan.png" alt="">
                
                <div class="labels">
                    <label for="" id="bName">Boarding name</label>
                    <label for="" id="bAddress">Address</label>
                    <label for="" id="bPrice">Price</label>
                </div>

            </div>
        </a>

        
        
    </div>
</body>
</html>