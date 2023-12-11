<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="css/upload2.css">
    <script src="https://kit.fontawesome.com/979ee355d9.js" crossorigin="anonymous"></script>
</head>

<body>
<header>
        <div class="top-section">
            <img class="logo" src="images/image-logo.png" alt="PSU Logo">
            <label><b>BOARDING</b><span class="brand-name"> BEACON</span></label> 
            
        </div>
        <div class="system-name">
            <label for=""><b>BOARDING HOUSE FINDER</b></label>
            <button type="submit" id="logout">LOGOUT</button>
        </div>
    
        
    </header>
    
    <nav class="navi">
        <ul>
            <li id="left-nav">
                <a href="" id="selected">Search</a>
               
            </li>
        </ul>
        <ul>
            <li id="project">
                <a href=""><i class="fa-solid fa-house"></i>&nbsp&nbspMy Boarding</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="fields">
            <form action="upload.php" method="post" enctype="multipart/form-data">

                <div class="input1">

                    <label for="">Boarding House name:</label>
                    <input type="text" name="title" required>

                    <div class="split-labels">
                         <label for="" id="program-label">Address</label>
                         <label for="capstoneFile" name="fileContent" id="upload">Boarding house image:</label>
                    </div>
                    <div class="split">
                       

                        <select name="address" id="program">
                                <option value="San-Vicente">San-Vicente / PSU-Village</option>
                        </select>

                        
                        <input type="file" name="boardingImage" id="boardingImage" required>
                    </div>

                    <label for="">Description:</label>
                    <textarea name="info" name="info" id="" cols="30" rows="10" required></textarea>
                    
                  
                    <input type="submit" name="submitFile" id="submitFile" value="Submit">
                </div>

                <div class="input2">

                    <div class="split-labels">
                        <label for="">Boarding Price</label>
                        <label for="" id="unitNo">No. of units:</label>
                    </div>

                    <div class="split">
                        <input type="number" name="price" placeholder="₱" required>
                        <input type="number" name="unitsNo" required>
                    </div> 
                    
                    <label for="capstoneFile" name="unit1">Units image:</label>
                    <input type="file" name="unit1" id="unitImage" required>
                    <input type="file" name="unit1" id="unitImage" required>
                    <input type="file" name="unit1" id="unitImage" required>
                    <input type="file" name="unit1" id="unitImage" required>
                    <input type="file" name="unit1" id="unitImage" required>
                    <input type="file" name="unit1" id="unitImage" required>
                   
                </div>
            </form>
        </div>
    </div>
</body>

</html>

