<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user-type.css">
    <script src="https://kit.fontawesome.com/979ee355d9.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <img class="logo" src="images/boarding-logo.png" alt="Logo">
            
        </div>

        <div class="title">
            <label for="">BOARDING HOUSE FINDER</label>
        </div>

        <form action="login.php" method="post" class="field-input">

            <div class="labels">
                <label for="">Login as:</label>
            </div>
            

            <div class="type">
                <a href="tenant-login.php">
                    <i class="fa-solid fa-user fa-xl"></i> <br>
                    Tenant
                </a>

                <a href="owner-login.php">
                    <i class="fa-solid fa-user-tie fa-xl"></i> <br>
                    Owner
                </a>
                </div>
            

        </form>

       

    </div>
</body>

</html>