

<?php
require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tenant-home8.css">
    <title>Owner Approval</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
       .center h1{
        margin-top:2%;
        display: flex;
        justify-content: center;
       }
        table{
            max-width: 80%;
    margin: auto;
    margin-top: 5%;
        }
    </style>
</head>

<body>
<header>
        <div class="top-section">
            <img class="logo" src="images/image-logo.png" alt="PSU Logo">
            <label><b>BOARDING</b><span class="brand-name"> <b></b>BEACON</span></label> 
            
        </div>
       
        
    
        
    </header>
    
       <nav class="navbar navbar-expand-sm navbar-dark">
            <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="owner-approval.php">Owner Approval</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="admin-tenants.php">Tenants</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="admin-owner.php">Owner</a>
                </li>


                </ul>

                </div>
            </div>
        </nav>
    <div class="center">
        <h1>Owner Registration</h1>

        <table class='table table-striped'>
       <!-- ... (previous HTML code) ... -->

    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Mid Name</th>
            <th>Permit</th>
            <th></th>
        </tr>
    </thead>

<?php
$query = "SELECT owner.ownerID, owner.fname, owner.lname, owner.midname, owner.permit FROM owner WHERE accstatus = 'pending' ORDER BY ownerID ASC";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result)) {
?>
    <tbody>
        <tr>
            <td><?php echo $row['ownerID']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['midname']; ?></td>
            <td>
                <!-- Display permit file name as a clickable link -->
                <a href="permits/<?php echo $row['permit']; ?>" target="_blank"><?php echo $row['permit']; ?></a>
            </td>
            <td>
                <form action="owner-approval.php" method="post">
                    <input type="hidden" name="ownerID" value="<?php echo $row['ownerID']; ?>">
                    <Button type='submit' name="approve" value="Approve" class='btn btn-success'>Accept</Button>
                    <Button type='submit' name="reject" value="Reject" class='btn btn-danger'>Reject</Button>
                </form>
            </td>
        </tr>
    </tbody>
<?php } ?>
</table>

<!-- ... (remaining HTML and PHP code) ... -->

    </div>

    <?php
    if (isset($_POST['approve'])) {
        $UpOwnerID = $_POST['ownerID'];

        $select = "UPDATE owner SET owner.accstatus = 'approved' WHERE ownerID = '$UpOwnerID'";
        if($result = mysqli_query($con, $select)){
            echo '<script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire(
                    "Admin Approved",
                    "Admin account has been approved!",
                    "success"
                ).then(function () {
                    window.location.href = "owner-approval.php";
                });
            });
        </script>';  
        }
    }
    if (isset($_POST['reject'])) {
        $UpOwnerID = $_POST['ownerID'];

        //delete file from folder
        $query = "SELECT * FROM owner WHERE ownerID = '$UpOwnerID'";
        $res = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($res)) {
            // echo $row['FileContent'];
            unlink('permits/' . $row['permit']);
        }

        $select = "DELETE FROM owner WHERE ownerID = '$UpOwnerID'";
        if($result = mysqli_query($con, $select)){
            echo '<script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire(
                    "Admin Rejected!",
                    "Admin account has been Rejected!",
                    "error"
                ).then(function () {
                    window.location.href = "owner-approval.php";
                });
            });
        </script>';  
        }
    }
    ?>
</body>

</html>
