<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=3.0">
    <link rel="stylesheet" href="create-acc2.css">
    <script src="https://kit.fontawesome.com/979ee355d9.js" crossorigin="anonymous"></script>

    <script>
       document.addEventListener('DOMContentLoaded', function () {
            const userButtons = document.querySelectorAll('.wrapper .user-type button, #second-type');

            userButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();

                    
                    userButtons.forEach(btn => btn.classList.remove('clicked'));

                    
                    button.classList.add('clicked');
                });
            });
        });
    </script>
    
    <title>Registration</title>
</head>
<body>
   

    <header>
        <div class="top-section">
            <img class="logo" src="images/image-logo.png" alt="PSU Logo">
            <label>BOARDING<span class="brand-name"> BEACON</span></label> 
        </div>
        <div class="system-name">
            <label for=""><b>BOARDING HOUSE FINDER</b></label>
        </div>
    </header>

    <div class="wrapper">
        <div class="wrap-header">
            <label class="title"><b>REGISTER</b></label> 
        </div>
        
       
        <div class="labels">
            <ul>
                <li>Last Name</li>
                <li id="second-Label">First Name</li>
                <li id="third-Label">M.I.</li>
            </ul>
        </div>
       
       <form action="" method="post" class="field-input1" >
            <div class="top-inp">
                <input type="text" name="lastname" id="">
                <input type="text" name="firstname">
                <input type="text" id="middle-initial" name="middle-initial">
            </div>

           

            <div class="field-input3">
                <label for="">Username</label>
                <input type="text" name="id-number">
                <label for="">Password</label>
                <input type="password" name="password">
            </div>


            <hr>

            <div class="user-label">
                <label for="">Are you?</label>
            </div>

            
            <div class="user-type">
                <button> <i class="fa-solid fa-user fa-xl"></i><br>Tenant</button>
                <button id="second-type"><i class="fa-solid fa-user-tie fa-xl"></i> <br>Boarding Owner</button>

            </div>

            <hr>

            <div class="buttons">
                <input type="submit" name="register" value="REGISTER" id="register">
            </div>
       </form>
       

       
    </div>

</body>
</html>
