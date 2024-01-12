<?php
require 'db.php';

// Initialize variables
$bName = "";
$bPrice = "";
$address = "";
$bStatus = "";
$info = "";
$unitsNo = 0;
$boarding_id = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        // Retrieve form data
        $boarding_id = $_POST['boarding_id'];
        $bName = $_POST['bName'];
        $bPrice = $_POST['bPrice'];
        $bStatus = $_POST['boardingStatus'];
        $address = $_POST['address'];
        $info = $_POST['info'];
        $unitsNo = $_POST['unitsNo'];

        // Update the boarding house details in the database using prepared statements for security
        $query = "UPDATE boarding SET bName = ?, bPrice = ?, bStatus = ?, addressID = ?, bDescription = ?, bUnitNo = ? WHERE boardID = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ssssssi", $bName, $bPrice, $bStatus, $address, $info, $unitsNo, $boarding_id);

        if ($stmt->execute()) {
            // Successful update
            header("Location: owner-boardings.php");
            exit();
        } else {
            // Handle update failure
            echo "Error updating boarding house: " . $stmt->error;
        }
    }
    if (isset($_POST['edit'])) {
        $boarding_id = $con->real_escape_string($_POST['boarding_id']);
        $query = "SELECT * FROM boarding WHERE boardID = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $boarding_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $boarding_data = $result->fetch_assoc();
            $bName = $boarding_data['bName'];
            $bPrice = $boarding_data['bPrice'];
            $bStatus = $boarding_data['bStatus'];
            $address = $boarding_data['addressID'];
            $info = $boarding_data['bDescription'];
            $unitsNo = $boarding_data['bUnitNo'];
        } else {
            // Handle error if boarding house is not found
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="css/edit2.css">
    <script src="https://kit.fontawesome.com/979ee355d9.js" crossorigin="anonymous"></script>

</head>
<body>



   

    <div class="container">
    <div class="fields">
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Boarding details form -->
            <input type="hidden" name="boarding_id" value="<?php echo $boarding_id; ?>">
         <div class="input1">
        <input type="hidden" name="boarding_id" value="<?php echo $boarding_id; ?>">
        <label for="address" id="address-label">Boarding Name: </label>
            <input type="text" name="bName" value="<?php echo $bName; ?>"><br>
       
        <div class="input-address">
            <label for="address" id="address-label">Address:</label><br>
            <select name="address" id="address" required>
                <!-- Options for address -->
                <?php
                $query = "SELECT * FROM address";
                $result = $con->query($query);
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['addressID']; ?>" <?php echo ($row['addressID'] === $address) ? 'selected' : ''; ?>>
                        <?php echo $row['barangay']; ?>
                    </option>
                <?php }
                $result->free_result();
                ?>
            </select>
        </div>

        <div class="input3">
            <label for="boardingStatus" id="program-label">Boarding Status:</label> <br>
            <select name="boardingStatus" id="boardingStatus" required>
                <option value="Available" <?php echo ($bStatus === 'Available') ? 'selected' : ''; ?>>Available</option>
                <option value="Full" <?php echo ($bStatus === 'Full') ? 'selected' : ''; ?>>Not Available</option>
            </select>
        </div>

        
            <div class="split-labels">
                        <label for="">Boarding Price</label>
                        <label for="unitsNo" id="unitNo">No. of units:</label>
            </div>

            <div class="split">
             <input type="number" name="bPrice" placeholder="₱" value="<?php echo $bPrice; ?>">
             <input type="number" name="unitsNo" value="<?php echo $unitsNo; ?>" required><br>
            
       

        </div>

        <!-- Description -->
        <label for="">Description:</label>
        <textarea name="info" id="" cols="30" rows="10" required><?php echo $info; ?></textarea><br>

        <input type="submit" idd="update" name="update" value="Update">
        <!-- Units Number -->
        
       
             </form>
        </div>
</div>
</body>
</html>
