
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tenant-home8.css">
    <title>Document</title>
</head>
<body>
<?php
include('db.php');
 
if(isset($_POST["action"]))
{
    $query = $con->query("SELECT * FROM boarding");
 
    if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
    {
        $query = $con->query("SELECT * FROM boarding WHERE bPrice BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'");
    }
 
    $total_row = mysqli_num_rows($query);
    $output = '';
 
    if($total_row > 0){
        $count = 0; // Initialize a counter
        while ($row = $query->fetch_object()) {
            // Open a new row div for every 3 items
            if ($count % 3 == 0) {
                $output .= "<div class='row gy-2'>";
            }
 
            $output .= "
            <div class='col-sm-4'>
                <div class='box'>
                    <a href='board-details.php?id=" . $row->boardID . "'>
                        <img src='images/" . $row->bImage . "' alt='images'>
                    </a>
                    <label id='Bname'>" . $row->bName . "</label>
                    <label id='Bprice'>₱ <b>" . $row->bPrice . "</b> monthly</label>
                    
                    <hr>
                    <div class='button'>
                        <a href='board-details.php?id=" . $row->boardID . "'>See details</a>
                    </div>
                </div>
            </div>";
 
            // Close the row div for every 3 items
            if (++$count % 3 == 0) {
                $output .= "</div>";
            }
        }
 
        // Close the row div if the total number of items is not a multiple of 3
        if ($count % 3 != 0) {
            $output .= '</div>';
        }
    } else {
        $output = '<h3>No Data Found</h3>';
    }
 
    echo $output;
}
?>
</body>
</html>

