<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "db.php";

    $lname = $_POST['lastname'];
    $fname = $_POST['firstname'];
    $midname = $_POST['middle-initial'];
    $contact = $_POST['contact'];
    $username = $_POST['id-number'];
    $password = $_POST['password'];

            $sql = "INSERT INTO tenant (fname, lname, midname, username, password, contactNo) VALUES ('$lname', '$fname', '$midname', '$username', '$password', '$contact')";

            $result = $con->query($sql);

            if ($result) {
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function () {
                        Swal.fire(
                            "Registration Successful!",
                            "Login Now!",
                            "success"
                        ).then(function () {
                            window.location.href = "tenant-login.php";
                        });
                    });
                </script>';
            } else {
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function () {
                        Swal.fire(
                            "Error!",
                            "Registration failed.",
                            "error"
                        );
                    });
                </script>';
            }
        
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=3.0">
    <link rel="stylesheet" href="css/create-acc4.css">
    <script src="https://kit.fontawesome.com/979ee355d9.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10">

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
<style>
            #message {
            display:none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 20px;
            margin-top: 10px;
            }

            #message p {
            padding: 10px 35px;
            font-size: 18px;
            }

            /* Add a green text color and a checkmark when the requirements are right */
            .valid {
            color: green;
            }

            .valid:before {
            position: relative;
            left: -35px;
            content: "✔";
            }

            /* Add a red text color and an "x" when the requirements are wrong */
            .invalid {
            color: red;
            }

            .invalid:before {
            position: relative;
            left: -35px;
            content: "✖";
            }
</style>
    
    <title>Registration</title>
</head>

<body>

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
       
       <form action="tenant-reg.php" method="post" enctype="multipart/form-data" class="field-input1"  >
            <div class="top-inp">
                <input type="text" name="lastname" id=""required>
                <input type="text" name="firstname" required>
                <input type="text" id="middle-initial" name="middle-initial">
            </div>

           

            <div class="field-input3">

            <label for="">Contact No.</label>
            <input type="number" name="contact" id="contact" required>
            <label for="">Username</label>
            <input type="text" name="id-number" id="username" required>
            <span id="username-error" class="error-message"></span>
                <label for="">Password</label>
                <input type="password" name="password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                <label for="">Retype Password</label>
                <input type="password" name="re-password">
                </div>

            <div id="message">
            <h3>Password must contain the following:</h3>
            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
            <p id="number" class="invalid">A <b>number</b></p>
            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>

           

            <div class="buttons">
                <input type="submit" name="register" value="REGISTER" id="register">
            </div>
       </form>
        
   
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const usernameInput = document.getElementById('username');
        const usernameError = document.getElementById('username-error');

        usernameInput.addEventListener('input', function () {
            validateUsername();
        });

        function validateUsername() {
            const usernameValue = usernameInput.value.trim();
            const isValid = /^[a-zA-Z0-9_-]{6,16}$/.test(usernameValue);

            if (isValid) {
                usernameError.textContent = '';
            } else {
                usernameError.textContent = 'Username must be 6-16 characters and may contain letters, numbers, hyphens, and underscores.';
            }
        }
    });
    </script>
    <script>
        var myInput = document.getElementById("psw");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
        // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if(myInput.value.match(lowerCaseLetters)) {  
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }
            
            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if(myInput.value.match(upperCaseLetters)) {  
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if(myInput.value.match(numbers)) {  
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }
            
            // Validate length
            if(myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }
    </script> 

</body>
</html>


