<?php

require 'db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Boarding</title>
    <link rel="stylesheet" href="css/upload3.css">
    <script src="https://kit.fontawesome.com/979ee355d9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>


<body>
<header>
        <div class="top-section">
            <img class="logo" src="images/image-logo.png" alt="PSU Logo">
            <label><b>BOARDING</b><span class="brand-name"> <b>BEACON</b></span></label> 
            
        </div>
        <form action="upload.php" method="post">
        <div class="system-name">
            <button type="submit" id="logout" name="logout">LOGOUT</button>
        </div>
        </form>
   
        
    </header>
    
    <nav class="navi">
        <ul>
            <li id="left-nav">
                <a href="owner-boardings.php" ><i class="fa-solid fa-house"></i> My Boardings</a>
            </li>
        </ul>
        <ul>
            <li id="project">
                <a href="upload.php" id="selected"><i class="fa-solid fa-plus"></i>&nbsp&nbspAdd</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="fields">
            <form action="upload.php" method="post" enctype="multipart/form-data">

                <div class="input1">

                    <label for="">Boarding House name:</label>
                    <input type="text" name="title" required>
                    
          <label for="" id="program-label">Address</label>
          <select name="address" id="program">
<?php 

       $query = "SELECT * FROM address";
       $result = $con -> query($query);
       while ($row = $result -> fetch_assoc()){
        ?> 
        <option value="<?php echo $row['addressID'];?>" name="address"> <?php echo $row['barangay'];?> </option>
       <?php } 
       $result -> free_result();
       ?> 

                        </select>   
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
                    <label for="capstoneFile" name="fileContent" id="upload">Boarding image:</label>
                    <input type="file" name="boardingImage" id="boardingImage" required>
                    <label for="capstoneFile" name="unit1">Units image:</label>
                    <input type="file" name="unit1" id="unitImage" required>
                    <input type="file" name="unit2" id="unitImage" required>
                    <input type="file" name="unit3" id="unitImage" required>
                    <input type="file" name="unit4" id="unitImage" required>
                    <input type="file" name="unit5" id="unitImage" required>
                    <input type="file" name="unit6" id="unitImage" required>
                   
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php

require "db.php";


if (isset($_POST['submitFile'])){
    
    if (isset($_FILES["boardingImage"]) && $_FILES["boardingImage"]["error"] == UPLOAD_ERR_OK) {
        $filename = $_FILES["boardingImage"]["name"];
        $tempname = $_FILES["boardingImage"]["tmp_name"];
        $folder = "images/" . $filename;

        
        $fileValid = preg_match('/\.(png|jpeg|jpg)$/i', $filename);
// for unit 1 image
        if ($fileValid) {
            move_uploaded_file($tempname, $folder);

            if (isset($_FILES["unit1"]) && $_FILES["unit1"]["error"] == UPLOAD_ERR_OK) {
                $unit1 = $_FILES["unit1"]["name"];
                $unit1tempname = $_FILES["unit1"]["tmp_name"];
                $folder = "images/" . $unit1;
        
                
                $fileValid = preg_match('/\.(png|jpeg|jpg)$/i', $unit1);
        
                if ($fileValid) {
                    move_uploaded_file( $unit1tempname, $folder);{
// for unit 2 image

   if (isset($_FILES["unit2"]) && $_FILES["unit2"]["error"] == UPLOAD_ERR_OK) {
                                $unit2 = $_FILES["unit2"]["name"];
                                $unit2tempname = $_FILES["unit2"]["tmp_name"];
                                $folder = "images/" . $unit2;
                        
                                
                                $fileValid = preg_match('/\.(png|jpeg|jpg)$/i', $unit2);
                        
                                if ($fileValid) {
                                    move_uploaded_file( $unit2tempname, $folder);{
// for unit 3 image
if (isset($_FILES["unit3"]) && $_FILES["unit3"]["error"] == UPLOAD_ERR_OK) {
    $unit3 = $_FILES["unit3"]["name"];
    $unit3tempname = $_FILES["unit3"]["tmp_name"];
    $folder = "images/" . $unit3;

    
    $fileValid = preg_match('/\.(png|jpeg|jpg)$/i', $unit3);

    if ($fileValid) {
        move_uploaded_file( $unit3tempname, $folder);{

// for unit 4 image

if (isset($_FILES["unit4"]) && $_FILES["unit2"]["error"] == UPLOAD_ERR_OK) {
    $unit4 = $_FILES["unit4"]["name"];
    $unit4tempname = $_FILES["unit4"]["tmp_name"];
    $folder = "images/" . $unit4;

    
    $fileValid = preg_match('/\.(png|jpeg|jpg)$/i', $unit4);

    if ($fileValid) {
        move_uploaded_file( $unit4tempname, $folder);{

// for unit 5 image

if (isset($_FILES["unit5"]) && $_FILES["unit5"]["error"] == UPLOAD_ERR_OK) {
    $unit5 = $_FILES["unit5"]["name"];
    $unit5tempname = $_FILES["unit5"]["tmp_name"];
    $folder = "images/" . $unit5;

    
    $fileValid = preg_match('/\.(png|jpeg|jpg)$/i', $unit5);

    if ($fileValid) {
        move_uploaded_file( $unit5tempname, $folder);{

// for unit 6 image 
if (isset($_FILES["unit6"]) && $_FILES["unit6"]["error"] == UPLOAD_ERR_OK) {
    $unit6 = $_FILES["unit6"]["name"];
    $unit6tempname = $_FILES["unit6"]["tmp_name"];
    $folder = "images/" . $unit6;

    
    $fileValid = preg_match('/\.(png|jpeg|jpg)$/i', $unit6);

    if ($fileValid) {
        move_uploaded_file( $unit6tempname, $folder);{


            $title = $_POST['title'];
            $address = $_POST['address'];
            $info = $_POST['info'];
            $price = $_POST['price'];
            $unitsNo = $_POST['unitsNo'];
            $owner = isset($_GET['id']) ? $_GET['id'] : '';
            $sql = "INSERT INTO boarding (bName, addressID, bDescription, bPrice, bUnitNo, bImage, bImg1, bImg2, bImg3, bImg4,  bImg5, bImg6, bStatus) VALUES ('$title', '$address', '$info', '$price', '$unitsNo', '$filename', '$unit1','$unit2','$unit3','$unit4','$unit5','$unit6','vacant')";
            if ($con->query($sql)) {
                // SweetAlert for successful upload
                echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Boarding house added successfully!',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = 'owner-boardings.php'; // Redirect to a specific page
                        });
                      </script>";
            }
        }
    }
}
        }
    }
}
}
    }
}
        }
    }
}
    }
        }
    }
}
            }
        }
    }
}
}

    

?>
